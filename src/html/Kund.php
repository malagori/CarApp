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
     <h1>Kund Registrering </h1>
   <form id="form1" name="form1" method="post" action="../controller/KundHandler.php">
   <input class="input-lg" type="text" placeholder="Ange Förnamn" name="fornamn">
   <input class="input-lg" type="text" placeholder="Ange Efternamn" name="Efternamn">
   <input class="input-lg" type="text" placeholder="Ange Telefone" name="form1_Telefone">
   <input class="input-lg" type="text" placeholder="Ange Adress" name="form1_Adress">
   <input class="input-lg" type="email" placeholder="Ange E-post" name="form1_Epost">   
   <input class="btn-primary btn-lg" value="Registrering" type="submit" id="registerKund">
   <input  type="hidden" name="action" value="registerKund">
    </form> 
 </div>
    
</body>
</html>