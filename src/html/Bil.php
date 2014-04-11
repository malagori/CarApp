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
     <h1>Bil Registrering </h1>
   <form id="form1" name="form1" method="post" action="../controller/CarHandler.php">
   <input class="input-lg" type="text" placeholder="Ange Reg Nr" name="form1_Reg_nr">

<label for="form1_Bilmärke">Bilmärke</label>
  <select name="bilmarke" class="select">                      
	<option value="0">--Select Bilmärke--</option>
	<option value="1">Alfa Romeo</option>
	<option value="2">Aston Martin</option>
	<option value="3">Audi</option>
  </select>
       
   <input class="input-lg" type="text" placeholder="Ange Model" name="form1_Model">
   <input class="input-lg" type="text" placeholder="Ange Årsmodel" name="form1_Arsmodel">
   
<label for="form1_Farg">Färg</label>
  <select id="form1_Farg" name="farg" class="select">                      
	<option value="0">--Select färg--</option>
	<option value="1">Svart</option>
	<option value="2">Vit</option>
	<option value="3">Räd</option>
	<option value="4">Blä</option>
	<option value="5">Gul</option>
	<option value="6">Grä</option>
	<option value="7">Grän</option>
	<option value="8">Brun</option>
	<option value="9">Silver</option>
  </select>
       
    <input class="input-lg" type="text" placeholder="Ange Färg kod" name="form1_fargKod">
   <input class="input-lg" type="text" placeholder="Ange Miltal - km" name="form1_Miltal">

<label for="form1_Antaldörrar">
Antaldörrar
</label>
<div id="form1_Antaldörrar">
  <label>
    <input type="radio" name="radioD" value="1" id="Antaldoumlrrar_0" />
    3 D</label>
  <label>
    <input type="radio" name="radioD" value="2" id="Antaldoumlrrar_1" />
    4 D</label>
  <label>
    <input type="radio" name="radioD" value="3" id="Antaldoumlrrar_2" />
    5 D</label>

  <label>
    <input type="radio" name="radioD" value="4" id="Antaldoumlrrar_3" />
    Skåp</label>
</div>  

   <input class="btn-primary btn-lg" value="Registrering" type="submit" id="registerCar">
   <input  type="hidden" name="action" value="registerCar">
    </form> 
 </div>
    
</body>
</html>