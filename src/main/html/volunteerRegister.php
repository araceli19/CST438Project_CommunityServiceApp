<?php

session_start();
include('include/database.php');


//echo $_POST['getId'];
$id = $_POST['getId'];
//echo $id;

$googleId = $_SESSION['userId'];


  function getGoogleUser(){
    $dbConnection = getDatabaseConnection();
    //global $dbConnection; //use global variable to call it anywhere in function
    $sql = "SELECT * FROM google_users WHERE google_id = :google_id";
    $namedParameters = array(":google_id"=>$_SESSION['userId']);
    $statement =  $dbConnection->prepare($sql);
    $statement->execute($namedParameters);

    return $statement->fetch(PDO::FETCH_ASSOC);

  }


 ?>
<html>
    <head>
      <style>
        .message {color: #FF0000;font-weight: bold;text-align: center;width: 100%;padding: 10;}
        .demo-table {background:#FFDFDF;width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
        .demo-table td {padding: 20px 15px 10px 15px;}
        .demoInputBox {padding: 7px;border: #F0F0F0 1px solid;border-radius: 4px;}
        .btnRegister {padding: 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer;}
     </style>
   </head>

     <?php   $gUser= getGoogleUser();
        $name =  $gUser['google_name'];
        $email = $gUser['google_email'];
    ?>

    <h4 align="center"> Volunteer Registration </h4>
      <form align="center" name="frmRegistration" method="post" action="">
        <table border="" width="500" align="center" class="demo-table">
            <tr><td>Name</td>
              <td><input type="text"  class="demoInputBox" name="firstName" value="<?php  echo $name; ?>"></td>
            </tr>

            <tr><td>Email</td>
              <td><input type="text" class="demoInputBox"  name="userEmail" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="checkbox" name="terms"> I accept Terms and Conditions</td>
           </tr>
        </table>
        <div><input type="submit" class="btnRegister" name="submit" value="Register"></div>
      </form>

</html>
