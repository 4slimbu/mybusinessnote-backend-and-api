<?php

class BusinessCategoriesTestCest
{
    /* @test */
    public function testIfReturnAllBusinessCategories(ApiTester $I)
    {
        $I->wantToTest('Should return all business categories');

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET('/business-categories');

        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('businessCategories');
    }

}
