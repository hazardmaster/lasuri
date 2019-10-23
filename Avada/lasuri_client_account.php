<?php
ob_start();  
  /**
   * Template Name: Client Account
   *
   * @package flatsome
   */
  get_header();

  session_start();

  //User registration manenos
  if (isset($_POST["client_registration_form"])) {
      $firstName = $_POST["firstName"];
      $surname = $_POST["surname"];
      $phone = $_POST["phone"];
      $email = $_POST["email"];
      $password_1 = $_POST["password_1"];
      $password_2 = $_POST["password_2"];

      if ($password_1 !== $password_2) {
        echo "Passwords don't match";
        exit;
      }
      register_user($firstName, $surname, $phone, $email, $password_1);
  }

  function register_user($firstName, $surname, $phone, $email, $password_1){

    require_once("config/pdoConnect.php");

    if (!$conn) {
      echo "Not connected";
    }

    //hash password
    // $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);
    $hashed_password = $password_1;

    $stmt = $conn->prepare("INSERT INTO client_member_details (firstName, lastName, phone, email, password) VALUES(:first_name, :last_name, :phone_num, :email_addr, :pass)");

    $stmt->bindParam(":first_name", $firstName);

    $stmt->bindParam(":last_name", $surname);

    $stmt->bindParam(":phone_num", $phone);

    $stmt->bindParam(":email_addr", $email);

    $stmt->bindParam(":pass", $hashed_password);

    $result = $stmt->execute();

    if (!$result) {
      wp_die('Database Insertion failed');
    }
      echo "Registration was successful"; 
  }

  //User Login part
  if (isset($_POST["login_user"])) {

    $login_email = $_POST["login_email"];
    $login_password = $_POST["login_password"];

  if(!empty($login_email) && !empty($login_password)){

      login_user($login_email, $login_password);

    }else{
      echo "Wrong credentials";
      exit;
    }

  }

  function login_user($mail, $pass){
    
    require_once("config/pdoConnect.php");
    $sql = "SELECT email, password, ID FROM client_member_details WHERE email = '$mail' ";

    if($stmt = $conn->prepare($sql)){

      if($stmt->execute()){

        if($stmt->rowCount() === 1){

          if($row = $stmt->fetch()){

            $hashedPassword = $row['password'];
            $email = $row["email"];
            $client_id = $row["ID"];

            // if (password_verify($pass, $hashedPassword)) {         
            if ($pass == $hashedPassword) {         
              // client_profile()
              $_SESSION["client_id"] = $client_id;
              client_profile($client_id);
            }else{
              echo "Check credentials";
              exit;
            }

          }

        }else{
          echo "User not found";
        }

      }else{
        echo "Query not executed";
      }
    }
    
  }

  function client_profile($currentID){

    require('config/pdoConnect.php');

      $sql = "SELECT * FROM client_member_details WHERE ID = '$currentID' ";

      $stmt = $conn->query($sql);      

  while($datarows = $stmt->fetch()){  

    echo '

    <!--My Styles-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

      <div class="w3-container">      

       <div class="row">

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

          <img class="w3-image w3-card-4" alt="Smiley face" style="margin: 10px;" src="'.get_template_directory_uri().'/images/prof.png" width=100% height=120%>   

        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        </div>

        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
              <h3><u>Profile Info</u></h3><br>
                <p>
                  Name: '. $datarows["firstName"]. " ". $datarows["lastName"].'
                  <br><br>
                </p>
                <p>
                  Email: '. $datarows["email"].'
                  <br><br>
                </p>
                <p>
                  Phone: 0'. $datarows["phone"].'
                  <br><br>
                </p>    

        </div>         

      <br><br>

      <!--Navigation bar with w3.css-->

        <div class="w3-bar w3-light-grey w3-border w3-large w3-card-4">

          <button style="text-decoration: none; " class="w3-bar-item w3-button w3-hover-grey w3-text-black w3-hover-text-grey w3-padding-16">Update Profile</button>

          <button style="text-decoration: none;" class="w3-bar-item w3-button w3-hover-grey w3-text-black w3-hover-text-grey w3-padding-16">Show History</button>

        </div>
        <br><br><br>
      <div class="w3-container w3-light-grey w3-card-4 w3-block">

          <br>
          <h2>Update Personal Info</h2>        

        <!--Form with w3.css-->

      <form class="w3-container w3-light-grey" action="" method="POST" enctype="multipart/form-data">


        <p><label>Image</label>

        <input class="w3-input w3-border" name="update_userImage" type="file"></p>



        <!--Using row padding-->
        <div class="w3-row">

          <div class="w3-third" style="margin-right:200px">

            <p><label>First Name</label>

              <input class="w3-input w3-border" style="color:black" type="text" value = " '. $datarows["firstName"].' " name="update_firstName" placeholder="First Name" ></p>

          </div>



          <div class="w3-third">

            <p><label>Last Name</label>

              <input class="w3-input w3-border" style="color:black" type="text" name="update_lastName" value = " '. $datarows["lastName"].' "></p>

          </div>

        </div>

        <p><label>Email</label>

        <input class="w3-input w3-border" type="email" value = " '. $datarows["email"].' "  name="update_email" ></p>



        <p><label>Phone Number</label>

        <input class="w3-input w3-border" style="color:black" type="text" value = " '. $datarows["phone"].' " name="update_phone" ></p>



        <p><label>Password</label>

        <input class="w3-input w3-border" style="color:black" type="password" name="password_update_1" placeholder="Change Password"></p>


        <p><label>Confirm Password</label>

        <input class="w3-input w3-border" style="color:black" type="password" name="password_update_2" placeholder="Confirm New Password"></p>

        <input type="hidden" value = " '. $datarows["ID"].' " name="user_id" >

    <br>

        <!--Submit button-->

      <p><button type="submit" class="w3-btn w3-ripple w3-text-white" style="background-color:maroon" name="update_profile">&#10004; Submit</button></p>

      </form>
    </div>


    </div>
    ';
  }
  exit;
}

