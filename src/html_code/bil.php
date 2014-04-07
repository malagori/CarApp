<div id="wrapper">
<h1 class="h1"> Bil Registrering </h1>
<hr />

<form id="form1" name="form1" method="post" action="../controller/CarHandler.php">


<div id="form1_Fordonsuppgifter">
<h2>Fordonsuppgifter</h2>
<p>
  <label for="form1_Reg_nr">Reg Nr</label>
  <input type="text" name="form1_Reg_nr" class="text" size="30"/>
</p>
<p>
  <label for="form1_Bilmärke">Bilmärke</label>
  <select name="bilmarke" class="select">                      
	<option value="0">--Select Bilmärke--</option>
	<option value="1">Alfa Romeo</option>
	<option value="2">Aston Martin</option>
	<option value="3">Audi</option>
  </select>
</p>
  <label for="form1_Model">Model</label>
  <input type="text" name="form1_Model" class="text" size="30" />
<p>
  <label for="form1_Årsmodel">Årsmodel</label>
  <input type="text" name="form1_Arsmodel" class="text" size="30" />
</p>
<p>
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
</p>
<p>
  <label for="form1_Farg_Kod">Färg kod</label>
  <input type="text" name="form1_fargKod" class="text" size="30"/>
</p>
<p>
  <label for="form1_m-km">Miltal - km</label>
  <input type="text" name="form1_Miltal" class="select" size="30"/>
</p>
    <p>
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
    </p>
<p>
  <input value="Registrering" type="submit" id="registerCar">
</p>
<input  type="hidden" name="action" value="registerCar">
</div>
<!--
Bil Portion Ended
-->

</form>
</div>