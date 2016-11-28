<?php
session_start();
include('include/database.php');
include('setVolunteerRegistration.php');

$id = $_POST['getId'];
$googleId = $_SESSION['userId'];
$orgId = $_SESSION['orgId'];

//echo $orgId . " ";
//echo $id. " ";
//echo " ", $googleId;

 ?>
<html>
          <head>
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                  <title> Community Service Finder</title>
                <link rel="stylesheet" type="text/css" href="registrationForm.css">
         </head>
         <body>
            <?php
                  $gUser= getGoogleUser();
                    if($gUser){  $name =  $gUser['google_name'];  $email = $gUser['google_email']; }
                    else{  $name =  ""; $email = ""; }

                  $getVolunteer = getVolunteerInfo();
                    if($getVolunteer){ $nameV =  $getVolunteer['Name']; $dob = $getVolunteer['DOB']; $gender = $getVolunteer['Gender'];
                                       $school = $getVolunteer['School']; $phoneNum = $getVolunteer['Phone_Num'];}
                    else{  $nameV="";
                           $school="";  $phoneNum="";
                           $gender = ""; }
            ?>

            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#"><h3>Volunteer Registration</h3></a>
                    </div>
                    <ul align="right" class="nav navbar-nav">
                      <li><a href="login.php" ><h5>Home</h5></a></li>
                      <li class="active"><a href= "volunteerRegister.php" id="currentPage"><h5>Volunteer Registration</h5></a></li>
                      <li> <a href= "Search.php"><h5>Services</h5></a></li>
                      <li><a href= "volunteer_profile.html"><h5>My Profile</h5></a></li>
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
                    </tr> <tr>  <td>DOB (YYYY-MM-DD)</td>
                    <td><input type="text" class="demoInputBox" name="DOB" value="<?php echo $dob; ?>"/> <?php // month array
                                  echo "<div  style=color:Red;>";
                                    echo "<br>";
                                      if(empty($_POST["DOB"]) && isset($_POST["submit"])) {
                                        $message = "Date of birth needed"; echo $message;
                                      }
                                    echo "</div>";
                      ?> </td>
                    </td>
                          </tr><tr>
                            <td> Gender:</td><td> Male&nbsp;<input  class="demoInputBox"  type="radio" name="egender" value="Male">
                               &nbsp;&nbsp;
                              Female&nbsp;<input class="demoInputBox"  type="radio" name="egender" <?php { echo "checked"; }?> value="female"> 


                            </td></tr>

                          </td>
                      </tr><tr>  <td>School (if any)</td>
                             <td><input type="text" class="demoInputBox"  name="school" value="<?php echo $school; ?>"/>

                          </td>

                        </tr><tr>  <td>Phone Number</td>
                               <td><input type="text"  class="demoInputBox" name="phoneNum" value="<?php echo $phoneNum; ?>"/>


                             <?php
                                  echo "<div  style=color:Red;>";
                                  echo "<br>";
                                    if(empty($_POST["phoneNum"]) && isset($_POST["submit"])) {
                                        $message = "Phone Number needed";  echo $message;
                                    }


                                  echo "</div>";

                                ?>


                               </td>

                        </tr><tr>

                        <td></td>
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




                  $pattern = "/^[0-9\_]{7,20}/";
                    $pattern2 = "/^(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]-[0-9]{4})/";
                  if (!preg_match($pattern,$phoneNum)){
                    echo "<div  style=color:Red;>";
                    echo "<br>";
                       echo 'Your Phone number can only be numbers.';
                      echo "</div>";
                    }

                    else if (!preg_match($pattern2,$dob))
                    {
                      echo "<div  style=color:Red;>";
                      echo "<br>";
                         echo 'DOB has the wrong format!.';
                        echo "</div>";
                    }
                else{
                    if(empty($getVolunteer))
                      insertIntoVolunteer($googleId, $dob, $school, $phoneNum, $name);
                      volunteerFormSubmition($orgId, $googleId);

                      echo "<div>";
                      echo '<script type="text/javascript" class="alert alert-success">';
                      echo 'alert("You have registered successfully!");';
                      echo 'window.location.href = "login.php";';
                      echo '</script>';
              //  $success = "&nbsp&nbspYou have registered successfully!";  echo  $success;
                    unset($_POST);
                    echo "</div>";
               }
             }
                ?>
          </body>
</html>
