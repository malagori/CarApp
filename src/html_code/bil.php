<div id="wrapper">
<h1 class="h1"> Bil Registrering </h1>
<hr />

<form id="form1" name="form1" method="post" action="process_reg.php">


<div id="form1_Fordonsuppgifter">
<h2>Fordonsuppgifter</h2>
<p>
  <label for="form1_Reg_nr">Reg Nr</label>
  <input type="text" name="form1_Reg_nr" id="form1_Reg_nr" size="30"/>
</p>
<p>
  <label for="form1_Bilmärke">Bilmärke</label>
  <input type="text" name="form1_Bilmärke" id="form1_Bilmärke" size="30" />
</p>
  <label for="form1_Model">Model</label>
  <input type="text" name="form1_Model" id="form1_Model" size="30" />
<p>
  <label for="form1_Årsmodel">Årsmodel</label>
  <input type="text" name="form1_Årsmodel" id="form1_Årsmodel" size="30" />
</p>
<p>
  <label for="form1_m-km">Miltal - km</label>
  <input type="text" name="form1_m-km" id="form1_m-km" size="30"/>
</p>
<label for="form1_Antaldörrar">
Antaldörrar
</label>
<div id="form1_Antaldörrar">
  <label>
    <input type="radio" name="Antald&ouml;rrar" value="3D" id="Antaldoumlrrar_0" />
    3 D</label>
  <label>
    <input type="radio" name="Antald&ouml;rrar" value="4D" id="Antaldoumlrrar_1" />
    4 D</label>
  <label>
    <input type="radio" name="Antald&ouml;rrar" value="5D" id="Antaldoumlrrar_2" />
    5 D</label>

  <label>
    <input type="radio" name="Antald&ouml;rrar" value="Skåp" id="Antaldoumlrrar_3" />
    Skåp</label>
</div>
<p>
  <input value="Registrering" type="submit" id="register">
</p>
</div>
<!--
Bil Portion Ended
-->

</form>
</div>