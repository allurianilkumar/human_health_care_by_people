<?php
define('DBCONNECTION', 'mysql:host=localhost;dbname=human_health_care_by_people');
define('DBUSER', 'root');
define('DBPASS', 'password');
?>

<?php
  //// Data Base part
  function setConnectionInfo() {
    try {
      $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
    }catch(PDOException $e) {
      echo $e->getMessage();
    }
    return $pdo; 
  }

  function runQuery($pdo, $sql, $parameters)     {
    try {
      if($parameters == ''){
        $statement = $pdo->query("$sql");
      }else{
        $sqlTemp = $sql . " WHERE `TableName` like '$parameters%' order by  `TableName`";
        $statement = $pdo->query("$sqlTemp");
      }

    }catch(PDOException $exception) {
      echo $exception->getMessage();
    }
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    return $statement;
  }

  function readAllTablets(){
    $pdo = setConnectionInfo();
    $sql = 'SELECT `Id`, `TableName`, `Disease`, `Advantage`, `Disadvantage` FROM `tables`';
    $statement = runQuery($pdo, $sql, '');
    return $statement;
  }

  function readSelectTablets($lastName) {
    $pdo = setConnectionInfo();
    $sql = 'SELECT `Id`, `TableName`, `Disease`, `Advantage`, `Disadvantage` FROM `tables`';
    $statement = runQuery($pdo, $sql, $lastName);
    return $statement;
  }
  // if we have search string search for customer matches
  if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search']) ) {
     $tablets = readSelectTablets($_GET['search']);
  }
  else {
     // otherwise get all customers
    $tablets = readAllTablets();  
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Human Health Care Help By People-Disease</title>
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
	<section class="diseases_info">
  <div class="container">
   <div class="row">  <!-- start main content row -->
      <div class="col-md-2">  <!-- start left navigation rail column -->
      </div>  <!-- end left navigation rail --> 
      <div class="col-md-8">  <!-- start main content column -->
         <!-- book panel  -->
         <div class="panel panel-info spaceabove">           
           <div class="panel-heading text-center"><h3><i>Diseases Information For Patient</i></h3></div>
           <table class="table">
             <tr>
               <th>Table Name</th>
               <th>Disease</th>
               <th>Advantage</th>
               <th>Disadvantage</th>
             </tr>
                <?php
                while($row = $tablets->fetch()) {
                  echo "<tr>";
                    echo "<td><a href="."diseases.php?tablet=";
                    echo $row['Id'];
                    echo ">".$row['TableName']."</a></td>";
                    echo "<td>".$row['Disease']."</td>";
                    echo "<td>".$row['Advantage']."</td>";
                    echo "<td>".$row['Disadvantage']."</td>";
                  echo "</tr>";
                }
              ?>
           </table>
         </div>           
      </div>
      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
	</section>
	<?php require 'footer.php'; ?>
	<script src="./lib/js/jquery-1.11.3.min.js"></script>
    <script src="./lib/js/formValidation.min.js"></script>
    <script src="./lib/js/bootstrap-3.3.6.min.js"></script>
    <script type="text/javascript" src="./lib/js/form_validation_bootstrap.js"></script>
	</body>
</html>

