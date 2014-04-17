<?PHP
session_start();
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
<style type="text/css">
	.table{
	 background-color: #FAFAFA;  
    width: 50%; 
    margin: 10px auto 10px auto; 
    min-height: 300px; 
    border-radius: 5px solid #ddd; 
    text-align: left;  
    padding: 35px; 
    border: 1px solid #ddd;
    border-radius: 20px;
	}
</style>   
</head>

<body>
<div class="container">
<header><img src="http://localhost/carapp/resources/images/Header.png" alt="Logo"></header>
<div class="clear"></div>
<div id="contents">
 <aside>
 <nav class="navbar">
  <a class="btn-danger active" href="?page=Status">Status</a>
	
 </nav>
 </aside>

 <section id="page">
 <div class="table">
 <?php

	$allRecords= $_SESSION['allRecords'];
 	$max = sizeof($allRecords);

 	echo "<table align='center' border= 1px solid #ddd;>";
 	for($i = 0; $i < $max-1;$i++){
 		echo "<tr>";
 		echo "<td >";
 		echo $allRecords[0]['StatusType'];
 		echo "</td>";
 		echo "<td>";
 		echo "&nbsp";
 		echo "Done";
 		echo "</td>";
 		echo "</tr>";
		
	}
	echo "<tr>";
	echo "<td>";
 	echo $allRecords[$max-1]['StatusType'];
 	echo "</td>";
 	echo "<td>";
 	echo "&nbsp";
 	echo $allRecords[$max-1]['StartEnd'];
 	echo "</td>";
 	
 	echo "<td>";
 	echo "&nbsp";
	echo $allRecords[$max-1]['Description'];
	echo "</td>";
	
 	echo "<td>";
 	echo "&nbsp";
	echo $allRecords[$max-1]['REGID'];
	echo "</td>";
	
 	echo "</tr>";
 	echo "</table>";
 	
     
  ?>   
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