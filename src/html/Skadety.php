<?php
    session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.css">
<title>Car Repairing</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
<link rel="stylesheet" type="text/css" href="resources/css/style.css">
<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.css" src="resources/css/bootstrap.css">

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="resources/js/bootstrap.js"></script>
<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="resources/js/jquery.js"></script>

</head>

<body>
    
<div class="register">
     <h1>Add Skadetyp</h1>
   <form action="src/controller/SkadetypHandler.php" method="post">
   <input class="input-lg" type="text" placeholder="Enter Skadetyp" name="Skadetyp">
   <input class="btn-primary btn-lg" type="submit" name="submit" value="Add Skadetyp">
   <input type="hidden" value="AddSkadetyp" name="action">
    </form> 
 </div>
    
</body>
</html>