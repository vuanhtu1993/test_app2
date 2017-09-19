<?php

namespace Test\Unit;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use Tests\TestCase;

/**
 * Class EditUserTest
 * @package Test\Unit
 */
class EditUserTest extends TestCase
{
    //not run into database
    use DatabaseTransactions;

    public function testEditValid()
    {
        $request = [
            'name' => 'anh tus scuti',
            'age' => '24',
            'address' => 'afjiodjsofjdiojgojsgjsogj',
        ];

        $user = factory(User::class)->create([
            'name'=>'Anh Tus',
            'age'=>'24',
            'address'=>'hoang hoa tham']);
        $user_id = $user->id;
        $response = $this->call('POST', 'update/'.$user_id, $request);
        $this->assertDatabaseHas('users',$request);

    }

    // validation all attr is empty
    public function testEditEmpty()
    {
        $request = [
            'name'=>'',
            'age'=> '',
            'address'=>''
        ];
        // create faker database
    $user = factory(User::class)->create([
        'name'=>'Anh Tus',
        'age'=>'24',
        'address'=>'hoang hoa tham']);

        /** @var number $user_id */
        $user_id = $user->id;
       $this->call('POST','update/'. $user_id, $request);
       $this->assertDatabaseMissing('users',$request);
    }


    public function testEditWrongTypeAge(){
        $request = [
            'name'=>'anh tus',
            'age'=> '24e',
            'address'=>'nguyen phong sac'
        ];

        $user = factory(User::class)->create([
            'name'=>'Anh Tus',
            'age'=>'24',
            'address'=>'hoang hoa tham']);


        $user_id = $user->id;
        $this->call('POST','update/'. $user_id, $request);
        $this->assertDatabaseMissing('users',$request);
    }

    public function testEditNameLongerAllowed(){
        $request = [
            'name' => '11234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
            'age' => '24',
            'address' => 'fhiafiuhaduifhifhi',
        ];
        $user = factory(User::class)->create([
            'name'=>'Anh Tus',
            'age'=>'24',
            'address'=>'hoang hoa tham']);


        $user_id = $user->id;
        $this->call('POST','update/'. $user_id, $request);
        $this->assertDatabaseMissing('users',$request);
    }
    public function testEditAddressLongerAllowed(){
        $request = [
            'name' => '123456789012789012345678901234567890',
            'age' => '24',
            'address' => '1123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
        ];
        $user = factory(User::class)->create([
            'name'=>'Anh Tus',
            'age'=>'24',
            'address'=>'hoang hoa tham']);

        $user_id = $user->id;
        $this->call('POST','update/'. $user_id, $request);
        $this->assertDatabaseMissing('users',$request);
    }



}

?>