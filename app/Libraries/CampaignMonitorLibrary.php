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
    protected $marketingListId = '71a5efb85ade597c3f90bc5c752d31ad';

    /**
     * Smart Email id for sending email verification
     */
    protected $smartEmailIdForEmailVerification = '700cf054-bee0-498f-a7a8-93318f6c5f9d';

    /**
     * Smart Email id for sending reminder email for level one not complete after one day
     */
    protected $smartIdForLevelOneComplete = '3b4cd25d-d373-46f1-97a6-c300b0769a9b';

    /**
     * Smart Email id for sending reminder email for level one not complete after one day
     */
    protected $smartIdForLevelOneNotCompleteAfterOneDay = 'abb4f611-1396-40b3-90f0-9a6106c9b36f';

    /**
     * Smart Email id for sending reminder email for level one not complete after one month
     */
    protected $smartIdForLevelOneNotCompleteAfterOneMonth = '3b7c09a2-77d0-4853-8c0e-a942c5c5b9f2';

    /**
     * Smart Email id : no activity after completing level one for one month
     */
    protected $smartIdForNoActivityAfterCompletingLevelOneForOneMonth = 'a576375d-74b4-4399-89f9-f052cea48502';

    /**
     * Smart Email id : no activity after completing level two for one week
     */
    protected $smartIdForNoActivityAfterCompletingLevelTwoForOneWeek = '1f2f606c-8211-4781-a9b6-7060ecc1bddc';

    /**
     * Smart Email id : no activity after completing level two for one month
     */
    protected $smartIdForNoActivityAfterCompletingLevelTwoForOneMonth = '8af90114-c4fe-4acc-8dc5-81b841776c1b';

    /**
     * Smart Email id for sending reminder email for level two not complete after one week
     */
    protected $smartIdForLevelTwoNotCompleteAfterOneWeek = 'ad3b6ca5-c07b-449f-99b4-5a90e198b645';

    /**
     * Smart Email id for sending forgot password email
     */
    protected $smartEmailIdForForgotPassword = 'b7a2131b-76a9-48ab-a429-cb1cb3071c26';

	/**
	 * Smart Email id for sending lead email
	 */
	protected $smartIdForSendingLead = '14000b9d-ae87-460b-9c2f-7a3becdb0b04';

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
        $this->auth = ['api_key' => env('CAMPAIGN_MONITOR_API_KEY')];
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

        if ($result->was_successful()) {
            return true;
        }

        return false;
    }

    //TODO: extract and combine all reminder emails to a single method

    /**
     * This updates subscriber info in the list
     *
     * @return void
     */
    private function updateUserInTheList()
    {
        $wrap = new CS_REST_Subscribers($this->marketingListId, $this->auth);

        $wrap->update($this->user->email, [
            'Name'        => $this->userName,
            'Resubscribe' => true,
        ]);

    }

    /**
     * This adds new user to the list
     *
     * @return void
     */
    private function addUserToTheList()
    {
        $wrap = new CS_REST_Subscribers($this->marketingListId, $this->auth);

        $wrap->add([
            'EmailAddress' => $this->user->email,
            'Name'         => $this->userName,
            'Resubscribe'  => true,
        ]);
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
     * Send Verification Email using Smart Transactional Email
     */
    public function sendVerificationEmail()
    {
        $messageData = [
            "To"   => [
                "{$this->userName} <{$this->user->email}>",
            ],
            "Data" => [
                "first_name"              => $this->user->first_name,
                "username"                => $this->user->email,
                "continue_where_you_left" => $this->reactAppUrl . '?token=' . $this->getTokenFromUser($this->user) . '&email_verification_token=' . $this->user->email_verification_token,
                "forgot_password_link"    => $this->reactAppUrl . '/login/forgot-password?forgot_password_token=' . $this->user->forgot_password_token,
            ],
        ];

        $this->sendSmartTransactionalMail($this->smartEmailIdForEmailVerification, $messageData);
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

    /**
     * Send Forgot Password Email for customers using Smart Transactional Email
     */
    public function sendForgotPasswordEmail()
    {
        $messageData = [
            "To"   => [
                "{$this->userName} <{$this->user->email}>",
            ],
            "Data" => [
                "continue_where_you_left" => $this->reactAppUrl . '?token=' . $this->getTokenFromUser($this->user) . '&email_verification_token=' . $this->user->email_verification_token,
                "reset_password_link"     => $this->reactAppUrl . '/login/forgot-password?forgot_password_token=' . $this->user->forgot_password_token,
            ],
        ];

        $this->sendSmartTransactionalMail($this->smartEmailIdForForgotPassword, $messageData);
    }

	/**
	 * Send Forgot Password Email for all type of users ( admin, partner, customer) using Smart Transactional Email
	 */
	public function sendCommonForgotPasswordEmail()
	{
		$messageData = [
			"To"   => [
				"{$this->userName} <{$this->user->email}>",
			],
			"Data" => [
				"reset_password_link"     => url('/') . '/password/reset/' . $this->user->forgot_password_token,
			],
		];

		$this->sendSmartTransactionalMail($this->smartEmailIdForForgotPassword, $messageData);
	}

    /**
     * Send an achievement email to user when user completes level one
     *
     * @param User $user
     */
    public function sendLevelOneCompleteEmail(User $user)
    {
        $messageData = [
            "To"   => [
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ],
            "Data" => [],
        ];

        $this->sendSmartTransactionalMail($this->smartIdForLevelOneComplete, $messageData);
    }

	/**
	 * Send an lead generated notification email to partner
	 *
	 * @param User $partner
	 *
	 * @internal param User $user
	 */
	public function sendLeadGenerateEmail(User $partner)
	{
		$userBusiness = $this->user->business;
		$messageData = array(
			"To" => array(
				"{$partner->first_name} {$partner->last_name} <{$partner->email}>",
			),
			"Data" => array(
				"first_name" => $this->user->first_name,
				"last_name" => $this->user->last_name,
				"phone_number" => $this->user->phone_number,
				"email" => $this->user->email,
				"business_name" => $userBusiness->business_name,
				"website" => $userBusiness->website,
				"business_email" => $userBusiness->business_email,
				"business_mobile" => $userBusiness->business_mobile,
				"business_general_phone" => $userBusiness->business_general_phone,
				"address" => $userBusiness->address,
			)
		);

		$this->sendSmartTransactionalMail($this->smartIdForSendingLead, $messageData);
	}

	/**
     * Send reminder email for level one not complete after one day
     *
     * @param User $user
     */
    public function sendLevelOneNotCompleteAfterOneDayReminderEmail(User $user)
    {
        $messageData = [
            "To"   => [
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ],
            "Data" => [],
        ];

        $this->sendSmartTransactionalMail($this->smartIdForLevelOneNotCompleteAfterOneDay, $messageData);
    }

    /**
     * Send reminder email for level one not complete after one month
     *
     * @param User $user
     */
    public function sendLevelOneNotCompleteAfterOneMonthReminderEmail(User $user)
    {
        $messageData = [
            "To"   => [
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ],
            "Data" => [],
        ];

        $this->sendSmartTransactionalMail($this->smartIdForLevelOneNotCompleteAfterOneMonth, $messageData);
    }

    /**
     * Send reminder email for level two not complete after one week
     *
     * @param User $user
     */
    public function sendLevelTwoNotCompleteAfterOneWeekReminderEmail(User $user)
    {
        $messageData = [
            "To"   => [
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ],
            "Data" => [],
        ];

        $this->sendSmartTransactionalMail($this->smartIdForLevelTwoNotCompleteAfterOneWeek, $messageData);
    }

    /**
     * Send reminder email for no activity after completing level one for one month
     *
     * @param User $user
     */
    public function sendNoActivityAfterCompletingLevelOneForOneMonthReminderEmail(User $user)
    {
        $messageData = [
            "To"   => [
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ],
            "Data" => [],
        ];

        $this->sendSmartTransactionalMail($this->smartIdForNoActivityAfterCompletingLevelOneForOneMonth, $messageData);
    }

    /**
     * Send reminder email for no activity after completing level two for one week
     *
     * @param User $user
     */
    public function sendNoActivityAfterCompletingLevelTwoForOneWeekReminderEmail(User $user)
    {
        $messageData = [
            "To"   => [
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ],
            "Data" => [],
        ];

        $this->sendSmartTransactionalMail($this->smartIdForNoActivityAfterCompletingLevelTwoForOneWeek, $messageData);
    }

    /**
     * Send reminder email for no activity after completing level two for one month
     *
     * @param User $user
     */
    public function sendNoActivityAfterCompletingLevelTwoForOneMonthReminderEmail(User $user)
    {
        $messageData = [
            "To"   => [
                "{$user->first_name} {$user->last_name} <{$user->email}>",
            ],
            "Data" => [],
        ];

        $this->sendSmartTransactionalMail($this->smartIdForNoActivityAfterCompletingLevelTwoForOneMonth, $messageData);
    }
}