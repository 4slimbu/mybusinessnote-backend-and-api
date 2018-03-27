<?php

use Tymon\JWTAuth\Facades\JWTAuth;

class BusinessOptionTestCest
{
    /* @test */
    public function testLoginIsSuccess(ApiTester $I)
    {
        $I->wantToTest('login is success');

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('token');
    }

    /* @test */
    public function testFailedLogin(ApiTester $I)
    {
        $I->wantToTest('login should fail on invalid credential');

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        // Incorrect email
        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'incorrect']);
        $I->seeResponseCodeIs(401);
        $I->seeResponseContains('errorCode');

        // Incorrect password
        $I->sendPOST('/user/login', ['email' => 'incorrect@gmail.com', 'password' => 'password']);
        $I->seeResponseCodeIs(401);
        $I->seeResponseContains('errorCode');
    }

    /* @test */
    public function testLoginReturnTokenWithUserDataAndScope(ApiTester $I)
    {
        $I->wantToTest('login return token with user data and scope');

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);

        $response = json_decode($I->grabResponse());
        JWTAuth::setToken($response->token);
        $payload = JWTAuth::getPayload();

        $I->assertNotEmpty($payload->get('user'));
        $I->assertNotEmpty($payload->get('scope'));
    }

    /* @test */
    public function testVerifiedUserStatus(ApiTester $I)
    {
        //verified user
        $I->wantToTest('verified user should have verified status as true');

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);

        $response = json_decode($I->grabResponse());
        JWTAuth::setToken($response->token);
        $payload = JWTAuth::getPayload();

        $I->assertEquals(1, $payload->get('user')['verified']);

    }

    /* @test */
    public function testNewUserShouldHaveUnVerifiedStatus(ApiTester $I)
    {
        $I->wantToTest('New user should have verified status as false');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendPOST('/user/register', [
            'first_name' => 'new',
            'last_name' => 'user',
            'phone_number' => '8888 8888 8888',
            'email' => 'newuser@gmail.com',
            'password' => 'password',
            'captcha_response' => 'whatever'
        ]);

        $response = json_decode($I->grabResponse());
        JWTAuth::setToken($response->token);
        $payload = JWTAuth::getPayload();

        $I->assertEquals(0, $payload->get('user')['verified']);

    }

    /* @test */
    public function testSendEmailToValidForgotPasswordEmail(ApiTester $I)
    {
        $I->wantToTest('Should send email to existing forgot password email');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        // existing email
        $I->sendPOST('/user/send-forgot-password-email', [
            'email' => 'levelonealmostcomplete@gmail.com',
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('successCode');

        // non existing email
        $I->sendPOST('/user/send-forgot-password-email', [
            'email' => 'nonexisting@gmail.com'
        ]);

        $I->seeResponseCodeIs(400);
        $I->seeResponseContains('errorCode');
    }

    /* @test */
    public function testSendVerificationEmail(ApiTester $I)
    {
        $I->wantToTest('Should send verification email to existing user');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);
        $response = json_decode($I->grabResponse());
        $I->haveHttpHeader('Authorization', 'Bearer ' . $response->token);

        $I->sendGET('/user/send-verification-email');

        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('successCode');
    }

    /* @test */
    public function testVerifyUserEmail(ApiTester $I)
    {
        $I->wantToTest('Should verify user email if have valid email_verification_token');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendPOST('/user/verify-email', ['email_verification_token' => 'invalid_token']);

        $I->seeResponseCodeIs(400);
        $I->seeResponseContains('errorCode');
    }

    /* @test */
    public function testIfUserEmailAlreadyExist(ApiTester $I)
    {
        $I->wantToTest('Test if user email already exist');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendPOST('/user/check-if-exists', ['email' => 'levelonealmostcomplete@gmail.com']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('successCode');
        $I->seeResponseContains('isPresent');
    }

    /* @test */
    public function testIfUserCanUpdatePassword(ApiTester $I)
    {
        $I->wantToTest('Test if user can update password');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendPOST('/user/update-password', ['password' => 'password', 'forgot_password_token' => 'unknown']);

        $I->seeResponseCodeIs(400);
        $I->seeResponseContains('errorCode');
    }

    /* @test */
    public function testOnlyLoggedInUserCanRetrieveUserData(ApiTester $I)
    {
        $I->wantToTest('Test only logged in user can retrieve user data');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendGET('/user');
        $I->seeResponseCodeIs(400);

        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);
        $response = json_decode($I->grabResponse());
        $I->haveHttpHeader('Authorization', 'Bearer ' . $response->token);

        $I->sendGET('/user');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('successCode');
        $I->seeResponseContains('user');
    }

    /* @test */
    public function testOnlyLoggedInUserCanUpdateUserData(ApiTester $I)
    {
        $I->wantToTest('Test only logged in user can update user data');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendPUT('/user', ['first_name' => 'first_name']);
        $I->seeResponseCodeIs(400);

        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);
        $response = json_decode($I->grabResponse());
        $I->haveHttpHeader('Authorization', 'Bearer ' . $response->token);

        $I->sendPUT('/user', ['first_name' => 'leveltwo']);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('successCode');
        $I->seeResponseContains('token');
    }


    /* @test */
    public function testOnlyLoggedInUserCanLogout(ApiTester $I)
    {
        $I->wantToTest('Test only logged in user can logout');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendPOST('/user/logout');
        $I->seeResponseCodeIs(400);

        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);
        $response = json_decode($I->grabResponse());
        $I->haveHttpHeader('Authorization', 'Bearer ' . $response->token);

        $I->sendPOST('/user/logout');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('successCode');
    }


}
