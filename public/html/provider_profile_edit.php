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
          <li class="active"><a href= "provider_profile_edit.php" id="currentPage"><h5>Provider Profile</h5></a></li>
          <li> <a href= "Search.php"><h5>Services</h5></a></li>

          <li><a href= "contactUs.html"><h5>Contact Us</h5></a></li>
        </ul>
    </div>
</nav>

        <link rel="stylesheet" type="text/css" href="profile.css">
<br>
<br>
<div align="center" >

<div align="center" class="demo-table">
    <div id="LeftCol" align="center" >

		<strong>Photo</strong>
		<input type="file" name="Photo"/>
        <div id="Photo"> <img src="../images/logo.png" alt="Mountain View" style="width:160px;height:140px;"> </div>
        <div id="ProfileOptions">

        </div>
		<button type="button" onClick="location.href='provider_profile.php'">Save Changes</button><br/>
		<button type="button" onClick="location.href='provider_profile.php'">Cancel</button><br/>
    </div>

    <div id="Info">
        <p>
            <strong>Organization Name:</strong>
            <input type="text" name="Name"/>
        </p>

        <p>
            <strong>Address:</strong>
            <input type="text" name="Grade"/>
        </p>
		<p>
            <strong>Service:</strong>
            <input type="text" name="School"/>
        </p>
        <p>
            <strong>Overview: <br > <br ></strong>
            <textarea>

			</textarea>
        </p>
        <p>
            <strong>Contact Information: <br> <br><br></strong>
			<input type="text" name="ContactInfo"/>
        </p>
    </div>

    <!-- Needed because other elements inside ProfilePage have floats -->
    <div style="clear:both"></div>
</div>
