<?php

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

class aboutMeTest extends IntegrationTest{

  protected $baseUrl = 'http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com/';
    /** @test */
    function it_loads_the_page(){
      //check if can click and page loads
      //also checks that users see the email to contact us
      $this->visit('/')->click('Contact Us')
      ->seePageIs('/http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com/public/html/contactUs.html')
      ->see('communityservice@community.com');
    }
}

 ?>
