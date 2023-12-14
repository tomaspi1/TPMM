 <?php
 echo "<br>";
echo "<table border=1 class=produkty";
echo "<tr> <th>Název</th> <th>Cena bez DPH</th> <th>Cena s DPH</th> <th></th> </tr>";
foreach ($produkty as $kodProduktu => $infoOProduktu) {
    $cenaBezDPH = $infoOProduktu["cena"];
    $cenaSDPH = cenaSDPH($cenaBezDPH); // Funkce pro přidání DPH

    echo "<tr>
        <td>{$infoOProduktu["nazev"]}</td>
        <td>" . cenaProduktu($cenaBezDPH, $kurz, $mena) . "</td>
        <td>" . cenaProduktu($cenaSDPH, $kurz, $mena) . "</td>
        <td>
            <form method=\"post\" onsubmit=\"kosik('$kodProduktu'); return false\">
                <button name='pridat' value='$kodProduktu'><i class='fas fa-shopping-basket'></i></button>
            </form>
        </td>
        </tr>";
}
echo "</table>";


?>  
