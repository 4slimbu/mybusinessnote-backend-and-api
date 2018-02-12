<?php


namespace App\Libraries;


use App\Models\User;
use App\Traits\Authenticable;
use CS_REST_Subscribers;
use CS_REST_Transactional_SmartEmail;

class CampaignMonitorLibrary
{
    use Authenticable;

    /**
     * Campaign Monitor list id for Marketing
     * @var string
     */
    protected $marketingListId = '1aa9558140c83c195c98ce5d73f8b8e5';

    /**
     * Smart Email id for sending email verification
     */
    protected $smartEmailIdForEmailVerification = 'a1193040-c047-412b-8bc0-635db87e49e9';

    /**
     * Smart Email id for sending reminder email for level one not complete after one day
     */
    protected $smartIdForLevelOneComplete = '962c4028-b389-4e39-b973-c6b99c6b066d';

    /**
     * Smart Email id for sending reminder email for level one not complete after one day
     */
    protected $smartIdForLevelOneNotCompleteAfterOneDay = '69de2b48-d9e6-4c77-9ba4-eeccb510c6f9';

    /**
     * Smart Email id for sending reminder email for level two not complete after one week
     */
    protected $smartIdForLevelTwoNotCompleteAfterOneWeek = 'cafec9fd-133f-42fd-982a-10de1c7b2e18';

    /**
     * Smart Email id for sending forgot password email
     */
    protected $smartEmailIdForForgotPassword = 'c8219942-f704-4935-8353-569e3e5d274a';

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

    /**
     * Redirect Url for React app
     * @var mixed
     */
    protected $reactAppUrl;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->userName = $user->first_name . ' ' . $user->last_name;
        $this->auth = array('api_key' => env('CAMPAIGN_MONITOR_API_KEY'));
        $this->reactAppUrl = env('REACT_APP_URL');
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
        } else {
            $this->unsubscribeUserFromTheList();
        }
    }

    /**
     * Send Verification Email using Smart Transactional Email
     */
    public function sendVerificationEmail()
    {
        $messageData = array(
            "To" => array(
                "{$this->userName} <{$this->user->email}>",
            ),
            "Data" => array(
                "first_name" => $this->user->first_name,
                "username" => $this->user->email,
                "continue_where_you_left" => $this->reactAppUrl . '?token=' . $this->getJwtTokenFromUser($this->user) . '&email_verification_token=' . $this->user->email_verification_token,
                "forgot_password_link" => $this->reactAppUrl . '/login/?forgot_password_token=' . $this->user->forgot_password_token,
            )
        );

        $this->sendSmartTransactionalMail($this->smartEmailIdForEmailVerification, $messageData);
    }

    /**
     * Send Forgot Password Email using Smart Transactional Email
     */
    public function sendForgotPasswordEmail()
    {
        $messageData = array(
            "To" => array(
                "{$this->userName} <{$this->user->email}>",
            ),
            "Data" => array(
                "continue_where_you_left" => $this->reactAppUrl . '?token=' . $this->getJwtTokenFromUser($this->user) . '&email_verification_token=' . $this->user->email_verification_token,
                "reset_password_link" => $this->reactAppUrl . '/login/?forgot_password_token=' . $this->user->forgot_password_token,
            )
        );

        $this->sendSmartTransactionalMail($this->smartEmailIdForForgotPassword, $messageData);
    }

    /**
     * Send an achievement email to user when user completes level one
     *
     * @param User $user
     */
    public function sendLevelOneCompleteEmail(User $user)
    {
        $messageData = array(
            "To" => array(
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ),
            "Data" => []
        );

        $this->sendSmartTransactionalMail($this->smartIdForLevelOneComplete, $messageData);
    }

    /**
     * Send reminder email for level one not complete after one day
     *
     * @param User $user
     */
    public function sendLevelOneNotCompleteAfterOneDayReminderEmail(User $user)
    {
        $messageData = array(
            "To" => array(
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ),
            "Data" => []
        );

        $this->sendSmartTransactionalMail($this->smartIdForLevelOneNotCompleteAfterOneDay, $messageData);
    }

    /**
     * Send reminder email for level two not complete after one week
     *
     * @param User $user
     */
    public function sendLevelTwoNotCompleteAfterOneWeekReminderEmail(User $user)
    {
        $messageData = array(
            "To" => array(
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ),
            "Data" => []
        );

        $this->sendSmartTransactionalMail($this->smartIdForLevelTwoNotCompleteAfterOneWeek, $messageData);
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
        } else {
            $this->addUserToTheList();
        }
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
     * @return void
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
     * @return void
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

    /**
     * Send Smart Transactional Mail
     * @param $smartEmailId
     * @param $messageData
     */
    private function sendSmartTransactionalMail($smartEmailId, $messageData)
    {
        $add_recipients_to_subscriber_list = false; //TODO: review - we are doing it in a separate event
        $wrap = new CS_REST_Transactional_SmartEmail($smartEmailId, $this->auth);
        $result = $wrap->send($messageData, $add_recipients_to_subscriber_list);
    }
}