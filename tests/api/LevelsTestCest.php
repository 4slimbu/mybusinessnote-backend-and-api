<?php

class LevelsTestCest
{
    /* @test */
    public function testIfReturnAllLevelsAlongwithSections(ApiTester $I)
    {
        $I->wantToTest('Should return all levels along with sections');

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET('/levels');

        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('levels');
        $I->seeResponseContains('sections');
    }

}
