<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Human Health Care Help By People-Admin</title>
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
<section class="navigatin-section">
<nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/human_health_care_by_people/#">Human Health Care Help By People</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class=""><a href="/human_health_care_by_people">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="./about_us.php">About Us</a></li>
            <li><a href="#">Diseases</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Patient<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Basic Information</a></li>
                <li><a href="#">Desease</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Comments</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Help</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Doctor<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Basic Information</a></li>
                <li><a href="#">Famous Doctors</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Comments</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Help</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-right" role="search" method="get" action="<?php echo "diseases.php" ?>">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search for tablets info" name="search">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="./logout.php">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    </section>
   <?php
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "human_health_care_by_people";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn) {
            if(isset($_POST['user_registration_submit'])) {
                $userName = $_POST["user_name"];
                $mobile = $_POST["mobile"];
                $passport = $_POST["passport"];
                $email = $_POST["email"];
                $password = MD5($_POST['password']);//$_POST["password"];
                $repassword = MD5($_POST['repassword']);//$_POST["repassword"];
                $userType = $_POST["user_type"];
    
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $result = "";
                if($password == $repassword){
                 $result = "INSERT INTO `user_registraiton`(`UserName`, `Mobile`, `Passport`, `Email`, `Password`, `Repassword`, `UserType`) VALUES ('$userName',$mobile,'$passport','$email','$password','$repassword','$userType')";
                }
                if ($conn->query($result) === TRUE) {
                  /*echo "<h1><center>User Login Successfully</center></h1>";*/
                } else {
                  echo "<h1><center>Error: " . $result . "<br>" . $conn->error . "<center></h1>";
                }
                $conn->close();
            }
        }else{
            die('Something went wrong while connecting to MySQL');
        }
    ?>
  <section>
      <div><p>Hi Admin, How are you?</p></div>
  </section>

  <?php include 'footer.php'; ?>
    <script src="./lib/js/jquery-1.11.3.min.js"></script>
    <script src="./lib/js/formValidation.min.js"></script>
    <script src="./lib/js/bootstrap-3.3.6.min.js"></script>
    <script type="text/javascript" src="./lib/js/form_validation_bootstrap.js"></script>
  </body>
</html>

