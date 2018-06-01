<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{


		\DB::table('users')->delete();

		\DB::table('users')->insert(array (
			0 =>
				array (
					'id' => 1,
					'role_id' => 1,
					'first_name' => 'Rameshwor',
					'last_name' => 'Maharjan',
					'phone_number' => '99 9999 9999',
					'email' => 'ramesh@octomedia.com.au',
					'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
					'provider' => NULL,
					'provider_id' => NULL,
					'verified' => 1,
					'is_3rd_party_integration' => 1,
					'is_marketing_emails' => 1,
					'is_free_isb_subscription' => 1,
					'history' => NULL,
					'remember_token' => NULL,
					'email_verification_token' => NULL,
					'email_verification_token_expiry_date' => NULL,
					'forgot_password_token' => NULL,
					'forgot_password_token_expiry_date' => NULL,
					'created_at' => NULL,
					'updated_at' => NULL,
				),
			1 =>
				array (
					'id' => 2,
					'role_id' => 1,
					'first_name' => 'admin',
					'last_name' => 'admin',
					'phone_number' => '99 9999 9999',
					'email' => 'admin@gmail.com',
					'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
					'provider' => NULL,
					'provider_id' => NULL,
					'verified' => 1,
					'is_3rd_party_integration' => 1,
					'is_marketing_emails' => 1,
					'is_free_isb_subscription' => 1,
					'history' => NULL,
					'remember_token' => NULL,
					'email_verification_token' => NULL,
					'email_verification_token_expiry_date' => NULL,
					'forgot_password_token' => NULL,
					'forgot_password_token_expiry_date' => NULL,
					'created_at' => NULL,
					'updated_at' => NULL,
				),
			2 =>
				array (
					'id' => 3,
					'role_id' => 2,
					'first_name' => 'Ram',
					'last_name' => 'Karki',
					'phone_number' => '99 9999 9999',
					'email' => 'ram@gmail.com',
					'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
					'provider' => NULL,
					'provider_id' => NULL,
					'verified' => 1,
					'is_3rd_party_integration' => 1,
					'is_marketing_emails' => 1,
					'is_free_isb_subscription' => 1,
					'history' => NULL,
					'remember_token' => NULL,
					'email_verification_token' => NULL,
					'email_verification_token_expiry_date' => NULL,
					'forgot_password_token' => NULL,
					'forgot_password_token_expiry_date' => NULL,
					'created_at' => NULL,
					'updated_at' => '2017-11-23 01:10:16',
				),
			3 =>
				array (
					'id' => 4,
					'role_id' => 3,
					'first_name' => 'Partner',
					'last_name' => '1',
					'phone_number' => '99 9999 9999',
					'email' => 'partner1@gmail.com',
					'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
					'provider' => NULL,
					'provider_id' => NULL,
					'verified' => 1,
					'is_3rd_party_integration' => 1,
					'is_marketing_emails' => 1,
					'is_free_isb_subscription' => 1,
					'history' => NULL,
					'remember_token' => NULL,
					'email_verification_token' => NULL,
					'email_verification_token_expiry_date' => NULL,
					'forgot_password_token' => NULL,
					'forgot_password_token_expiry_date' => NULL,
					'created_at' => NULL,
					'updated_at' => '2018-01-24 09:14:55',
				),
			4 =>
				array (
					'id' => 5,
					'role_id' => 3,
					'first_name' => 'Partner',
					'last_name' => '2',
					'phone_number' => '99 9999 9999',
					'email' => 'partner2@gmail.com',
					'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
					'provider' => NULL,
					'provider_id' => NULL,
					'verified' => 1,
					'is_3rd_party_integration' => 1,
					'is_marketing_emails' => 1,
					'is_free_isb_subscription' => 1,
					'history' => NULL,
					'remember_token' => NULL,
					'email_verification_token' => NULL,
					'email_verification_token_expiry_date' => NULL,
					'forgot_password_token' => NULL,
					'forgot_password_token_expiry_date' => NULL,
					'created_at' => NULL,
					'updated_at' => '2018-01-24 09:14:37',
				),
//            5 =>
//            array (
//                'id' => 6,
//                'role_id' => 2,
//                'first_name' => 'test',
//                'last_name' => 'Customer',
//                'phone_number' => '99 9999 9999',
//                'email' => 'testlsdiwkd@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 0,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2017-11-23 01:10:56',
//                'updated_at' => '2017-11-23 01:10:56',
//            ),
//            6 =>
//            array (
//                'id' => 7,
//                'role_id' => 2,
//                'first_name' => 'Sita',
//                'last_name' => 'Kharel',
//                'phone_number' => '99 9999 9999',
//                'email' => 'sitakharel@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2017-11-23 01:11:35',
//                'updated_at' => '2017-11-23 01:11:35',
//            ),
//            7 =>
//            array (
//                'id' => 8,
//                'role_id' => 2,
//                'first_name' => 'Sanup',
//                'last_name' => 'Poudel',
//                'phone_number' => '99 9999 9999',
//                'email' => 'sanuppoudel@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2017-11-23 01:12:04',
//                'updated_at' => '2017-11-23 01:12:04',
//            ),
//            8 =>
//            array (
//                'id' => 9,
//                'role_id' => 3,
//                'first_name' => 'partner',
//                'last_name' => '3',
//                'phone_number' => '99 9999 9999',
//                'email' => 'partner3@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2017-11-23 01:31:18',
//                'updated_at' => '2018-01-24 09:14:24',
//            ),
//            9 =>
//            array (
//                'id' => 10,
//                'role_id' => 2,
//                'first_name' => 'sudip',
//                'last_name' => 'limbu',
//                'phone_number' => '998238388',
//                'email' => 'sudiplimbu@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-01-12 05:22:29',
//                'updated_at' => '2018-01-12 05:22:29',
//            ),
//            10 =>
//            array (
//                'id' => 11,
//                'role_id' => 2,
//                'first_name' => 'just',
//                'last_name' => 'registered',
//                'phone_number' => '99 9999 9999',
//                'email' => 'justregistered@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-01-25 05:07:19',
//                'updated_at' => '2018-01-25 05:07:38',
//            ),
//            11 =>
//            array (
//                'id' => 12,
//                'role_id' => 2,
//                'first_name' => 'levelone',
//                'last_name' => 'complete',
//                'phone_number' => '88 8888 8888',
//                'email' => 'levelonecomplete@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-01-25 05:08:12',
//                'updated_at' => '2018-01-25 05:08:51',
//            ),
//            12 =>
//            array (
//                'id' => 13,
//                'role_id' => 2,
//                'first_name' => 'justregistered',
//                'last_name' => 'ecommerce',
//                'phone_number' => '88 8888 8888',
//                'email' => 'justregisteredecommerce@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-01-25 05:10:28',
//                'updated_at' => '2018-01-25 05:10:29',
//            ),
//            13 =>
//            array (
//                'id' => 14,
//                'role_id' => 2,
//                'first_name' => 'levelone',
//                'last_name' => 'almostcomplete',
//                'phone_number' => '88 8888 8888',
//                'email' => 'levelonealmostcomplete@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-01-25 05:11:09',
//                'updated_at' => '2018-01-25 05:11:23',
//            ),
//            14 =>
//            array (
//                'id' => 15,
//                'role_id' => 2,
//                'first_name' => 'leveltwosection',
//                'last_name' => 'almostcomplete',
//                'phone_number' => '99 9999 9999',
//                'email' => 'leveltwosectionalmostcomplete@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-01-25 05:12:15',
//                'updated_at' => '2018-01-25 05:13:18',
//            ),
//            15 =>
//            array (
//                'id' => 16,
//                'role_id' => 2,
//                'first_name' => 'leveltwo',
//                'last_name' => 'almostcomplete',
//                'phone_number' => '88 8888 8888',
//                'email' => 'leveltwoalmostcomplete@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-01-25 05:14:42',
//                'updated_at' => '2018-01-25 05:16:56',
//            ),
//            16 =>
//            array (
//                'id' => 17,
//                'role_id' => 2,
//                'first_name' => 'levelthreesection',
//                'last_name' => 'almostcomplete',
//                'phone_number' => '88 8888 8888',
//                'email' => 'levelthreesectionalmostcomplete@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-01-25 05:17:47',
//                'updated_at' => '2018-01-25 05:20:13',
//            ),
//            17 =>
//            array (
//                'id' => 18,
//                'role_id' => 2,
//                'first_name' => 'levelthree',
//                'last_name' => 'almostcomplete',
//                'phone_number' => '88 8888 8888',
//                'email' => 'levelthreealmostcomplete@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 1,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => NULL,
//                'email_verification_token_expiry_date' => NULL,
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-01-25 05:21:00',
//                'updated_at' => '2018-01-25 05:28:49',
//            ),
//            18 =>
//            array (
//                'id' => 19,
//                'role_id' => 2,
//                'first_name' => 'unverified',
//                'last_name' => 'user',
//                'phone_number' => '88 8888 8888',
//                'email' => 'unverifieduser@gmail.com',
//                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
//                'provider' => NULL,
//                'provider_id' => NULL,
//                'verified' => 0,
//                'is_3rd_party_integration' => 1,
//                'is_marketing_emails' => 1,
//                'is_free_isb_subscription' => 1,
//                'history' => NULL,
//                'remember_token' => NULL,
//                'email_verification_token' => 'c2cae39ecf179a03e18e8d3327348f7e',
//                'email_verification_token_expiry_date' => '2018-02-07 09:27:59',
//                'forgot_password_token' => NULL,
//                'forgot_password_token_expiry_date' => NULL,
//                'created_at' => '2018-02-06 09:27:59',
//                'updated_at' => '2018-02-06 09:27:59',
//            ),
		));


	}
}