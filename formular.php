<h3>Formulář</h3>
<?php
$jmeno = null;
$adresa = null;
$vek = null;
$pohlavi = null;
$chyby = [];
$vseOK = false;

$seznamPohlavi = [
    "muz" => "Muž",
    "zena" => "Žena",
    "jine" => "Jiné",
];

if (array_key_exists("zaregistrovat", $_POST))
{
    $jmeno = $_POST["jmeno"];
    $vek = $_POST["vek"];
    $pohlavi = $_POST["pohlavi"];
	$adresa = $_POST["adresa"];
	$email = $_POST["email"];


    // kontrola chyb

    // kontrola jmena
    if ($jmeno == "")
    {
        $chyby["jmeno"] = "<b>Musí být vyplněno jméno</b>";
    }
    else if (mb_strlen($jmeno) < 3)
    {
        $chyby["jmeno"] = "<b>Příliš krátké jméno</b>";
    }

	// kontrola bydliště
    if ($adresa == "")
    {
        $chyby["adresa"] = "<b>Musí být vyplněna adresa</b>";
    }
    else if (mb_strlen($jmeno) < 3)
    {
        $chyby["jmeno"] = "<b>Příliš krátké jméno</b>";
    }
	// kontrola e-mailu
    if (!preg_match("/.+@.+\\..+/", $email))
    {
        $chyby["email"] = "<b>E-mail musí být  zadán ve správném formátu</b>";
    }
    else if (mb_strlen($jmeno) < 5)
    {
        $chyby["jmeno"] = "<b>Příliš krátké jméno</b>";
    }
    // kontrola veku
    if ($vek == "")
    {
        $chyby["vek"] = "<b>Musí být vyplněn věk</b>";
    }
    else if (is_numeric($vek) == false)
    {
        $chyby["vek"] = "<b>Musí být zadáno číslo</b>";
    }
    else if ($vek < 3)
    {
        $chyby["vek"] = "<b>Nesprávná hodnota věku</b>";
    }
    else if ($vek > 150)
    {
        $chyby["vek"] = "<b>Nesprávná hodnota věku</b>";
    }

    // kontrola pohlavi
    if ($pohlavi == "")
    {
        $chyby["pohlavi"] = "<b>Musíte si zvolit pohlaví</b>";
    }
    

    // kontrola zdali je vse v poradku
    if (count($chyby) == 0)
    {
        $vseOK = true;
    }
}
// Aplikování červeného stylu
foreach ($chyby as &$chyba) {
    $chyba = "<span style='color: red; font-size: smaller;'>$chyba</span>";
}

?>

<section>
    <?php
    if ($vseOK == false)
    {
        ?>
        <form method="post">
            <b>Jméno:</b> <input type="text" name="jmeno" value="<?php echo $jmeno; ?>">
            <?php
            if (array_key_exists("jmeno", $chyby))
            {
                echo $chyby["jmeno"];
            }
            ?>
            <br>

			<b>Adresa odeslání:</b> <input type="text" name="adresa" value="<?php echo $adresa; ?>">
            <?php
            if (array_key_exists("adresa", $chyby))
            {
                echo $chyby["adresa"];
            }
            ?>
            <br>
			<b>E-mail:</b> <input type="text" name="email" value="<?php echo $adresa; ?>">
            <?php
            if (array_key_exists("email", $chyby))
            {
                echo $chyby["email"];
            }
            ?>
            <br>
            <b>Věk:</b> <input type="text" name="vek" value="<?php echo $vek; ?>">
            <?php
            if (array_key_exists("vek", $chyby))
            {
                echo $chyby["vek"];
            }
            ?>
            <br>

            <b>Pohlaví:</b> <select name="pohlavi">
                <option value="">Vyberte</option>
                <?php
                foreach ($seznamPohlavi as $identifikatorPohlavi => $nazevPohlavi)
                {
                    $selected = '';
                    if ($identifikatorPohlavi == $pohlavi)
                    {
                        $selected = 'selected';
                    }
                    echo "<option value='$identifikatorPohlavi' $selected>$nazevPohlavi</option>";
                }
                ?>
            </select>
            <?php
            if (array_key_exists("pohlavi", $chyby))
            {
                echo $chyby["pohlavi"];
            }
            ?>
            <br>

			

            <button name="zaregistrovat">Odeslat</button>
			<div class="empty-space"></div> 
        </form>
        <?php
    }
    else
    {
        

        echo "<table border=1>";
        echo "<tr> <th>Jméno</th> <td>$jmeno</td> </tr>";
		echo "<tr> <th>Adresa</th> <td>$adresa</td> </tr>";
		echo "<tr> <th>E-mail</th> <td>$email</td> </tr>";
        echo "<tr> <th>Věk</th> <td>$vek</td> </tr>";
        echo "<tr> <th>Pohlaví</th> <td>{$seznamPohlavi[$pohlavi]}</td> </tr>";
        echo "</table>";

		echo "<br>";
        echo "<a href='odeslano.php'><button>Odeslat se závazkem</button></a>";
		

    }
    ?>
	<div class="empty-space"></div> 
</section>
</html>