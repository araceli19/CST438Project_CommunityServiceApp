<?php

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

class MyProfileTest extends IntegrationTest{

//checks profiles displays correct buttons 
  protected $baseUrl = 'http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com/';
    /** @test */
    function check_search_page_exists(){
      $this->visit('/')
      ->click('My Profile')
      ->seePageIs('/http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com/public/html/volunteer_profile.php');
      //->see('My Profile');

    }
    /** @test */
    function check_search_page_search(){
      $this->visit('/')
      ->click('My Profile')
      ->visit('http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com//public/html/volunteer_profile_edit.php')
      ->andSee('Save Changes')
      ->onPage('http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com//public/html/volunteer_profile_edit.php');
    }



}


 ?>
