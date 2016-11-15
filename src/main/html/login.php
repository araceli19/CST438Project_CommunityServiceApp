<?php
//Data Clumps
//Extract Method in Php
//Extract Class
//removed extra lines by adding a new class
session_start();
include 'gmailSignIn.php';

  $_SESSION['user'] = $id;

  if($_SESSION['user'] != NULL)
  echo $_SESSION['user'];

  ?>

 <!DOCTYPE html>

 <html>
     <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

           <meta name="google-signin-scope" content="profile email">
           <meta name="google-signin-client_id" content="23817671136-knscbm6p1l4aj046g7dun6hva9ovg1v2.apps.googleusercontent.com">
           <meta charset="utf-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">

           <script src="https://apis.google.com/js/platform.js" async defer></script>
           <title> Community Service Finder</title>
            <link rel="stylesheet" type="text/css" href="home.css">
     </head>


     <body>
         <header>
         <div id = "header">
         <h1> Community Service Finder </h1>
         </div>

         </header>

         <?php $id = $_GET["name"]; ?>

                  <div  id="<?php echo $id?>" class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" ></div>
                  <br>
                  <a href="login.php" class="btn btn-default btn-sm" onclick="signOut();">
                            <span class="glyphicon glyphicon-log-out"></span> Log out
                  </a>

                  <div id= "name" data-onsuccess="onSignIn"></div>
                  <br> <br><br>

         <nav>
         <a href= "login.php" id="currentPage">Home</a>
         <a href= "search.php">Services</a>
         <a href= "volunteer_profile.html">My Profile</a>
         <a href= "contactUs.html">Contact Us</a>

         </nav>

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
                        <li>
                            search for community service opportunites
                        </li>
                        <li>
                            keep track of your completed hours
                        </li>
                        <li>
                            manage your own volunteer profile
                        </li>
                    </ul>


                 As a community service provider, you'll be able to:
                     <ul class="list">
                         <li>
                             post your volunteer opportunities
                         </li>
                         <li>
                             review student volunteers
                         </li>
                         <li>
                             keep track of previous volunteers
                         </li>
                     </ul>
             </div>

         </div>

         <br/><br/><br/>

      </div>
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
<?php
