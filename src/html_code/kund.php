<?php

ini_set('display_errors','On');
error_reporting(E_ALL);
include_once "functions.php";
include_once "db_connect.php"; 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Car Registration Form</title>

<style type="text/css" media="all"> @import "../css_code/style.css"; </style> 

<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/sha512.js"></script>
		<script type="text/javascript" src="js/forms.js"></script>
		<script type="text/javascript" src="js/jquery.avgrund.js-master/jquery.avgrund.js"></script>
		<script type="text/javascript" src="js/noty/jquery.noty.js"></script>
		<script src="js/noty/layouts/bottom.js"></script>
  		<script src="js/noty/layouts/bottomCenter.js"></script>
  		<script src="js/noty/layouts/bottomLeft.js"></script>
  		<script src="js/noty/layouts/bottomRight.js"></script>
  		<script src="js/noty/layouts/center.js"></script>
  		<script src="js/noty/layouts/centerLeft.js"></script>
  		<script src="js/noty/layouts/centerRight.js"></script>
		<script src="js/noty/layouts/inline.js"></script>
  		<script src="js/noty/layouts/top.js"></script>
  		<script src="js/noty/layouts/topCenter.js"></script>
  		<script src="js/noty/layouts/topLeft.js"></script>
  		<script src="js/noty/layouts/topRight.js"></script>
		<script type="text/javascript" src="js/noty/themes/default.js"></script>
		<script type="text/javascript" src="js/noty/promise.js"></script>

</head>

<body>
<div id="wrapper">
<h1 class="h1"> ARBETSORDER </h1>
<hr />

<form id="form1" name="form1" method="post" action="process_reg.php">


<!--
Kund Portion Started
-->
<div id="form1_Kund">

<h2>Kund</h2>
<p>
  <label for="form1_Namnn">Namnn</label>
  <input type="text" name="form1_Namnn" id="form1_Namnn" size="30"/>
</p>
<p>
  <label for="form1_Telefone">Telefone</label>
  <input type="text" name="form1_Telefone" id="form1_Telefone" size="30"/>
</p>
  <label for="form1_Adress">Adress</label>
  <input type="text" name="form1_Adress" id="form1_Adress" size="30"/>
<p>
  <label for="form1_Epost">E-Post</label>
  <input type="text" name="form1_Epost" id="form1_Epost" size="30"/>
</p>
<p>
<input value="Register" type="submit" id="register">
</p>
</div>
<!--
Kund Portion Ended
-->

</form>
</div>
</div>
</body>
</html>
