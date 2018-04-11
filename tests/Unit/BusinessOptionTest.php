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
        // ----------------------------------------------------------
        $businessOptionController->moveTo($businessOption, 4);

        $finalBusinessOptions = BusinessOption::select('id', 'section_id', 'menu_order')->orderBy('menu_order', 'asc')->get()->toArray();

        $expectedResult = [
            [
                "id"          => 1,
                "section_id" => 1,
                "menu_order" => 1,
            ],
            [
                "id"         => 2,
                "section_id" => 1,
                "menu_order" => 2,
            ],
            [
                "id"         => 3,
                "section_id" => 2,
                "menu_order" => 3,
            ],
            [
                "id"         => 4,
                "section_id" => 3,
                "menu_order" => 4,
            ],
            [
                "id"         => 10,
                "section_id" => 3,
                "menu_order" => 5,
            ],
            [
                "id"         => 5,
                "section_id" => 4,
                "menu_order" => 6,
            ],
            [
                "id"         => 6,
                "section_id" => 5,
                "menu_order" => 7,
            ],
            [
                "id"         => 7,
                "section_id" => 5,
                "menu_order" => 8,
            ],
            [
                "id"         => 8,
                "section_id" => 5,
                "menu_order" => 9,
            ],
            [
                "id"         => 9,
                "section_id" => 5,
                "menu_order" => 10,
            ],
            [
                "id"         => 11,
                "section_id" => 6,
                "menu_order" => 11,
            ],
            [
                "id"         => 12,
                "section_id" => 6,
                "menu_order" => 12,
            ],
            [
                "id"         => 13,
                "section_id" => 6,
                "menu_order" => 13,
            ],
            [
                "id"         => 14,
                "section_id" => 7,
                "menu_order" => 14,
            ],
            [
                "id"         => 15,
                "section_id" => 7,
                "menu_order" => 15,
            ],
            [
                "id"         => 16,
                "section_id" => 7,
                "menu_order" => 16,
            ],
            [
                "id"         => 17,
                "section_id" => 7,
                "menu_order" => 17,
            ],
            [
                "id"         => 18,
                "section_id" => 7,
                "menu_order" => 18,
            ],
            [
                "id"         => 19,
                "section_id" => 8,
                "menu_order" => 19,
            ],
            [
                "id"         => 20,
                "section_id" => 8,
                "menu_order" => 20,
            ],
            [
                "id"         => 21,
                "section_id" => 8,
                "menu_order" => 21,
            ],
            [
                "id"         => 22,
                "section_id" => 8,
                "menu_order" => 22,
            ],
            [
                "id"         => 23,
                "section_id" => 8,
                "menu_order" => 23,
            ],
            [
                "id"         => 24,
                "section_id" => 9,
                "menu_order" => 24,
            ],
            [
                "id"         => 25,
                "section_id" => 10,
                "menu_order" => 25,
            ],
            [
                "id"         => 26,
                "section_id" => 10,
                "menu_order" => 26,
            ],
            [
                "id"         => 27,
                "section_id" => 10,
                "menu_order" => 27,
            ],
            [
                "id"         => 28,
                "section_id" => 11,
                "menu_order" => 28,
            ],
            [
                "id"         => 29,
                "section_id" => 11,
                "menu_order" => 29,
            ],
            [
                "id"         => 30,
                "section_id" => 12,
                "menu_order" => 30,
            ],
            [
                "id"         => 31,
                "section_id" => 12,
                "menu_order" => 31,
            ],
            [
                "id"         => 32,
                "section_id" => 12,
                "menu_order" => 32,
            ],
        ];

        $this->tester->assertEquals($expectedResult, $finalBusinessOptions);

        // Move business option down the order: increase its menu_order
        // ------------------------------------------------------------
        $businessOptionController->moveTo($businessOption, 15);

        $finalBusinessOptions = BusinessOption::select('id', 'section_id', 'menu_order')->orderBy('menu_order', 'asc')->get()->toArray();

        $expectedResult = [
            [
                "id"         => 1,
                "section_id" => 1,
                "menu_order" => 1,
            ],
            [
                "id"         => 2,
                "section_id" => 1,
                "menu_order" => 2,
            ],
            [
                "id"         => 3,
                "section_id" => 2,
                "menu_order" => 3,
            ],
            [
                "id"         => 4,
                "section_id" => 3,
                "menu_order" => 4,
            ],
            [
                "id"         => 5,
                "section_id" => 4,
                "menu_order" => 5,
            ],
            [
                "id"         => 6,
                "section_id" => 5,
                "menu_order" => 6,
            ],
            [
                "id"         => 7,
                "section_id" => 5,
                "menu_order" => 7,
            ],
            [
                "id"         => 8,
                "section_id" => 5,
                "menu_order" => 8,
            ],
            [
                "id"         => 9,
                "section_id" => 5,
                "menu_order" => 9,
            ],
            [
                "id"         => 11,
                "section_id" => 6,
                "menu_order" => 10,
            ],
            [
                "id"         => 12,
                "section_id" => 6,
                "menu_order" => 11,
            ],
            [
                "id"         => 13,
                "section_id" => 6,
                "menu_order" => 12,
            ],
            [
                "id"         => 14,
                "section_id" => 7,
                "menu_order" => 13,
            ],
            [
                "id"         => 15,
                "section_id" => 7,
                "menu_order" => 14,
            ],
            [
                "id"         => 10,
                "section_id" => 7,
                "menu_order" => 15,
            ],
            [
                "id"         => 16,
                "section_id" => 7,
                "menu_order" => 16,
            ],
            [
                "id"         => 17,
                "section_id" => 7,
                "menu_order" => 17,
            ],
            [
                "id"         => 18,
                "section_id" => 7,
                "menu_order" => 18,
            ],
            [
                "id"         => 19,
                "section_id" => 8,
                "menu_order" => 19,
            ],
            [
                "id"         => 20,
                "section_id" => 8,
                "menu_order" => 20,
            ],
            [
                "id"         => 21,
                "section_id" => 8,
                "menu_order" => 21,
            ],
            [
                "id"         => 22,
                "section_id" => 8,
                "menu_order" => 22,
            ],
            [
                "id"         => 23,
                "section_id" => 8,
                "menu_order" => 23,
            ],
            [
                "id"         => 24,
                "section_id" => 9,
                "menu_order" => 24,
            ],
            [
                "id"         => 25,
                "section_id" => 10,
                "menu_order" => 25,
            ],
            [
                "id"         => 26,
                "section_id" => 10,
                "menu_order" => 26,
            ],
            [
                "id"         => 27,
                "section_id" => 10,
                "menu_order" => 27,
            ],
            [
                "id"         => 28,
                "section_id" => 11,
                "menu_order" => 28,
            ],
            [
                "id"         => 29,
                "section_id" => 11,
                "menu_order" => 29,
            ],
            [
                "id"         => 30,
                "section_id" => 12,
                "menu_order" => 30,
            ],
            [
                "id"         => 31,
                "section_id" => 12,
                "menu_order" => 31,
            ],
            [
                "id"         => 32,
                "section_id" => 12,
                "menu_order" => 32,
            ],
        ];

        $this->tester->assertEquals($expectedResult, $finalBusinessOptions);

        // Insert new  business option
        // ------------------------------------------------------------
        $businessOptionController = new BusinessOptionController();

        $request = new CreateFormValidation([
            "name"                 => "testing",
            "section_id"           => "5",
            "show_everywhere"      => "1",
            "content"              => "<p>asdfasd</p>",
            "element"              => "BrandColor",
            "tooltip"              => "<p>asdfasd</p>",
            "affiliate_link_label" => "aasdfasdfasd",
            "affiliate_link_id"    => [
                0 => "2",
            ],
            "weight"               => "1",
        ]);

        $businessOptionController->store($request);
        $finalBusinessOptions = BusinessOption::select('id', 'section_id', 'menu_order')->orderBy('menu_order', 'asc')->get()->toArray();

        $expectedResult = [
            [
                "id"         => 1,
                "section_id" => 1,
                "menu_order" => 1,
            ],
            [
                "id"         => 2,
                "section_id" => 1,
                "menu_order" => 2,
            ],
            [
                "id"         => 3,
                "section_id" => 2,
                "menu_order" => 3,
            ],
            [
                "id"         => 4,
                "section_id" => 3,
                "menu_order" => 4,
            ],
            [
                "id"         => 5,
                "section_id" => 4,
                "menu_order" => 5,
            ],
            [
                "id"         => 6,
                "section_id" => 5,
                "menu_order" => 6,
            ],
            [
                "id"         => 7,
                "section_id" => 5,
                "menu_order" => 7,
            ],
            [
                "id"         => 8,
                "section_id" => 5,
                "menu_order" => 8,
            ],
            [
                "id"         => 9,
                "section_id" => 5,
                "menu_order" => 9,
            ],
            [
                "id"         => 33,
                "section_id" => 5,
                "menu_order" => 10,
            ],
            [
                "id"         => 11,
                "section_id" => 6,
                "menu_order" => 11,
            ],
            [
                "id"         => 12,
                "section_id" => 6,
                "menu_order" => 12,
            ],
            [
                "id"         => 13,
                "section_id" => 6,
                "menu_order" => 13,
            ],
            [
                "id"         => 14,
                "section_id" => 7,
                "menu_order" => 14,
            ],
            [
                "id"         => 15,
                "section_id" => 7,
                "menu_order" => 15,
            ],
            [
                "id"         => 10,
                "section_id" => 7,
                "menu_order" => 16,
            ],
            [
                "id"         => 16,
                "section_id" => 7,
                "menu_order" => 17,
            ],
            [
                "id"         => 17,
                "section_id" => 7,
                "menu_order" => 18,
            ],
            [
                "id"         => 18,
                "section_id" => 7,
                "menu_order" => 19,
            ],
            [
                "id"         => 19,
                "section_id" => 8,
                "menu_order" => 20,
            ],
            [
                "id"         => 20,
                "section_id" => 8,
                "menu_order" => 21,
            ],
            [
                "id"         => 21,
                "section_id" => 8,
                "menu_order" => 22,
            ],
            [
                "id"         => 22,
                "section_id" => 8,
                "menu_order" => 23,
            ],
            [
                "id"         => 23,
                "section_id" => 8,
                "menu_order" => 24,
            ],
            [
                "id"         => 24,
                "section_id" => 9,
                "menu_order" => 25,
            ],
            [
                "id"         => 25,
                "section_id" => 10,
                "menu_order" => 26,
            ],
            [
                "id"         => 26,
                "section_id" => 10,
                "menu_order" => 27,
            ],
            [
                "id"         => 27,
                "section_id" => 10,
                "menu_order" => 28,
            ],
            [
                "id"         => 28,
                "section_id" => 11,
                "menu_order" => 29,
            ],
            [
                "id"         => 29,
                "section_id" => 11,
                "menu_order" => 30,
            ],
            [
                "id"         => 30,
                "section_id" => 12,
                "menu_order" => 31,
            ],
            [
                "id"         => 31,
                "section_id" => 12,
                "menu_order" => 32,
            ],
            [
                "id"         => 32,
                "section_id" => 12,
                "menu_order" => 33,
            ],
        ];

        $this->tester->assertEquals($expectedResult, $finalBusinessOptions);
    }
}