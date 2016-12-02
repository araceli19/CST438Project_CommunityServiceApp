<?php
session_start();
include('include/database.php');
include('setVolunteerRegistration.php');
?>

<link rel="stylesheet" type="text/css" href="profile.css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><h4>Profile</h4></a>
        </div>
        <ul align="right" class="nav navbar-nav">
          <li><a href="../../index.php" ><h5>Home</h5></a></li>
          <li> <a href= "Search.php"><h5>Services</h5></a></li>
          <li class="active"><a href= "provider_profile.php" id="currentPage"><h5>Provider Profile</h5></a></li>
          <li><a href= "contactUs.html"><h5>Contact Us</h5></a></li>
        </ul>
    </div>
</nav>

<div align="center"  class="demo-table">
    <div id="LeftCol">


        <div id="Photo"> <img src="../images/logo.png" alt="Mountain View" style="width:160px;height:140px;"> </div>
        <div id="ProfileOptions">
      Provider Image
        </div>

		<button type="button" onClick="location.href='provider_profile_edit.php'">Update Profile</button><br/>
		<button type="button" onclick="alert('Hello world!')">Current Volunteers</button><br/>
    </div>

    <div class="demo-table" align="center" >
        <p>
		<div align="center" >
            <strong>Organization Name:</strong>


        </p>

        <p>
            <strong>Address:</strong>

        </p>
		<p>
            <strong>Service:</strong>

        </p>
        <p>
            <strong>Overview: <br > <br ></strong>

        </p>
        <p>
            <strong>Contact Information: <br> <br><br></strong>

            <span align="left">
              <a target="_blank" title="follow me on twitter" href="http://www.twitter.com/NoemisHilarious"><img alt="follow me on twitter"
                src="//login.create.net/images/icons/user/twitter_30x30.png" border=0></a>

              <br>
                <a target="_blank" title="find us on Facebook" href="http://www.facebook.com/noemi.cuin"><img alt="follow me on facebook"
                  src="//login.create.net/images/icons/user/facebook_30x30.png" border=0></a>
             </span>
        </p>
		</div>
    </div>

    <!-- Needed because other elements inside ProfilePage have floats -->
    <div style="clear:both"></div>
</div>
