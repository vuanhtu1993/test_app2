<?php

namespace Test\Unit;

use Tests\TestCase;

class EditUserTest extends TestCase
{

    public function test()
    {
        $request = [
            'name' => '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
            'age' => '24',
            'address' => '123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
        ];
        $response = $this->call('POST', 'update/10', $request);
        $this->assertDatabaseHas('users',
            ['name' => $request['name'],
                'age' => $request['age'],
                'address' => $request['address']]);

    }
    public function testEditWrongTypeAge(){
        $request = [
            'name' => 'anh tusssss12',
            'age' => '24e',
            'address' => 'fhiafiuhaduifhifhi',
        ];
        $response = $this->call('POST', 'update/12', $request);
        $this->assertDatabaseMissing('users',$request);
    }

    public function testEditNameLongerAllowed(){
        $request = [
            'name' => '11234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
            'age' => '24',
            'address' => 'fhiafiuhaduifhifhi',
        ];
        $response = $this->call('POST', 'update/12', $request);
        $this->assertDatabaseMissing('users',$request);
    }
    public function testEditAddressLongerAllowed(){
        $request = [
            'name' => '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
            'age' => '24',
            'address' => '1123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
        ];
        $this->call('POST','update/12',$request);
        $this->assertDatabaseMissing('users',$request);
    }

}

?>