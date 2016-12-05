<?php
//testing Volunteer Organization with mock tests

use PHPUnit\Framework\TestCase;
include_once("public/html/lib/Categories.php");

class CategoriesTest extends TestCase
{
  //first insert mock data
    public function test_Categories(){
        $category = new Categories();
        $data1 = $category::insertDataCategory("Holidays");
        $this->assertEquals($data1,true);
    }


    //select only one organization
    public function test_select_one_Category(){
        $category = new Categories();
        $data1 = $category::selectCategory("Holidays");

    }
    //retrieve all
    public function test_getAllCategory(){
        $category = new Categories();
        $data1 = $category::getAllCategories();
        $this->assertTrue(true);
    }
    //test deletion
        public function test_deleteCategory(){
            $category = new Categories();
            $data1 = $category::removeCategory("Holidays");
            $this->assertTrue($data1);
        }
}
?>
