<?php

namespace App\Listeners;

use App\Events\BrontoSubscriptionUpdated;
use App\Events\UserSubscriptionUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SoapClient;

class SyncUserOnBronto
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param BrontoSubscriptionUpdated $event
     * @return void
     */
    public function handle(BrontoSubscriptionUpdated $event)
    {
        return $this->syncUser($event->user);
    }

    /**
     * Sync user on Bronto mailing list
     * @param $user
     */
    private function syncUser($user)
    {
        /*
        This example script will connect to the API, authenticate a session,
        add a new contact, add a new list, update the contact to be on the
        list, and then read the contact to verify that they are on the list.
        Be sure to replace the "ADD YOUR API TOKEN HERE" text with a working
        API Token.
        */
        ini_set("soap.wsdl_cache_enabled", "0");
        date_default_timezone_set('America/New_York');

        $wsdl = "https://api.bronto.com/v4?wsdl";
        $url = "https://api.bronto.com/v4";

        $client = new SoapClient($wsdl, array('trace' => 1, 'encoding' => 'UTF-8'));
        $client->__setLocation($url);

        // Login
        $token = "0bc403ec0000000000000000000000192110";
        $sessionId = $client->login(array("apiToken" => $token))->return;
        dd($sessionId);
        $client->__setSoapHeaders(array(new SoapHeader("http://api.bronto.com/v4",
            'sessionHeader',
            array('sessionId' => $sessionId))));

        // Add our new contact
        $contact = array(
            array("email" => "john.doe@example.com")
        );
        $result = $client->addContacts(array("contacts" => $contact))->return->results;
        if ($result->isError) {
            echo "Unable to add new contact!\n";
            return;
        }
        echo "Added new contact.\n";

        // Add our new list
        $list = array(
            array("name" => "My first list", "label" => "Hello Bronto List")
        );
        $result = $client->addLists(array("lists" => $list))->return->results;
        if ($result->isError) {
            echo "Unable to add new list!\n";
            return;
        }
        $listId = $result->id;
        echo "Added new list.\n";


        // Update the contact to put him on the list
        $contact = array(
            array("email" => "john.doe@example.com", "listIds" => array($listId))
        );
        $result = $client->updateContacts(array("contacts" => $contact))->return->results;
        if ($result->isError) {
            echo "Unable to update contact!\n";
            return;
        }
        echo "Added contact to list.\n";


        // Verify the contact is on the list
        $filter = array(
            "email" => array(array("operator" => "EqualTo", "value" => "john.doe@example.com"))
        );

        $result = $client->readContacts(array(
            "filter" => $filter,
            "includeLists" => true,
            "fields" => null,
            "pageNumber" => 1
        ))->return;
        if ($result->listIds != $listId) {
            echo "Contact is not on the list!\n";
            return;
        }

        echo "Contact is on the list.\n";
    }
}
