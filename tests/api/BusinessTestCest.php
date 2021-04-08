<?php

class BusinessTestCest
{
    /* @test */
    public function testToEnsureIfICanGetUserBusinessData(ApiTester $I)
    {
        $I->wantToTest('to ensure if I can get user business data');

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        // for guest user
        $I->sendGET('/user/business');
        $I->seeResponseCodeIs(400);

        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);
        $response = json_decode($I->grabResponse());
        $I->haveHttpHeader('Authorization', 'Bearer ' . $response->token);

        // for authenticated user
        $I->sendGET('/user/business');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('business');
    }

    /* @test */
    public function testToEnsureIfICanGetBusinessStatus(ApiTester $I)
    {
        $I->wantToTest('to ensure if I can get business status');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        // for guest user
        $I->sendGET('/user/business/status');
        $I->seeResponseCodeIs(400);

        // for authenticated user
        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);
        $response = json_decode($I->grabResponse());
        $I->haveHttpHeader('Authorization', 'Bearer ' . $response->token);
        $I->sendGet('/user/business/status');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('businessStatus');
        $I->seeResponseContains('levelStatuses');
        $I->seeResponseContains('sectionStatuses');
        $I->seeResponseContains('businessOptionStatuses');
    }

    public function testToEnsureIfICanSaveBusiness(ApiTester $I)
    {
        $I->wantToTest('to ensure if I can save business');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendPUT('/user/business', [
            'business_option_id' => 4,
           'business_name' => 'unknown',
        ]);

        $I->seeResponseCodeIs(400);

        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);
        $response = json_decode($I->grabResponse());
        $I->haveHttpHeader('Authorization', 'Bearer ' . $response->token);

        $I->sendPUT('/user/business', [
            'business_option_id' => 4,
            'business_name' => 'New Updated Business',
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('New Updated Business');
    }

}
