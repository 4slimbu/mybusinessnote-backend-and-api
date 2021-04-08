<?php

use Tymon\JWTAuth\Facades\JWTAuth;

class BusinessOptionTestCest
{
    /* @test */
    public function testToEnsureIfICanGetBusinessOptions(ApiTester $I)
    {
        $I->wantToTest('to ensure if I can get business options');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendGET('/business-options');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('businessOptions');
    }

    /* @test */
    public function testToEnsureIfICanGetSingleBusinessOption(ApiTester $I)
    {
        $I->wantToTest('to ensure if I can get single business option');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendGET('/business-option/2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('businessOption');
    }

    /* @test */
    public function testToEnsureIfICanSaveBusinessOption(ApiTester $I)
    {
        $I->wantToTest('to ensure if I can save business option');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        // for guest user
        $I->sendPOST('/business-option/7', [
            'business_meta' => [
                'tagline' => 'new updated tagline'
            ]
        ]);

        $I->seeResponseCodeIs(400);

        // for authenticated user
        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);
        $response = json_decode($I->grabResponse());
        $I->haveHttpHeader('Authorization', 'Bearer ' . $response->token);

        $I->sendPOST('/business-option/7', [
            'business_meta' => [
                'tagline' => 'new tagline'
            ]
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('new tagline');

    }

}
