<?php
namespace Test\Unit;

use Test\Unit;
use Tests\TestCase;

class AddUserTest extends TestCase{


    protected function assertFalseStatus($request){

        $response = $this->call('POST','users',$request);

        $this->assertEquals(200,$response->status());

    }
//    public function testAddUser(){
//        $request = [
//            'name'=>'Anh Tussssssss',
//            'age'=>'24',
//            'address'=>'fsdjhghivhaisdhf',
//        ];
//        $response = $this->call('POST','users',$request);
//        $data = json_decode($response->getContent(),true);
//        $this->assertEquals(200,$response->status());
//        if ($data[0]['status'] == false){
//            $this->assertTrue(true);
//        }
//            else $this->assertFalse(false);
//
//    }

    //test validation age wrong type
    public function testAddUser2(){
        $request = [
            'name'=>'Anh Tus',
            'age'=>'24e',
            'address'=>'fsdjhghivhaisdhf',
        ];
        $this->assertFalseStatus($request);

    }

    //test validation name and address longer than allowed
    public function testAddUser3(){
        $request = [
            'name'=>'11234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
            'age'=>'24',
            'address'=>'1123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
        ];
        $this->assertFalseStatus($request);
    }
//test validation name and address null
    public function testAddUser4()
    {
        $request = [
            'name'=>'',
            'age'=>'24',
            'address'=>'',
        ];
        $this->assertFalseStatus($request);
    }
}
?>