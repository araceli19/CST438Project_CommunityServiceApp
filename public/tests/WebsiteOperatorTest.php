<?php
ini_set('memory_limit', '256M');
//testing Website Operator table
use PHPUnit\Framework\TestCase;
include_once("WebsiteOperatorConn.php");

class WebsiteOperatorTest extends TestCase
{
  //inserts mock data
    public function test_insertWebsiteOp(){
        $operator = new WebsiteOperatorConn();
        $data = $operator::insertDataWebsiteOp("Karen Lopez","831888888", "karen@gmail.com", "123");
        $this->assertEquals($data,true);
    }


    //select only one operator
    public function test_selectOneWebsiteOp(){
        $operator = new WebsiteOperatorConn();
        $data = $operator::selectWebsiteOp("Karen");
      //  $this->assertEquals($data, "Karen");

    }
    //get all Website Operators
    public function test_getAllWebsiteOp(){
        $operator = new WebsiteOperatorConn();
        $data = $operator::getAllWebsiteOp();
        $this->assertTrue(true);
    }
    //test deletion with mock data
    public function test_deleteWebsiteOp(){
      $operator = new WebsiteOperatorConn();
        $data = $operator::removeWebsiteOp("Karen Lopez","831888888", "karen@gmail.com", "123");
        $this->assertTrue($data);
    }
}
?>
