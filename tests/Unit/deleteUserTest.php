<?php

namespace Test\Unit;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use Tests\TestCase;

class deleteUserTest extends TestCase{
    //not run into database
    use DatabaseTransactions;
    public function testDeleteUser()
    {
        $user = factory(User::class)->create([
            'name'=>'Anh Tus',
            'age'=>'24',
            'address'=>'hoang hoa tham']);
        $user_id = $user->id;

        $response = $this->call('DELETE', 'users/'.$user_id);
//        $this->assertEquals(200,$response);
        $this->assertDatabaseMissing('users',
            [
            'name'=>'Anh Tus',
            'age'=>'24',
            'address'=>'hoang hoa tham'
            ]);

    }
}