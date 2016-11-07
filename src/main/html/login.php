<?php
session_start();
 $_SESSION['user'] = $user_id;

    if (id_token) {
 ?>
 <br><br>

    <script>
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });
    }
    </script>

  <a href="login.php" onclick="signOut();">Sign out</a>

 <?php

 } else {
   ?>
<br><br>

   <script>
     function onSignIn(googleUser) {
       // Useful data for your client-side scripts:
       var profile = googleUser.getBasicProfile();

       console.log("ID: " + profile.getId()); // Don't send this directly to your server!
       console.log('Full Name: ' + profile.getName());
       console.log('Given Name: ' + profile.getGivenName());
       console.log('Family Name: ' + profile.getFamilyName());
       console.log("Image URL: " + profile.getImageUrl());
       console.log("Email: " + profile.getEmail());

       // The ID token you need to pass to your backend:
       var id_token = googleUser.getAuthResponse().id_token;
       console.log("ID Token: " + id_token);

       document.getElementById('name').innerText = "Signed in: " +
           googleUser.getBasicProfile().getName();


     };

   </script>

   <?php
 }
?>
 <!DOCTYPE html>

 <html>
     <head>
       <meta name="google-signin-scope" content="profile email">
       <meta name="google-signin-client_id" content="23817671136-knscbm6p1l4aj046g7dun6hva9ovg1v2.apps.googleusercontent.com">
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       
       <script src="https://apis.google.com/js/platform.js" async defer></script>
       <title> Community Service Finder</title>
        <link rel="stylesheet" type="text/css" href="home.css">
     </head>

     <form>
         <div class="login">
           <div id="name" class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

      </form>




     <body>
         <header>
         <div id = "header">
         <h1> Community Service Finder </h1>
         </div>



         </header>
         <nav>
         <a href= "login.php" id="currentPage">Home</a>
         <a href= "testing.php">Services</a>
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
		(function(d, s, id){
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) {return;}
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		// login with facebook with extra permissions
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
		}

		// getting basic user info
		function getInfo() {
			FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
				document.getElementById('status').innerHTML = response.id;
			});
		}
	</script>

	<div id="status"></div>
	<button onclick="getInfo()">Get Info</button>
	<button onclick="login()" id="login">Login</button>
	
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/>

       </body>


 </html>
<?php
