<?php

class TrackClickTestCest
{
    /* @test */
    public function testIfTrackClickOfAuthUser(ApiTester $I)
    {
        $I->wantToTest('Test if track click of auth user');

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);
        $response = json_decode($I->grabResponse());
        $I->haveHttpHeader('Authorization', 'Bearer ' . $response->token);

        $I->sendGET('/click?bo_id=4&aff_id=1');

        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('successCode');
    }

}
