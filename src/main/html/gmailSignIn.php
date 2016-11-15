<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Email: ' + profile.getEmail());
    document.getElementById("name").innerHTML = "Welcome " + profile.getName() + "!";
}
 </script>

   <html>
       <head>
         <meta name="google-signin-scope" content="profile email">
         <meta name="google-signin-client_id" content="23817671136-knscbm6p1l4aj046g7dun6hva9ovg1v2.apps.googleusercontent.com">
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <script src="https://apis.google.com/js/platform.js" async defer></script>

       </head>

  </html>
