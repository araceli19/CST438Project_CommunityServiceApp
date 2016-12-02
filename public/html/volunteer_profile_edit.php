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
                  <a class="navbar-brand" href="#"><h4>Profile</h4></a>
                </div>
                <ul align="right" class="nav navbar-nav">
                  <li><a href="../../index.php" ><h5>Home</h5></a></li>
                  <li ><a href= "volunteerRegister.php" id="currentPage"><h5>Volunteer Registration</h5></a></li>
                  <li> <a href= "Search.php"><h5>Services</h5></a></li>
                  <li class="active"><a href= "volunteer_profile_edit.php"><h5>My Profile</h5></a></li>
                  <li><a href= "contactUs.html"><h5>Contact Us</h5></a></li>
                </ul>
            </div>
        </nav>
<br>
<br>
<div align="center" >

</div>
<div id="ProfilePage" class="demo-table">
    <div id="LeftCol">

		<strong>Photo</strong>

        <div id="Photo"> <img src="images/userIcon.png" alt="Mountain View" style="width:200px;height:200px;"> </div>
        <div id="ProfileOptions">



    <div>
        <p>
            <strong>Name:</strong>
            <input type="text" name="Name" value = "<?php echo $name; ?>"/>
        </p>

        <p>
            <strong>Grade:</strong>
            <input type="text" name="Grade" value = "<?php echo $grade; ?>"/>
        </p>
		<p>
            <strong>School:</strong>
            <input type="text" name="School" value = "<?php echo $school; ?>" />
        </p>
        <p>
          <strong> Gender:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male&nbsp;<input  class="demoInputBox"  type="radio" name="gender" value="Male"  echo "checked">
             &nbsp;&nbsp;
            Female&nbsp;<input class="demoInputBox"  type="radio" value = "Female" name="gender">
        </p>

        <p>

              <strong>Biography:</strong>
              <input type="textarea" name="bio" value = "<?php echo $bio; ?>" />

			</textarea>



      <p>
        <strong>Contact Information: </strong>

             <td>Phone Number: <input type="text"  class="demoInputBox" name="phoneNum" value="<?php echo $phoneNum; ?>"/>
        </p>

    </div>
    <div><button type="button" onClick="location.href='volunteer_profile.php'">Save Changes</button>
    <button type="button" onClick="location.href='volunteer_profile.php'">Cancel</button><br/></div>


</div>
