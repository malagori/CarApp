<?php
    session_start();
?>
<html>
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
<div class="container">
<header><img src="resources/images/Header.png" alt="Logo"></header>
<div class="clear"></div>
<div id="contents">
 <section id="page">
 <div class="login">
     <h1>Login</h1>
   <form action="src/controller/LoginHandler.php" method="post">
   <input class="input-lg" type="text" placeholder="Enter Username" name="username">
   <input class="input-lg" type="password" placeholder="Enter Password" name="password">
   <input class="btn-primary btn-lg" type="submit" name="submit" value="Login">
   <input type="hidden" value="LoginUser" name="action">
    </form> 
 </div>
     
 </section>

</div>
<footer>
<p>
Copyright reserved - Klicke e Media
</p>
</footer>
</div>
</body>
</html>
