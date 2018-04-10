<?php

use App\Http\Controllers\Admin\BusinessOptionController;
use App\Models\BusinessOption;

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
        // move business option up the order: decrease its menu_order
        $businessOptionController->moveUp($businessOption);

        $businessOption = BusinessOption::find(10);
        $replacedBusinessOption = BusinessOption::find(9);

        // assert if its menu_order has decreased by one
        $this->tester->assertEquals(9, $businessOption->menu_order);
        // assert if its section_id is equal to the replaced business option's section_id
        $this->tester->assertEquals($replacedBusinessOption->section_id, $businessOption->section_id);
        // assert if the replaced business option has menu_order increased by one
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
        // move business option up the order: decrease its menu_order
        $businessOptionController->moveDown($businessOption);

        $businessOption = BusinessOption::find(10);
        $replacedBusinessOption = BusinessOption::find(11);

        // assert if its menu_order has increased by one
        $this->tester->assertEquals(11, $businessOption->menu_order);
        // assert if its section_id is equal to the replaced business option's section_id
        $this->tester->assertEquals($replacedBusinessOption->section_id, $businessOption->section_id);
        // assert if the replaced business option has menu_order decreased by one
        $this->tester->assertEquals(10, $replacedBusinessOption->menu_order);
    }

    /**
     * Test business option moveTo method
     */
    public function testMoveTo()
    {
        $this->tester->amGoingTo('test business option moveTo method');
        $businessOptionController = new BusinessOptionController();
        $initialCount = BusinessOption::count();
        $businessOption = BusinessOption::find(10);

        // new business option
        $request = new \Illuminate\Http\Request([

        ]);
        $businessOptionController->store($request);

        // move business option up the order: decrease its menu_order
        $businessOptionController->moveTo($businessOption, 4);
        $finalCount = BusinessOption::count();
        $replacedBusinessOption = BusinessOption::find(4);

        $businessOption = BusinessOption::select('id', 'section_id', 'menu_order')->orderBy('menu_order', 'asc')->get()->toArray();

        // Business options count should be same
        $this->tester->assertEquals($initialCount, $finalCount);
        dd('hsdfds');
        // assert if its menu_order has increased by one
        $this->tester->assertEquals(11, $businessOption->menu_order);
        // assert if its section_id is equal to the replaced business option's section_id
        $this->tester->assertEquals($replacedBusinessOption->section_id, $businessOption->section_id);
        // assert if the replaced business option has menu_order decreased by one
        $this->tester->assertEquals(10, $replacedBusinessOption->menu_order);
    }
}