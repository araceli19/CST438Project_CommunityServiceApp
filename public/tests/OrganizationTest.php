<?php
//testing Volunteer Organization with mock tests
use PHPUnit\Framework\TestCase;
include_once("public/html/lib/OrganizationConn.php");

class OrganizationTest extends TestCase
{
  //first insert mock data
    public function test_insertOrg(){
        $volunteer1 = new OrganizationConn();
        $data1 = $volunteer1::insertDataOrg("SPCA","SPCA","831888888", "spca@gmail.com", "123");
        $this->assertEquals($data1,true);
    }

    //select only one organization
    public function test_selectOneOrg(){
        $volunteer1 = new OrganizationConn();
        $data1 = $volunteer1::selectVolunteerOrg("SPCA");

    }
    //retrieve all
    public function test_getAllOrg(){
        $volunteer1 = new OrganizationConn();
        $data1 = $volunteer1::getAllOrg();
        $this->assertTrue(true);
    }
    //test deletion
        public function test_deleteOrg(){
            $volunteer1 = new OrganizationConn();
            $data1 = $volunteer1::removeVolunteerOrg("SPCA","SPCA","831888888", "spca@gmail.com", "123");
            $this->assertTrue($data1);
        }
}
?>
