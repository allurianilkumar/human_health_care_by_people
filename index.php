<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Human Health Care Help By People</title>
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
  <?php require 'nav_bar.php'; ?>
  <?php require 'carousel_slide.php'; ?>
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
  <br>
  <section class="home_section">
    <div class="home_container">
      <div class="row">
        <div class="col-md-12">
          <h4><b>Welcome to Human Health Care Help By People
          </b></h4><hr class="simple_hr_line">
          <p>This site making good suggestions to people. All people getting information about the medicine precautions and what is best medicine (tablets , etc …) . This site providing “How to contact famous doctors based on the diseases” and “How to manage healthy body tips” etc.  Providing the medicine name based on the normal diseases like fiver, body pains etc. Providing the first Aid information for accident patient. All types of health information getting from this site.</p>
          <p>Medicine: “Universal precautions refers to the practice, in medicine, of avoiding contact with patients' bodily fluids, by means of the wearing of nonporous articles such as medical gloves, goggles, and face shields.”</p><br>
          <p>In the proposed system we need to provide the good information about the human health. As a human need to know the what is best medicine for disease. So that we are thinking to develop the ‘Best Human Health Care Help By People’ site. Some of the advantages in proposed system. All type of human disease problems causes with real people examples from our site.
          Advantages:
          Medicine advantages and disadvantages.
          How  to get health insurance procedures.
          How to improve the health tips for people. From this site saving the people life time.
          Why are doctors reluctant to prescribe sleeping tablets?
          People, patient  and doctors suggestions and guidelines
          Hair Care During Winter Season
          Diseases :
          Exp:
          1)  Dengue: Causes, Symptoms, Treatment and Prevention, Home Remedies for Dengue
          2) Skin diseases   etc. 

          Modules:  
          These are three modules.
          1) Admin Module
          To handle the patient and doctor information in a site.
          Permissions given to patient and doctor by admin.
          Improving the best awareness in about the site in social sites. 

          2) Doctor Module
          - Providing the good tips & tables for disease.
          - Help from doctor to patients.
          - Comments the best tables or medicine information
          - Providing heal care hospital address 
          3)  Patient module : 
          Learning tips for health
          Checking the Health loans.
          Knowing the tables information day to day
          Commenting the good tables for disease.
                A patient have different problems. 
          A  Patient having three types.
          1) Inpatient
          2) Outpatient</p>
        </div>
      </div>
    </div>
  </section>
<?php require 'footer.php'; ?>
  <script src="./lib/js/jquery-1.11.3.min.js"></script>
    <script src="./lib/js/formValidation.min.js"></script>
    <script src="./lib/js/bootstrap-3.3.6.min.js"></script>
    <script type="text/javascript" src="./lib/js/form_validation_bootstrap.js"></script>
  </body>
</html>