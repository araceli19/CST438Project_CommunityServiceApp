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
         $phoneNum=""; $gender = ""; }
 ?>

<html>
        <head>
                  <title> Community Service Finder</title>
                  <link rel="stylesheet" type="text/css" href="registrationForm.css">
        </head>
        <body>

            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#"><h3>Volunteer Registration</h3></a>
                    </div>
                    <ul align="right" class="nav navbar-nav">
                      <li><a href="../index.php" ><h5>Home</h5></a></li>
                      <li class="active"><a href= "volunteerRegister.php" id="currentPage"><h5>Volunteer Registration</h5></a></li>
                      <li> <a href= "Search.php"><h5>Services</h5></a></li>
                      <li><a href= "volunteer_profile.php"><h5>My Profile</h5></a></li>
                      <li><a href= "contactUs.html"><h5>Contact Us</h5></a></li>
                    </ul>
                </div>
            </nav>


              <form id="left" align="center" name="frmRegistration" method="post" action="" >
                  <table border="1" width="500" align="center" class="demo-table">
                   <tr> <td>Name</td>
                          <td><input type="text" class="demoInputBox" name="firstName" value="<?php echo $name; ?>">
                            <?php
                                echo "<div  style=color:Red;>";
                                echo "<br>";
                                    if(!isset($_POST["firstName"]) && isset($_POST["submit"])) {
                                        $message = "Name, Lastname must filled"; echo $message;
                                      }
                                echo "</div>";
                              ?>  </td>
                      </tr><tr> <td>Email</td>
                            <td><input type="text"  class="demoInputBox" name="userEmail" value="<?php echo $email; ?>"/>
                              <?php
                                  echo "<div  style=color:Red;>";
                                  echo "<br>";
                                      if(!isset($_POST["userEmail"])&& isset($_POST["submit"])) {
                                        $message = "Email must be filled in before summitting"; echo $message;
                                      }
                                  echo "</div>";
                                ?></td>
                    </tr> <tr>  <td>DOB (MM-DD-YYYY)</td>
                    <td><input type="text" class="demoInputBox" name="DOB" value="<?php echo $dob; ?>"/> <?php // month array
                                  echo "<div  style=color:Red;>";
                                    echo "<br>";
                                      if(empty($_POST["DOB"]) && isset($_POST["submit"])) {
                                        $message = "Date of birth needed"; echo $message;
                                      }
                                    echo "</div>";?>
                      </td></td> </tr><tr>
                            <td> Gender:</td><td> Male&nbsp;<input  class="demoInputBox"  type="radio" name="gender" value="Male" <?php if($gender === "Male" || $gender === "" ){ echo "checked"; } ?>>
                               &nbsp;&nbsp;
                              Female&nbsp;<input class="demoInputBox"  type="radio" value = "Female" name="gender" <?php if($gender === "Female"){ echo "checked"; }?>>
                            </td></tr></td>
                     </tr><tr>  <td>School (if any)</td>
                             <td><input type="text" class="demoInputBox"  name="school" value="<?php echo $school; ?>"/>

                      </td></tr><tr>  <td>Phone Number (format: ##########)</td>
                             <td><input type="text"  class="demoInputBox" name="phoneNum" value="<?php echo $phoneNum; ?>"/>
                             <?php
                                  echo "<div  style=color:Red;>";
                                  echo "<br>";
                                    if(empty($_POST["phoneNum"]) && isset($_POST["submit"])) {
                                        $message = "Phone Number needed";  echo $message;
                                    }
                                  echo "</div>";
                              ?>
                      </td></tr><tr><td></td>
                            <td><input type="checkbox" name="terms"/> I accept Terms and Conditions
                            <?php
                                echo "<div  style=color:Red;>";
                                echo "<br>";
                                  if(!isset($_POST["terms"]) && isset($_POST["submit"])) {
                                      $message = "Accept Terms and conditions before submit";  echo $message;
                                    }
                                echo "</div>";
                              ?>  </td>

                    </tr><tr> <td> Upload Your Resume</td>
                        <td> <input type="file" name="fileToUpload" id="fileToUpload"/> </td>
                    </tr>
                    </table>
                    <br>
                      <div><input type="submit" class="btnRegister" name="submit" value="Register"/></div>
              </form>

             <?php
               /* Validation to check if Terms and Conditions are accepted */
                 if(isset($_POST["terms"]) && isset($_POST["userEmail"]) && isset($_POST["submit"])){
                        if(isset($_POST['school']))  $school = $_POST["school"];
                        if(isset($_POST['DOB'])) $dob = $_POST['DOB'];
                        if(isset($_POST['phoneNum'])) $phoneNum = $_POST['phoneNum'];
                        if(isset($_POST['gender'])) $gender = $_POST['gender'];

                        $pattern = "/^[0-9\_]{7,20}/";
                        $pattern2 = "/^(0[1-9]|[1-2][0-9]|3[0-1]-(0[1-9]|1[0-2])-[0-9]{4})/";
                        if (!preg_match($pattern,$phoneNum)){
                            echo "<div  style=color:Red;>"; echo "<br>";
                                echo 'Phone number can only be 10 digits (format: ##########).';
                            echo "</div>";
                          }

                        else if (!preg_match($pattern2,$dob))
                          {
                            echo "<div align='center' style=color:Red;>";  echo "<br>";
                                echo 'DOB has the wrong format!.';
                            echo "</div>";
                          }
                      else{
                            if(empty($getVolunteer)) insertIntoVolunteer($googleId, $dob, $school, $phoneNum, $name, $gender);

                            volunteerFormSubmition($orgId, $googleId);
                                echo "<div  align='center' style=color:Red;>";
                                  echo '<script type="text/javascript" class="alert alert-success">';
                                    echo 'alert("You have registered successfully!");';
                                    echo 'window.location.href = "../index.php";';
                                  echo '</script>';
                                  unset($_POST);
                                echo "</div>";
                            }
                }
              ?>
          </body>
</html>
