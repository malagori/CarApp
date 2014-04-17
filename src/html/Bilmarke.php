<?PHP

session_start();
require_once('../utility/MyConstants.php');
if ($_SESSION['loggedUser'] ==  MyConstants::ADMIN_USERNAME){
	
	if($_SESSION['logged']!=MyConstants::ADMIN_SET)
	header( MyConstants::NOT_LOGGED_MSG );
	if($_SESSION['expire'] < time() )
	header( MyConstants::SESSION_EXPIRED_MSG );

} else{
	header( MyConstants::PERMISSION_DENIED );
} 
?>

<?php
    require_once( "../utility/Utility.php" );
    require_once( "../utility/Logger.php" );	
    require_once('../utility/CustomException.php');
    require_once('../utility/MyConstants.php'); 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/carapp/resources/css/bootstrap.css">
<title>Car Repairing</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
<link rel="stylesheet" type="text/css" href="http://localhost/carapp/resources/css/style.css">
<link rel="stylesheet" type="text/css" href="http://localhost/carapp/resources/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://localhost/carapp/resources/css/bootstrap.css" src="resources/css/bootstrap.css">

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://localhost/carapp/resources/resources/js/bootstrap.js"></script>
<script type="text/javascript" src="http://localhost/carapp/resources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://localhost/carapp/resources/js/jquery.js"></script>

</head>

<body>

<?php
    $con=mysqli_connect("localhost","mehmood","123","Nisha_car1");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
      
    $query = mysql_query("SELECT * FROM `Bilmarke`");
    while($select = mysql_fetch_array($query))
    {
    echo $select[Bilmarke];
         echo $select[Bilmarke];
    }

mysqli_close($con);
    ?>
    
<div class="register">
     <h1>Add Bilmarke</h1>
   <form action="../controller/BilmarkeHandler.php" method="post">
   <input class="input-lg" type="text" placeholder="Enter Bilmarke" name="Bilmarke">
   <input class="btn-primary btn-lg" type="submit" name="submit" value="Add Bilmarke">
   <input type="hidden" value="AddBilmarke" name="action">
    </form> 
 </div>
   <br/><br/><br/> 
</body>
</html>