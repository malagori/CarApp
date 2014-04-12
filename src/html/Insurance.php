<?php
    session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/carapp.com/resources/css/bootstrap.css">
<title>Car Repairing</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
<link rel="stylesheet" type="text/css" href="http://localhost/carapp.com/resources/css/style.css">
<link rel="stylesheet" type="text/css" href="http://localhost/carapp.com/resources/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://localhost/carapp.com/resources/css/bootstrap.css" src="resources/css/bootstrap.css">

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://localhost/carapp.com/resources/resources/js/bootstrap.js"></script>
<script type="text/javascript" src="http://localhost/carapp.com/resources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://localhost/carapp.com/resources/js/jquery.js"></script>

</head>

<body>
    
<div class="register">
     <h1>Add Insurance</h1>
   <form action="src/controller/InsuranceHandler.php" method="post">
   <input class="input-lg" type="text" placeholder="Enter Insurance" name="Insurance">
   <input class="btn-primary btn-lg" type="submit" name="submit" value="Add Insurance">
   <input type="hidden" value="AddInsurance" name="action">
    </form> 
 </div>
<br/><br/><br/>
</body>
</html>