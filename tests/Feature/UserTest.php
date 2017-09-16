<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetUsers()
    {
        $response = $this->call('GET','users');
        $this->assertNotEmpty($response);
        $data = json_decode($response->getContent());
        $this->assertEquals(200,$response->status());
        $this->assertEquals(gettype($data),'array');
        $this->assertNotEmpty($data);
        $this->assertTrue(isset($data[0]));
        if($data[0]->id == 4){
            $this->assertTrue(true);

        }
//        if ($data[''] == 'fawafsffd'){
//            $this->assertEquals(true);
//        }
//        else $this->assertEquals(false);



    }
}
