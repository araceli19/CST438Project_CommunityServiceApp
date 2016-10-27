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
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/>

       </body>


 </html>
<?php
