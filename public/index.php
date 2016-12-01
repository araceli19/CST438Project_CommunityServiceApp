<?php
  session_start(); //session start
  include_once('html/gmailDB.php');
?>
<?php
  include "lib/Volunteer.php";
  $test = new Volunteer();
  echo "test: ".$test->pop();
?>
 <html>
     <head>
            <link rel="stylesheet" type="text/css" href="html/home.css">
     </head>
     <body>

  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><h3>Community Service Finder</h3></a>
          </div>
      <ul align="right" class="nav navbar-nav">
          <li class="active"><a href="index.php" id="currentPage"><h5>Home</h5></a></li>
          <li> <a href= "html/Search.php"><h5>Services</h5></a></li>
          <li><a href= "html/volunteer_profile.html"><h5>My Profile</h5></a></li>
          <li><a href= "html/contactUs.html"><h5>Contact Us</h5></a></li>
      </ul>
    </div>
  </nav>


  <div id="left">
    <form action="" method="POST"
  <input type="submit" name="withGmail" id="enter" value="Login as Volunteer" />


      <?php
               echo '<div style="margin:20px">';
                if (isset($authUrl)) {
                   	  echo '<div align="left">';
                   	  echo '<a class="login" href="' . $authUrl . '"><img src="html/images/gmail_btn.png" /></a>';
               echo '</div>'; }

               else {
                 	$user = $service->userinfo->get(); //get user info

                 	$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name); //connect db
                  if ($mysqli->connect_error) { die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error); }
                 	    $result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
                 	    $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

               	if($user_count) //if user already exist change greeting text to "Welcome Back"
                   {
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
                       $message = 'Hi '.$user->name.', Thanks for Registering!';
                       echo $message . "<br>"."<br>";
                       echo '<a href="'.$redirect_uri.'?logout=1" class="btn btn-info btn-sm">
                         <span class="glyphicon glyphicon-log-out"></span> Log out </a>';}
                      }
                  echo '</div>';
            ?>
      </div>

         <div class="intro" style="background-color:black;color:white;padding:20px;">
             <h2><b>Welcome to the Community Service Finder!</b></h2>
             <div>
                We strive to make our community better by
                connecting students and partners together
                so that students can fulfull their community
                service requirements and our partners can
                receive dedicated workers.

                <br/><br/>

                As a student, you'll be able to:

                    <ul class="list">
                        <li> search for community service opportunites </li>
                        <li>  keep track of your completed hours  </li>
                        <li>manage your own volunteer profile</li>
                    </ul>

                 As a community service provider, you'll be able to:
                     <ul class="list">
                         <li> post your volunteer opportunities </li>
                         <li> review student volunteers </li>
                         <li> keep track of previous volunteers </li>
                     </ul>
             </div>
         </div>

         <br/> <br/> <br/>
      <script>

		// initialize and setup facebook js sdk
    //ecapsulate connection into function
    function establishConnection() {
      window.fbAsyncInit = function() {
  		    FB.init({
  		      appId      : '1632270773737570',
  		      xfbml      : true,
  		      version    : 'v2.5'
  		    });
  		    FB.getLoginStatus(function(response) {
  		    	if (response.status === 'connected') {
  		    		document.getElementById('status').innerHTML = 'We are connected.';
  		    		document.getElementById('login').style.visibility = 'hidden';
  		    	} else if (response.status === 'not_authorized') {
  		    		document.getElementById('status').innerHTML = 'We are not logged in.'
  		    	} else {
  		    		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
  		    	}
  		    });
  		};
      return true;
    }

		function(d, s, id){
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) {return;}
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		// login with facebook with extra permissions
    //after login, retirve user information
		function login() {
			FB.login(function(response) {
				if (response.status === 'connected') {
		    		document.getElementById('status').innerHTML = 'We are connected.';
		    		document.getElementById('login').style.visibility = 'hidden';
		    	} else if (response.status === 'not_authorized') {
		    		document.getElementById('status').innerHTML = 'We are not logged in.'
		    	} else {
		    		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    	}
			}, {scope: 'email'});

      FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
				document.getElementById('status').innerHTML = response.id;
			});
		}

    //establish connection
    establishConnection();
/*
		// getting basic user info
		function getInfo() {
			FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
				document.getElementById('status').innerHTML = response.id;
			});
		}
*/
	</script>

	<div id="status"></div>
	<!--<button onclick="getInfo()">Get Info</button>-->
	<button onclick="login()" id="login">Login</button>
</body>
</html>
