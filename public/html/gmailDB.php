<?php

//require_once ('../../libraries/Google/autoload.php');

$client_id = '23817671136-knscbm6p1l4aj046g7dun6hva9ovg1v2.apps.googleusercontent.com';
$client_secret = 'eNYtCnk3MVXfBYtnCYEepqQd';
$redirect_uri = 'http://sample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com/index.php';

//database
$host_name= "sedatabases.clgz1qavgh08.us-west-2.rds.amazonaws.com:3306";
$db_username = "seclass";
$db_password = "sedb1234";
$db_name = "Community_Service_Finder";
//$db_username = "root"; //Database Username
//$db_password = "123"; //Database Password
//$host_name = "127.0.0.1"; //Mysql Hostname
//$db_name = 'Community_Service_Finder'; //Database Name

if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

$service = new Google_Service_Oauth2($client);


if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}

if($client->isAccessTokenExpired()) {
    $authUrl = $client->createAuthUrl();
    //unset code only if it gives you an expiration error
    //header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}


?>
<html>

<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <title> Community Service Finder</title>
           <link rel="stylesheet" type="text/css" href="home.css">
    </head>
</html>
