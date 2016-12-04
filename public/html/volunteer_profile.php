<?php
session_start();
include('include/database.php');
include('setVolunteerRegistration.php');

$id = $_POST['getId'];
$googleId = $_SESSION['userId'];
$orgId = $_SESSION['orgId'];

$gUser= getGoogleUser();

  if(!empty($gUser)){  $name =  $gUser['google_name'];  $email = $gUser['google_email']; }
  else{  $name =  ""; $email = ""; }

$getVolunteer = getVolunteerInfo();
  if($getVolunteer){ $nameV =  $getVolunteer['Name']; $dob = $getVolunteer['DOB']; $gender = $getVolunteer['Gender'];
                     $school = $getVolunteer['School']; $phoneNum = $getVolunteer['Phone_Num'];}
  else{  $nameV="";  $school="";
         $phoneNum=""; $gender = "";

       }

       $grade = "10";
       $bio = "Actively looking for Community Service Opportunities!"
?>

        <link rel="stylesheet" type="text/css" href="home.css">


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><h3>My Profile</h3></a>

        </div>
        <ul align="right" class="nav navbar-nav">
          <li><a href="../../index.php" ><h5>Home</h5></a></li>
          <li ><a href= "volunteerRegister.php" ><h5>Volunteer Registration</h5></a></li>
          <li> <a href= "Search.php" ><h5>Services</h5></a></li>
          <li class="active"><a href= "volunteer_profile.php" id="currentPage"><h5>My Profile</h5></a></li>
          <li><a href= "contactUs.html"><h5>Contact Us</h5></a></li>
        </ul>
    </div>
</nav>
<div  class="demo-table">
  <div >

  <strong>Photo</strong>

  <div id="Photo"> <img src="images/userIcon.png" alt="Mountain View" style="width:200px;height:200px;"> </div>
  <div id="ProfileOptions">


		<a href= "../../index.php">Resume</a><br/>

		<input type="button" name="UpdateProfile" onClick="location.href='volunteer_profile_edit.php'" value="Update Profile"/><br/>
		<button type="button" onclick="alert('2.5 Hours Completed')">Check Hours</button><br/>
		<button type="button" onclick="alert('Beach Clean Up!')">Current Services</button><br/>

    </div>



    <div class="demo-table">
        <div align="Center" >
      <br>
          <p>


            <strong>Name:</strong>
            <?php echo $name; ?>

        </p>

        <p>
            <strong>Grade:</strong>

          <?php echo $grade; ?>

        </p>
    <p>
            <strong>School:</strong>



          <?php echo $school; ?>
        </p>
        <p>
          <strong>Gender:</strong>
        <?php echo $gender; ?>

      </p>
      <p>

              <strong>Biography:</strong>
          <?php echo $bio; ?>

      </p>
      <p>
        <strong>Contact Information: </strong>
          <br>
             Phone Number: <?php echo $phoneNum; ?>
        </p>

    </div>
