<?php
  session_start(); //session start
  require_once('libraries/Google/autoload.php');
  include_once('public/html/gmailDB.php');

?>

 <html>
     <head>
       <link rel="stylesheet" type="text/css" href="public/homePage.css"/>
     </head>
     <body>

<!--  <nav class="navbar navbar-inverse"> -->
      <div class="container-fluid">

          <div class="navbar-header">
            <a class="navbar-brand" href="#"> <img class="resize" src="public/images/logo.png" /></a>
          </div>

      <ul align="right" class="nav navbar-nav">
          <li class="active"><a href="index.php" id="currentPage"><h2>Home</h2></a></li>
          <li><a href= "public/html/Search.php"><h1>Services</h1></a></li>
          <li><a href= "public/html/volunteer_profile.php"><h2>My Profile</h2></a></li>
          <li><a href= "public/html/contactUs.html"><h2>Contact Us</h2></a></li>



      </ul>
    </div>
<!--  </nav>  -->


  <div id="left">
    <form action="" method="POST"
  <input type="submit" name="withGmail" id="enter" value="Login as Volunteer" />


      <?php
                if (isset($authUrl)) {
                   	  echo '<div align="right">';
                   	  echo '<a class="login" href="' . $authUrl . '"><img src="public/html/images/button.png" /></a>';
               echo '</div>';

             }
               else {
                 	$user = $service->userinfo->get(); //get user info
                 	$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name); //connect db
                  if ($mysqli->connect_error) { die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error); }
                 	    $result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
                 	    $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
               	if($user_count) //if user already exist change greeting text to "Welcome Back"
                   {
                     if($user->email === "agopar@csumb.edu")
                           echo "<li><a href= 'public/html/provider_profile.php'><h2> Provider </h2></a></li>";

                      $_SESSION['userId'] = $user->id;
                       $message = 'Welcome back '.$user->name.'!';


                       echo $message . "<br>" . "<br>";
                       echo '<a href="'.$redirect_uri.'?logout=1" class="btn btn-info btn-sm">
                         <span class="glyphicon glyphicon-log-out"></span> Log out </a>';}
               	else {//else greeting text "Thanks for registering"
                    $_SESSION['userId'] = $user->id;
               	    $statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
                 		$statement->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
                 		$statement->execute();
                    if($user->email === "agopar@csumb.edu")
                          echo "<li><a href= 'public/html/provider_profile.php'><h2> Provider </h2></a></li>";
                       $message = 'Hi '.$user->name.', Thanks for Registering!';


                       echo $message . "<br>"."<br>";
                       echo '<a href="'.$redirect_uri.'?logout=1" class="btn btn-info btn-sm">
                         <span class="glyphicon glyphicon-log-out"></span> Log out </a>';}
                      }
                  echo '</div>';
            ?>

</a>
      </div>

<!-- Intro div. style the title/home page -->
      <div class="intro">
         <br> Community Service Finder <br>
      </div>
<!-- Rest of content in home page -->
      <div style="color:#4d4f51; font-family:Palatino Linotype; font-size: 200%;">
        <p> We strive to make our community better by connecting
        individuals and partners <br />together
        to allow anyone to fulfill their community service needs. </p>
        <br><br>
        <h2 style="font-style: oblique; color:white; text-shadow: black 2px 2px;">
          Find the service, make the change, leave the impact.
        <h2>
      </div>
</body>
</html>
