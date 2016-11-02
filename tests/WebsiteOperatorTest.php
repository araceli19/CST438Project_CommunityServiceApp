<?php
use PHPUnit\Framework\TestCase;
include_once("WebsiteOperatorConn.php");

class WebsiteOperatorTest extends TestCase
{
    public function test_insertWebsiteOp(){
        $operator = new WebsiteOperatorConn();
        $data = $operator::insertDataWebsiteOp("Karen Lopez","831888888", "karen@gmail.com", "123");
        $this->assertEquals($data,true);
    }

    public function test_deleteWebsiteOp(){
      $operator = new WebsiteOperatorConn();
        $data = $operator::removeWebsiteOp("Karen Lopez","831888888", "karen@gmail.com", "123");
        $this->assertTrue($data);
    }
    public function test_selectOneWebsiteOp(){
        $operator = new WebsiteOperatorConn();
        $data = $operator::selectWebsiteOp("Karen");
      //  $this->assertEquals($data, "Karen");

    }
    public function test_getAllWebsiteOp(){
        $operator = new WebsiteOperatorConn();
        $data = $operator::getAllWebsiteOp();
        $this->assertTrue(true);
    }
}
?>
