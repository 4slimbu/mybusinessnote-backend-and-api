<?php


namespace App\Libraries;


use App\Models\User;
use http\Exception;
use SoapClient;
use SoapHeader;

class BrontoLibrary
{
    /**
     * Bronto WDSL url
     */
    protected $wdsl = 'https://api.bronto.com/v4?wsdl';

    /**
     * Bronto Api Url
     */
    protected $url = 'http://api.bronto.com/v4';

    /**
     * Bronto list id for MBJ
     * @var string
     */
    protected $listId = '0bc403ec0000000000000000000000192110';

    /**
     * Bronto authenticated soap client instance ready to make request
     * @var void
     */
    protected $client;

    /**
     * Token for accessing Bronto
     */
    protected $token;

    /**
     * Instance of current user
     *
     * @var
     */
    protected $user;

    /**
     * Full name of current user
     *
     * @var
     */
    protected $userName;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->userName = $user->first_name . ' ' . $user->last_name;
        $this->token = env('BRONTO_ACCESS_TOKEN');
        $this->client = $this->prepareClient();
    }

    /**
     * This opens Bronto api session and returns authenticated soap client ready to make
     * further request.
     *
     * @return bool|SoapClient
     */
    public function prepareClient()
    {
        if (!$this->client) {
            $client = new SoapClient($this->wdsl, array('trace' => 1,
                'features' => SOAP_SINGLE_ELEMENT_ARRAYS));

            try {
                $token = $this->token;

                $sessionId = $client->login(array('apiToken' => $token))->return;

                $session_header = new SoapHeader($this->url,
                    'sessionHeader',
                    array('sessionId' => $sessionId));

                $client->__setSoapHeaders(array($session_header));

                return $client;
            } catch (\Exception $exception) {
                return false;
            }
        }
    }

    /**
     * This sync contact on the selected Bronto list
     * @internal param $list
     * @internal param $user
     */
    public function syncCurrentUser()
    {
        if ($this->user->is_free_isb_subscription) {
            $this->addUpdateContact();
        } else {
            $this->unSubscribeContact();
        }

        // get updated contact from Bronto
        // dd($this->getCurrentUserContact());
    }

    /**
     * Gets the contact object from Bronto using current user email
     *
     * @return bool
     */
    public function getCurrentUserContact()
    {
        try {
            // set up a filter to read contacts and match on either of two email addresses
            $filter = array(
                'email' => array(array(
                    'value' => $this->user->email
                )),
            );
            $contacts = $this->client->readContacts(array('pageNumber' => 1,
                    'includeLists' => true,
                    'filter' => $filter,
                )
            );

            if (property_exists($contacts, 'return')) {
                return $contacts->return;
            }

            return false;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Get all the contacts from current Bronto list
     * @return bool
     */
    public function getContactsFromList()
    {
        try {
            // set up a filter to read contacts and match on either of two email addresses
            $filter = array(
                'listId' => $this->listId
            );
            $contacts = $this->client->readContacts(array('pageNumber' => 1,
                    'includeLists' => true,
                    'filter' => $filter,
                )
            );

            if (property_exists($contacts, 'return')) {
                return $contacts->return;
            }

            return false;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Add or Update contact to current Bronto list
     */
    public function addUpdateContact()
    {
        //contacts
        $contacts = [
            'email' => $this->user->email,
            'listIds' => $this->listId,
        ];

        $this->client->addOrUpdateContacts([$contacts])->return;
    }

    /**
     * Un-subscribe contact from current Bronto list
     */
    public function unSubscribeContact()
    {
        //contacts
        $contacts = [
            'email' => $this->user->email,
            'listIds' => '',
        ];

        $this->client->updateContacts([$contacts])->return;
    }

}