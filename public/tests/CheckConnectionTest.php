<?php
use Drs\Models\ProductTab;
   use Drs\Models\Equipment;
use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;


class CheckConnectionTest extends IntegrationTest
{
    protected $baseUrl = "http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com/";

    /** @test */

    function check_page_connection()
    {
      $this->visit('public/html/contactUs.html')
           ->andSee('communityservice@community.com');
    }

}
?>
