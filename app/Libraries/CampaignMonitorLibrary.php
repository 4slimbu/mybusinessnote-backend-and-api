<?php


namespace App\Libraries;


use App\Models\User;
use CS_REST_Subscribers;

class CampaignMonitorLibrary
{
    /**
     * Campaign Monitor list id for Marketing
     * @var string
     */
    protected $marketingListId = '1aa9558140c83c195c98ce5d73f8b8e5';

    /**
     * Auth Array to access Campaign Monitor
     */
    protected $auth = [];

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
        $this->auth = array('api_key' => env('CAMPAIGN_MONITOR_API_KEY'));
    }

    /**
     * This sync user to campaign monitor specified list
     *
     * @internal param $user
     */
    public function syncCurrentUser()
    {
        if ($this->user->is_marketing_emails) {
            $this->saveUserToTheList();
        }

        $this->unsubscribeUserFromTheList();

    }

    /**
     * Create or Save User Email to Campaign Monitor Marketing List
     *
     * @internal param $user
     * @internal param $email
     * @internal param User $user
     */
    private function saveUserToTheList()
    {
        if ($this->isUserInTheList()) {
            $this->updateUserInTheList();
        }

        $this->addUserToTheList();
    }

    /**
     * This checks if user exist in the list
     *
     * @return bool
     */
    private function isUserInTheList()
    {
        $wrap = new CS_REST_Subscribers($this->marketingListId, $this->auth);
        $result = $wrap->get($this->user->email);

        if($result->was_successful()) {
            return true;
        }

        return false;
    }

    /**
     * This adds new user to the list
     *
     * @return bool
     */
    private function addUserToTheList()
    {
        $wrap = new CS_REST_Subscribers($this->marketingListId, $this->auth);

        $wrap->add(array(
            'EmailAddress' => $this->user->email,
            'Name' => $this->userName,
            'Resubscribe' => true
        ));
    }

    /**
     * This updates subscriber info in the list
     *
     * @return bool
     */
    private function updateUserInTheList()
    {
        $wrap = new CS_REST_Subscribers($this->marketingListId, $this->auth);

        $wrap->update($this->user->email, array(
            'Name' => $this->userName,
            'Resubscribe' => true
        ));

    }

    /**
     * Un-subscribe User Email from Campaign Monitor Marketing List
     *
     * @internal param $user
     * @internal param $email
     */
    private function unSubscribeUserFromTheList()
    {
        $wrap = new CS_REST_Subscribers($this->marketingListId, $this->auth);

        $wrap->unsubscribe($this->user->email);
    }
}