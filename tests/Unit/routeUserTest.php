<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteUserTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     * @return array
     */
    public function testAPIpage(){
        $response = $this->call('GET','users');
        $this->assertEquals(200,$response->status());
    }

    // Test route index page
    public function testIndexPage() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

}
