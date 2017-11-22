<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class BusinessesTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_businesses()
    {

        $business = factory('App\Models\Business')->create();

        $response = $this->get('/businesses');
        $response->assertSee($business->business_name);

    }

    /** @test */
    public function a_user_can_view_single_business()
    {
        $business = factory('App\Models\Business')->create();

        $response = $this->get($business->path());
        $response->assertSee($business->business_name);

    }


    /** @test */
    public function a_guest_may_not_register_business()
    {

        $business = factory('App\Models\Business')->make();
        $this->post('/business', $business->toArray());

    }



}
