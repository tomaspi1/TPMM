<h3>Košík</h3>
<?php
if (isset($_POST['delete']))
{
    unset($_COOKIE['kosik']);
    setcookie('kosik',  "", time()-3600);
}

$kody_zbozi = $_COOKIE["kosik"];
$mena = $_GET['kosik'];
$kurz = $_GET['kurz'];
$cena_celkem = 0;
$kody_zbozi_array = explode("|",$kody_zbozi);
$zbozi_kosik = [];
$pomocne_pole_souctu = [];
$pocty = 0;
$x = [];
foreach ($kody_zbozi_array as $value){
    foreach ($x as $key => $value1){
        if ($key == $value){
            $x[$key][0]++;
        }
    }
    $x += [$value => [1]];
}

foreach ($x as $klic_produktu => $kod_zbozi){
        foreach ($produkty as $klic => $value1){
            if($klic == $klic_produktu){
                $vlastnosti_zbozi = ["nazev" => $value1['nazev']]
                    + ["cena" => $value1['cena']]
                    + ["ks" => $kod_zbozi[0]];
            }
        }
        $zbozi_kosik += [$klic_produktu => $vlastnosti_zbozi];
}
echo '<table>';
echo "<tr> <th>Kusy</th> <th>Název</th> <th>Cena bez DPH</th> <th>Cena s DPH</th> <th></th> </tr>";
foreach ($zbozi_kosik as $polozka){
    $cena_bez = cenaProduktu($polozka['cena']*$polozka['ks'], $kurz, $mena);
    $cena_s_dph = cenaSDPH($polozka['cena']*$polozka['ks']);
    $cena_s_dph = cenaProduktu($cena_s_dph, $kurz, $mena);
    echo "<tr><td>{$polozka['ks']}</td><td>{$polozka['nazev']}</td><td>{$cena_bez}</td><td>{$cena_s_dph}</td></tr>";
    $cena_celkem += $polozka['cena'] * $polozka['ks'];
}
$cena_celkem_mena = cenaProduktu($cena_celkem, $kurz, $mena);
$cena_celkem_s = cenaSDPH($cena_celkem);
$cena_celkem_s_mena = cenaProduktu($cena_celkem_s, $kurz, $mena);
echo '</table>';
$celkovaCenaBezDPH = $cena_celkem;
$celkovaCenaSDPH = cenaSDPH($celkovaCenaBezDPH);
echo "<h3>Celková cena bez DPH: " . $cena_celkem_mena . "</h3>";
echo "<h3>Celková cena s DPH: " . $cena_celkem_s_mena . "</h3>";

?>
<!-- Tlačítko na vymazání cookies -->

<script>

document.getElementById("vymazatKosik").addEventListener("click", function() {
 document.cookie = "kosik=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/FAPI; Secure; HttpOnly;";
});
</script>


<?php
if (!isset($_POST['jmeno']))
{
echo "<form method='POST' action=''>
        <input type='hidden' name='delete' value ='1'>
        <button>Vysypat</button>
    </form>";
}
?>


