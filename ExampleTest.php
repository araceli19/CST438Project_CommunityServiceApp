<?php

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;
use Laracasts\TestDummy\Factoryy as TestDummy;

class ExampleTest extends IntegrationTest{
  protected $baseUrl = 'http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com/';

  /**
  * @return void
  */
  public function testA(){

     TestDummy::create('App\Post', )
      $this->visit('');
  }


}


 ?>
