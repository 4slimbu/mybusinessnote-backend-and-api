<?php

use Tymon\JWTAuth\Facades\JWTAuth;

class UserAuthTestCest
{
    /* @test */
    public function testLoginIsSuccess(ApiTester $I)
    {
        $I->wantToTest('login is success');
        // send credential data
        $I->sendPOST('/user/login', ['email' => 'leveltwoalmostcomplete@gmail.com', 'password' => 'password']);

        // login success
        $I->seeResponseCodeIs(200);
        // check to see if response contain token
        $I->seeResponseContains('token');

        $response = json_decode($I->grabResponse());
        JWTAuth::setToken($response->token);
        var_dump(JWTAuth::decode(JWTAuth::getToken()));
        // check if returned user data is contain expected email
        $I->seeResponseContainsJson(['successCode' => 'LOGIN_SUCCESS']);
    }

}
