<?php
//Araceli Gopar
//test Volunteer table
//Start by inserting data and then test deletion, selection one and selection all Volunteers

use PHPUnit\Framework\TestCase;

include_once("public/html/lib/AvailableServices.php");

class AvailableServicesTest extends TestCase
{
  //Available_Services (Organization_ID, Category_ID, Hours_Available, Volunteers_Needed, Description, Name_Of_Service, Phone_Num)
  //VALUES(1,2, 10, 5, 'Students needed to tutor first graders', 'Tutoring at Grace Elementary', '(347)390-0851');
    public function test_insert(){
        $service = new AvailableServices();
        $data1 = $service::insertDataServices(4, 2, 4,10, 'Students needed to tutor first graders','(347)390-0851','Tutoring at Grace Elementary');
      //  $Organization_ID,$Category_ID,$Hours_Available,$Volunteers_Needed,$Description,$Phone_Num,$Name_Of_Service
        $this->assertEquals($data1,true);
    }

    public function test_delete(){
      //deletes from table
        $service = new AvailableServices();
        $data1 = $service::removeAvailableServices(4, 2, 4,10, 'Students needed to tutor first graders','(347)390-0851','Tutoring at Grace Elementary');
        $this->assertTrue($data1);
    }
    public function test_selectOne(){
      //selects one from table
        $service = new AvailableServices();
        $data1 = $service::selectAvailableService(3);

    }
    public function test_getAll(){
      //gets all services
        $service = new AvailableServices();
        $data1 = $service::getAllAvailableServices();
        $this->assertTrue(true);
    }
}
?>
