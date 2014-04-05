<div id="wrapper">
<h1 class="h1"> Kund Registrering </h1>
<hr />

<form id="form1" name="form1" method="post" action="src/controller/KundHandler.php">

<!--
Kund Portion Started
-->
<div id="form1_Kund">

<h2>Kund</h2>
<p>
  <label for="form1_Namnn">Förnamn</label>
  <input type="text" name="fornamn" id="form1_Namnn" size="30"/>
</p>
<p>
  <label for="form1_Namnn">Efternamn</label>
  <input type="text" name="Efternamn" id="form1_Namnn" size="30"/>
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
<input value="Registrering" type="submit" id="registerKund">
</p>
<input  type="hidden" name="action" value="registerKund">
</div>
<!--
Kund Portion Ended
-->

</form>
</div>