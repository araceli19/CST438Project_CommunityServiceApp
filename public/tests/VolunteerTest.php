<?php
//test Volunteer table
//adding mock data:
//Start by inserting data and then test deletion, selection one and selection all Volunteers

use PHPUnit\Framework\TestCase;
include_once("dbConnection.php");

class VolunteerTest extends TestCase
{
    public function test_insert(){
        $volunteer1 = new dbConnection();

        $data1 = $volunteer1::insertData("Noemi","12/07/98","Harden Middle School", 123, 3.4,"813330111");
        $this->assertEquals($data1,true);
    }

    public function test_delete(){
      $volunteer1 = new dbConnection();
        $data1 = $volunteer1::removeVolunteer("Noemi","12/07/98","Harden Middle School", 123, 3.4,"813330111");
        $this->assertTrue($data1);
    }
    public function test_selectOne(){
      $volunteer1 = new dbConnection();

        $data1 = $volunteer1::selectVolunteer("Noemi");

    }
    public function test_getAll(){
        $volunteer1 = new dbConnection();
        $data1 = $volunteer1::getAll();

        $this->assertTrue(true);
    }
}
?>
