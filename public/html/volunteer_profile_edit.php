<?php
session_start(); //session start
//this file is called for conneciton to database
require_once ('../../libraries/Google/autoload.php');
include('include/database.php');
include('gmailDB.php');
$_SESSION['getId'] = $_POST['getId'];
?>

<h2 id="title" align="center"> Community Service Finder </h2>

        <link rel="stylesheet" type="text/css" href="profile.css">
<br>
<br>
<div align="center" >
<a href= "../../index.php">Home</a><br/>
Profile
</div>
<div id="ProfilePage">
    <div id="LeftCol">

		<strong>Photo</strong>
		<input type="file" name="Photo"/>
        <div id="Photo"> <img src="noemi.png" alt="Mountain View" style="width:200px;height:140px;"> </div>
        <div id="ProfileOptions">

        </div>
		<strong>Resume</strong>
		<input type="file" name="Resume"/>
		<button type="button" onClick="location.href='volunteer_profile.html'">Save Changes</button><br/>
		<button type="button" onClick="location.href='volunteer_profile.html'">Cancel</button><br/>
    </div>

    <div id="Info">
        <p>
            <strong>Name:</strong>
            <input type="text" name="Name"/>
        </p>

        <p>
            <strong>Grade:</strong>
            <input type="text" name="Grade"/>
        </p>
		<p>
            <strong>School:</strong>
            <input type="text" name="School"/>
        </p>
        <p>
            <strong>Biography: <br > <br ></strong>
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
