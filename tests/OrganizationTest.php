<?php
use PHPUnit\Framework\TestCase;
include_once("OrganizationConn.php");

class OrganizationTest extends TestCase
{
    public function test_insertOrg(){
        $volunteer1 = new OrganizationConn();
        $data1 = $volunteer1::insertDataOrg("SPCA","SPCA","831888888", "spca@gmail.com", "123");
        $this->assertEquals($data1,true);
    }

    public function test_deleteOrg(){
        $volunteer1 = new OrganizationConn();
        $data1 = $volunteer1::removeVolunteerOrg("SPCA","SPCA","831888888", "spca@gmail.com", "123");
        $this->assertTrue($data1);
    }
    public function test_selectOneOrg(){
        $volunteer1 = new OrganizationConn();
        $data1 = $volunteer1::selectVolunteerOrg("SPCA");

    }
    public function test_getAllOrg(){
        $volunteer1 = new OrganizationConn();
        $data1 = $volunteer1::getAllOrg();
        $this->assertTrue(true);
    }
}
?>