if (isset($_POST["update_profile"])) {

    $rawEmail =  $_POST['update_email']; 
    $rawFirstName = $_POST['update_firstName']; 
    $rawLastName = $_POST['update_lastName'];
    $phone = $_POST['update_phone'];
    $updatePass_1 = $_POST['password_update_1'];
    $updatePass_2 = $_POST['password_update_2'];
    $user_id = $_POST['user_id'];  

    if (!empty($updatePass_1) && !empty($updatePass_2)) {

       if($updatePass_1 !== $updatePass_2){
          echo "Passwords don't match";
          exit();
        }
      // $password_update = password_hash($updatePass_1, PASSWORD_DEFAULT);
      $password_update = $updatePass_1;
     } 

    //Sanitize Data
    $email = sanitize_email($rawEmail);
    $firstName = sanitize_user($rawFirstName);
    $lastName = sanitize_user($rawLastName);

    
    //Hash password
      

      $data = update($firstName,$lastName,$password_update,$email,$phone,$user_id);

  
}

 function update($first_name,$last_name,$updated_password,$mail,$phone,$user_id){

         require("config/pdoConnect.php");

         if (!$conn) {
           echo "Connection not possible. Try again later.";
           exit;
         }

         if (!empty($first_name)) {

             $stmt = $conn->prepare(" UPDATE client_member_details SET firstName= '$first_name' WHERE ID='$user_id' " );
             $result = $stmt->execute();
         }
         if (!empty($last_name)) {
             $stmt = $conn->prepare(" UPDATE client_member_details SET lastName='$last_name' WHERE ID='$user_id' " );
             $result = $stmt->execute();
         }
         if (!empty($mail)) {
             $stmt = $conn->prepare(" UPDATE client_member_details SET email='$mail' WHERE ID='$user_id' " );
             $result = $stmt->execute();
         }
         if (!empty($phone)) {
             $stmt = $conn->prepare(" UPDATE client_member_details SET phone='$phone' WHERE ID='$user_id' " );
             $result = $stmt->execute();
         }  
         if (!empty($updated_password)) {
             $stmt = $conn->prepare(" UPDATE client_member_details SET password='$updated_password' WHERE ID='$user_id' " );
             $result = $stmt->execute();
         }              
         

         if (!$result) {
             wp_die('Database update failed');
         }elseif ($result) {
          echo "Update successful. user ID: ". $user_id."<br> Row Count: ". $stmt->rowCount() ;    
          exit;
         }
         echo "I don't know what is going on";
         exit;
            
    }

  function show_reg_log_form(){
    echo '
      <!--My Styles-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<div class="w3-container container">

  <div class="row" style="margin-top: 0px">

      <div class="col-md-7 mx-auto">

        <div class="card card-body mt-5 " style="text-align: center;">                   

            <div class="form-group">
               <img class="img" src="'.get_template_directory_uri().'/images/logor.png" alt="" >
            </div>  
          <form action="" method="POST" name="myForm" class="login_form" >   

              <hr>

            <div class="form-group" ng-show="edit">
<!--
              <label for="userName">User Name:</label>
-->
              <input type="email" name="login_email"  ng-model="email" placeholder="Email" class="form-control form-control-lg" value="" required>

            </div>

            <div class="form-group" ng-show="edit">
<!--
              <label for="password">Password</label>
-->
              <input type="password" name="login_password" ng-model="passw1" placeholder="Password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? \'is-invalid\' : \'\'; ?>" value="" required>

            </div>

            <div class="form-row">

              <div class="col">

                <input type="submit" name="login_user" value="Login" class="btn btn-success btn-block" style="background-color: #800000">

              </div>              

            </div>
            <p>
              <h4 class="create_account">Create Account</h4>
            </p>
            <br><br><br><br>
            

          </form>

          <!--Form for Registration-->
          <form action="" method="POST" class="registration_form" >   

              <hr>

            <div class="form-group" ng-show="edit">

              <label for="firstName" style="float: left">First Name:</label>

              <input type="text" name="firstName"  ng-model="firstName" placeholder="First Name" class="form-control form-control-lg" value="" required>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="surname" style="float: left">Surname:</label>

              <input type="text" name="surname"  ng-model="surname" placeholder="Surname" class="form-control form-control-lg" value="" required>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="phone" style="float: left">Mobile Number:</label>

              <input type="text" name="phone"  ng-model="phone" placeholder="Mobile Number" class="form-control form-control-lg" value="" required>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="email" style="float: left">Email Adress:</label>

              <input type="email" name="email"  ng-model="email" placeholder="Email Adress" class="form-control form-control-lg" value="" required>

            </div>


            <div class="form-group" ng-show="edit">

              <label for="password_1" style="float: left">Password</label>

              <input type="password" name="password_1" ng-model="password_1" placeholder="Password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? \'is-invalid\' : \'\'; ?>" value="" required>

            </div>

            <div class="form-group" ng-show="edit">

              <label for="password_2" style="float: left">Confirm Password</label>

              <input type="password" name="password_2" ng-model="password_2" placeholder="Confirm Password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? \'is-invalid\' : \'\'; ?>" required>

            </div>

            <div class="form-row">

              <div class="col">

                <input type="submit" name="client_registration_form" value="Sign Up" class="btn btn-success btn-block" style="background-color: #800000" >

              </div>              

            </div>
            <p>
              <h4 class="create_account">Create Account</h4>
              <h4 class="login_account">Already have an account? Click here Log in</h4>
            </p>
            <br><br><br><br>
            

          </form>

        </div>

      </div>

    </div>
  </div>
    ';

  }

  if (isset($_SESSION["client_id"])) {
    $client_id = $_SESSION["client_id"];
    client_profile($client_id);
  }

  if (!isset($_SESSION["client_id"])) {
    show_reg_log_form();
  }

 ?>

  <script>
    jQuery('.login_form').show();
    jQuery('.create_account').show(); 
    jQuery('.login_account').hide();
    jQuery('.registration_form').hide();

    jQuery(document).ready(function($) {
      jQuery('.create_account').on("click", function(){
        jQuery('.login_form').hide();
        jQuery('.create_account').hide();        
        jQuery('.registration_form').show();
        jQuery('.login_account').show();
      });

      jQuery('.login_account').on("click", function(){
        jQuery('.login_form').show();
        jQuery('.create_account').show();        
        jQuery('.registration_form').hide();
        jQuery('.login_account').hide();
      });

    });
    
  </script>

<?php 
get_footer();
 ?>

