<?PHP
session_start();

require_once('../utility/MyConstants.php');

if($_SESSION['logged']!=MyConstants::ADMIN_SET)
	header( MyConstants::NOT_LOGGED_MSG );
if($_SESSION['expire'] < time())
	header( MyConstants::SESSION_EXPIRED_MSG );
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
<div class="container">
<header><img src="http://localhost/carapp/resources/images/Header.png" alt="Logo"></header>
<div class="clear"></div>
<div id="contents">
 <aside>
 <nav class="navbar">
  <a class="btn-danger active" href="?page=Main">Home</a>
  <a class="btn-danger" href="?page=Kund">Kund Registrering</a>
  <a class="btn-danger" href="?page=Bil">Bil Registrering</a>
  <a class="btn-danger" href="?page=Damage">Damage </a>
 </nav>
 </aside>
<div class="logout">
    <a href="?page=Logout">Logout </a>
</div>
 <section id="page">
 <?php

if (@$_GET['page'])
{
$url = $_GET['page'].".php";
   if (is_file($url)) 
       {
   include $url;
        } else {
   echo 'Page not found';
   }
}else {

    include 'Main.php';
}
     
  ?>   
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