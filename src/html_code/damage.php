<div id="wrapper">
<h1 class="h1"> Skada registrering </h1>
<hr />

<form id="form1" name="form1" method="post" action="../controller/DamageHandler.php">


<div id="form1_Fordonsuppgifter">
<h2>Skadeuppgifte</h2>
    
<p>
  <label for="form1_Bilmärke">F. Bolag</label>
  <select name="bilmarke" class="select">                      
	<option value="0">--Select Bilmärke--</option>
	<option value="1">IF</option>
	<option value="2">Aston Martin</option>
	<option value="3">Audi</option>
  </select>
</p>
<p>
  <label for="form1_skade_nr">Skade Nr</label>
  <input type="text" name="form1_skade_nr" class="text" size="30"/>
</p>

    <p>
  <label for="form1_Skade_dag">Skade dag</label>
  <input type="text" name="form1_Skade_dag" class="text" size="30" />
    </p>
<p>
  <label for="form1_Skadetyp">Skadetyp</label>
  <select name="form1_Skadetyp" class="select">                      
	<option value="0">--Select Skadetyp--</option>
	<option value="1">Trafik</option>
	<option value="2">Aston Martin</option>
	<option value="3">Audi</option>
  </select>
</p>
<label for="form1_Antal_skador">
Antal skador
</label>
    <div class="check">
        
<label>
    <input type="checkbox" name="check" value="1" id="Ersättningsbar" />
    Ersättningsbar 
</label>
  <label>
    <input type="checkbox" name="check" value="1" id="Vållande" />
    Vållande</label>
            
        
  <label>
    <input type="checkbox" name="check" value="1" id="Självrisk" />
    Självrisk</label>

  <label>
    <input type="checkbox" name="check" value="1" id="Momspliktig" />
    Momspliktig</label>
            
</div>
    
<p>
  <label for="form1_Självrisk">Självrisk</label>
  <input type="text" name="form1_Sjalvrisk" class="text" size="30" />
</p>
<p>
  <label for="form1_Bokad_tid">Bokad tid</label>
  <input type="text" name="form1_Bokad_tid" class="text" size="30"/>
</p>
<p>
  <label for="form1_Beräknad_Klart">Beräknad Klart</label>
  <input type="text" name="form1_Beräknad_Klart" class="select" size="30"/>
</p>
<p>
  <label for="form1_Klar_Datum">Klar Datum</label>
  <input type="text" name="form1_Klar_Datum" class="select" size="30"/>
</p>
    

<p>
  <input value="Registrering" type="submit" id="registerDamage">
</p>
<input  type="hidden" name="action" value="registerDamage">
</div>
<!--
Bil Portion Ended
-->

</form>
</div>