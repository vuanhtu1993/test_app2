<?php
namespace Test\Unit;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\Unit;
use Tests\TestCase;

/**
 * Class AddUserTest
 * @package Test\Unit
 */
class AddUserTest extends TestCase{

    use DatabaseTransactions; //not run into database


    public function testAddUserValid(){
        $request = [
            'name'=>'Anh Tu scuti ofdafdfiw',
            'age'=>'80',
            'address'=>'34546789uygfsdfbcghnf',
        ];
        $response = $this->call('POST','users',$request);
        $this->assertDatabaseHas('users',$request);

    }
//test validation address age null
    public function testAddAgeEmpty()
    {
        $request = [
            'name'=>'Anh tussssss',
            'age'=>'',
            'address'=>'wvdvwidvergahvvisdivdvsbvsi'
        ];
        $this->call('POST','users',$request);
        $this->assertDatabaseMissing('users',$request);
    }

    //test validation age wrong type
    public function testAddUser2(){
        $request = [
            'name'=>'Anh Tus',
            'age'=>'24e',
            'address'=>'fsdjhghivhaisdhf',
        ];
        $response = $this->call('POST','users',$request);
        $this->assertDatabaseMissing('users',$request);

    }

    //test validation address longer than allowed (301 )
    public function testAddUser3(){
        $request = [
            'name'=>'11234567890129012345678901234567890',
            'age'=>'24',
            'address'=>'1123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
        ];
        $response = $this->call('POST','users',$request);
        $this->assertDatabaseMissing('users',$request);
    }

    //test validation name address longer than allowed (101 )
    public function testAddUser4(){
        $request = [
            'name'=>'1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
            'age'=>'24',
            'address'=>'11234567890129012345678901234567890',
        ];
        $response = $this->call('POST','users',$request);
        $this->assertDatabaseMissing('users',$request);
    }
//test validation name and address null
    public function testAddUser5()
    {
        $request = [
            'name'=>'',
            'age'=>'24',
            'address'=>'',
        ];
        $response = $this->call('POST','users',$request);
        $this->assertDatabaseMissing('users',$request);
    }
}
?>