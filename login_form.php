<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Human Health Care Help By People-Login-Form</title>
    <!-- Lib Files -->
    <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-3.3.6.min.css">
    <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-theme-3.3.6.min.css">
    
    <!-- Custome CSS Files -->
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/registration_form.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/login.css">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
  </head>
  <body>
  <?php
if(isset($_POST['login_submit'])) {
  session_start();
  $email = $_POST['email'];
  $pwd = MD5($_POST['password']);
  $con=mysql_connect("localhost","root","password");
  mysql_select_db("human_health_care_by_people");
  $res=mysql_query("SELECT `Email`, `Password`, `UserType` FROM `user_registraiton` WHERE  `Email` like '$email' and `Password` like '$pwd'");
  while($row=mysql_fetch_array($res)){
    if($row[0]==$email && $row[1]==$pwd)
    {
      $_SESSION["Email"] = $row[0];
      $_SESSION["Password"] = $row[1];
      if($row[2]== "Patient")
        header('Location: ./patient.php');
      elseif ($row[2]== "Doctor") {
         header('Location: ./doctor.php');
      }else{
        header('Location: ./admin.php');
      }
    }else{
      $flag ="false";
    }
  }
  if($flag ="false"){
    echo "<h1 class='text-center'>Invalid Login !!! Please enter valid details</h1>";
  }
  mysql_close($con);
}
?>
<?php require 'nav_bar.php'; ?>
<section class="login-section">
<div class="row">
  <div class="col-md-6"><hr>
  <div class="login-form">
    <h2> Please login information</h2><hr>
    <form class="form-horizontal" id="login_form" action="login_form.php" method="post">
    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input type="text" name="email" class="form-control"/>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control"/>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="login_submit" class="btn btn-success" value="Login">
        <input type="reset" class="btn btn-default" onclick="goBack()" value="Back"/>
      </div>
    </div><hr>
    </form>
  </div>
  <label>If youd do't have account please register <a href="./registration_form.php">Sign Up</a></label><hr></div>
  <div>
</div>
</div>
</section>
 <?php require 'footer.php'; ?>
    <script src="./lib/js/jquery-1.11.3.min.js"></script>
    <script src="./lib/js/formValidation.min.js"></script>
    <script src="./lib/js/bootstrap-3.3.6.min.js"></script>
    <script type="text/javascript" src="./lib/js/form_validation_bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#login_form').formValidation({
                message: 'This value is not valid',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required and can\'t be empty'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required and can\'t be empty'
                            }
                        }
                    },
                }
            });   
        });
    </script>
  </body>
</html>