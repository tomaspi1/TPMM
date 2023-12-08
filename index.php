<?php
include 'kosik.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styly.css">
	<script src="money.js"></script>
	<title>Formulář pro FAPI</title>
</head>
<body>
	

<form >
<label for="jmeno">Jméno:</label>
<input type="text" name="jmeno" id="jmeno" 
placeholder="Vaše jméno" >
<br>

<label for="vek"> Věk:</label>
<input type ="number" name="vek" id="vek"
placeholder="Váš věk">
<br>

<label for="email" >E-mail</label>
<input type="email" name="email" id="email"
placeholder ="Váš email" value="@">
<br>

<label for="heslo">Heslo</label>
<input type="password" name="heslo" id="heslo" placeholder="Vaš heslo">
<br> 


Edice:
<label for="edice">speciální</label>
<input type="radio" name="fakturace" id="edice">
<label for="zakladni">základní</label>
<input type="radio" name="fakturace" id="specialni">
<br>

<label for="pohlavi">Pohlaví</label>
<select name="pohlavi">
	<option>vyberte</option>
	<option>Muž</option>
	<option>Žena</option>
</select>
<br>


<label for="poznamka">Poznámka</label>
<textarea name="poznamka" id="poznamka" placeholder="Něco nám napište" ></textarea>
<br>

<label for="podmínky">Souhlasím s podmínkami </label>
<input type="checkbox" name="souhlas" id="podminky" checked>
<br>

<button>Zaregistrovat <img src="img/next.png" height="24" ></button>

</form>




<video src="video/pozadi.mp4" autoplay muted></video>

</body>



</html>