<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css"
	href="http://localhost/carapp/resources/css/bootstrap.css">
<title>Car Repairing</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" type="text/css"
	href="http://localhost/carapp/resources/css/style.css">
<link rel="stylesheet" type="text/css"
	href="http://localhost/carapp/resources/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"
	href="http://localhost/carapp/resources/css/bootstrap.css"
	src="resources/css/bootstrap.css">

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript"
	src="http://localhost/carapp/resources/resources/js/bootstrap.js"></script>
<script type="text/javascript"
	src="http://localhost/carapp/resources/js/bootstrap.min.js"></script>
<script type="text/javascript"
	src="http://localhost/carapp/resources/js/jquery.js"></script>

</head>
<body>

	<div class="register">
		<h1>Skada registrering</h1>
		<form id="form1" name="form1" method="post"
			action="../controller/DamageHandler.php">

			<select name="bilmarke" class="styled-select">
				<option value="0">--Select Bilmärke--</option>
				<option value="1">IF</option>
				<option value="2">Aston Martin</option>
				<option value="3">Audi</option>
			</select> <input class="input-lg" type="text"
				placeholder="Ange Skade Nr" name="form1_skade_nr"> <input
				class="input-lg" type="text" placeholder="Ange Skade dag"
				name="form1_Skade_dag">

			<div class="styled-checkbox">
				<table class= "table-checkbox">
					<tr>
						<th><p>Antal skador</p>
						</th>
						<th></th>
					</tr>
					<tr>
						<td><input type="checkbox" name="check" value="1"
							id="Ersättningsbar" /> Ersättningsbar</td>
						<td><input type="checkbox" name="check" value="1" id="Vållande" />
							Vållande</tr>
					<tr>
						<td><input type="checkbox" name="check" value="1" id="Självrisk" />
						Självrisk</td>
						<td><input type="checkbox" name="check" value="1" id="Momspliktig" />
						Momspliktig</td>
					</tr>
				</table>
			</div>
			<input class="input-lg" type="text" placeholder="Ange Självrisk"
				name="form1_Sjalvrisk"> <input class="input-lg" type="text"
				placeholder="Ange Bokad tid" name="form1_Bokad_tid"> <input
				class="input-lg" type="text" placeholder="Ange Beräknad Klart"
				name="form1_Beräknad_Klart"> <input class="input-lg" type="text"
				placeholder="Ange Klar Datum" name="form1_Klar_Datum"> <input
				class="btn-primary btn-lg" value="Registrering" type="submit"
				id="registerDamage"> <input type="hidden" name="action"
				value="registerDamage">
		</form>
	</div>

</body>
</html>
