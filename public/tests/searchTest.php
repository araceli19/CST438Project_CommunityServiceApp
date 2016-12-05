<?php

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

class searchTest extends IntegrationTest{

  protected $baseUrl = 'http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com/';
    /** @test */
    function check_search_page_exists(){
      $this->visit('/')
      ->click('Services')
      ->seePageIs('/http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com/public/html/Search.php')
      ->see('Search:');

    }
    /** @test */
    function check_search_page_search(){
      $this->visit('/public/html/Search.php')
      ->andType('Integration testing', 'search')
      ->press('searchForm')
      ->andSee('Search found :')
      ->onPage('http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com//public/html/Search.php');
    }
    /** @test */
    function check_search_find_correctSearch(){
      $this->visit('/public/html/Search.php')
      ->andType('Holiday Dinner', 'search')
      ->press('searchForm')
      ->andSee('Search found :')
      ->onPage('http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com//public/html/Search.php');
    }


}


 ?>
