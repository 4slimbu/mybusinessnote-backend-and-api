<?php

use App\Http\Controllers\Admin\BusinessOptionController;
use App\Http\Requests\Admin\BusinessOptionValidation\CreateFormValidation;
use App\Models\BusinessOption;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BusinessOptionTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Test business option moveUp method
     */
    public function testMoveUp()
    {
        $this->tester->amGoingTo('test business option moveUp method');
        $businessOptionController = new BusinessOptionController();
        $businessOption = BusinessOption::find(10);
        // Move business option up the order: decrease its menu_order
        $businessOptionController->moveUp($businessOption);

        $businessOption = BusinessOption::find(10);
        $replacedBusinessOption = BusinessOption::find(9);

        // Its menu_order should decreased by one
        $this->tester->assertEquals(9, $businessOption->menu_order);
        // Its section_id should be equal to the replaced business option's section_id
        $this->tester->assertEquals($replacedBusinessOption->section_id, $businessOption->section_id);
        // The replaced business option should have menu_order increased by one
        $this->tester->assertEquals(10, $replacedBusinessOption->menu_order);
    }

    /**
     * Test business option moveDown method
     */
    public function testMoveDown()
    {
        $this->tester->amGoingTo('test business option moveDown method');
        $businessOptionController = new BusinessOptionController();
        $businessOption = BusinessOption::find(10);
        // Move business option up the order: decrease its menu_order
        $businessOptionController->moveDown($businessOption);

        $businessOption = BusinessOption::find(10);
        $replacedBusinessOption = BusinessOption::find(11);

        // It menu_order should increased by one
        $this->tester->assertEquals(11, $businessOption->menu_order);
        // Its section_id should be the same as the section_id of the business option that it replaced
        $this->tester->assertEquals($replacedBusinessOption->section_id, $businessOption->section_id);
        // The replaced business option should takes its place, so it should have menu_order decreased by one
        $this->tester->assertEquals(10, $replacedBusinessOption->menu_order);
    }

    /**
     * Test business option moveTo method
     */
    public function testMoveTo()
    {
        $this->tester->amGoingTo('test business option moveTo method');
        $businessOptionController = new BusinessOptionController();
        $businessOption = BusinessOption::find(10);

        // Move business option up the order: decrease its menu_order
        // Here it will take the spot right behind the destination so its menu_order will be +1 greater
        // ----------------------------------------------------------
        $businessOptionController->moveTo($businessOption, 4);
        $destinationBusinessOption = BusinessOption::where('menu_order', 4)->first();

        $finalBusinessOptions = BusinessOption::select('id', 'section_id', 'menu_order')->orderBy('menu_order', 'asc')->get()->toArray();

        $expectedResult = [
            "id"         => $businessOption->id,
            "section_id" => $destinationBusinessOption->section_id,
            "menu_order" => $destinationBusinessOption->menu_order + 1,
        ];

        $this->tester->assertContains($expectedResult, $finalBusinessOptions);

        // Move business option down the order: increase its menu_order
        // To take the spot right behind the destination, it should take menu_order of destination
        // as it will move one place up the order and leave the place vacant
        // ------------------------------------------------------------
        $businessOptionController->moveTo($businessOption, 15);
        $destinationBusinessOption = BusinessOption::where('menu_order', 15)->first();

        $finalBusinessOptions = BusinessOption::select('id', 'section_id', 'menu_order')->orderBy('menu_order', 'asc')->get()->toArray();

        $expectedResult = [
            "id"         => $businessOption->id,
            "section_id" => $destinationBusinessOption->section_id,
            "menu_order" => $destinationBusinessOption->menu_order,
        ];

        $this->tester->assertContains($expectedResult, $finalBusinessOptions);

    }
}