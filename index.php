<?php
session_start();

if (array_key_exists("kosik", $_SESSION) == false)
{
   $_SESSION["kosik"] = [];
}

$produkty = [
   "RI038b3" => [
       "nazev" => "iPhone 13 Pro 128GB grafitově šedá",
       "cena" => 28990,
   ],
   "GPX1068b1" => [
       "nazev" => "Google Pixel 6 Pro 5G 12GB/128GB černá",
       "cena" => 26990,
   ],
   "SAMO0223b2" => [
       "nazev" => "Samsung Galaxy A52s 5G černá",
       "cena" => 11499,
   ],
];

// zpracovani tlacitka Pridat
if (array_key_exists("pridat", $_POST))
{
   $kodProduktu = $_POST["pridat"];
   if (array_key_exists($kodProduktu, $_SESSION["kosik"]) == false)
   {
       $_SESSION["kosik"][$kodProduktu] = 1;
   }
   else
   {
       $_SESSION["kosik"][$kodProduktu]++;
   }
   header("Location: ?");
}

// zpracovani tlacitka Odebrat
if (array_key_exists("odebrat", $_POST))
{
   $kodProduktu = $_POST["odebrat"];
   $_SESSION["kosik"][$kodProduktu]--;
   if ($_SESSION["kosik"][$kodProduktu] == 0)
   {
       unset($_SESSION["kosik"][$kodProduktu]);
   }
   header("Location: ?");
}

// zpracovani tlacitka Vysypat
if (array_key_exists("vysypat", $_POST))
{
   $_SESSION["kosik"] = [];
   header("Location: ?");
}

function cenaProduktu($cena)
{
   return number_format($cena, 0, ",", " ")." Kč";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <h1>Nabídka produktů</h1>
   <?php
   echo "<table border=1>";
   echo "<tr> <th>Název</th> <th>Cena</th> <th></th> </tr>";
   foreach ($produkty as $kodProduktu => $infoOProduktu)
   {
       echo "<tr>
           <td>{$infoOProduktu["nazev"]}</td>
           <td>".cenaProduktu($infoOProduktu["cena"])."</td>
           <td>
               <form method='post'>
                  <button name='pridat' value='$kodProduktu'><i class='fas fa-shopping-basket'></i></button>
               </form>
           </td>
           </tr>";
   }
   echo "</table>";
   ?>

   <h1>Obsah košíku</h1>
   <?php
   if (count($_SESSION["kosik"]) > 0)
   {
       echo "<table border=1>";
       $celkovaCena = 0;
       foreach ($_SESSION["kosik"] as $kodProduktu => $mnozstvi)
       {
           echo "<tr>
               <td>$mnozstvi x {$produkty[$kodProduktu]["nazev"]}</td>
               <td>
                  <form method='post'>
                      <button name='odebrat' value='$kodProduktu'>-</button>
                  </form>
               </td>
               </tr>";
           $cenaProduktu = $produkty[$kodProduktu]["cena"];
           $celkovaCena += $cenaProduktu * $mnozstvi;
       }
       echo "</table>";

       echo "<h2>Celková cena: ".cenaProduktu($celkovaCena)."</h2>";

       echo "<form method='post'>
           <button name='vysypat'>Vysypat</button>
       </form>";
   }
   else
   {
       echo "Košík je prázdný";
   }
   ?>

   <!-- Formulář pro zadání základních údajů -->
   <form action="" method="post">
      <label for="name">Jméno:</label><br>
      <input type="text" id="name" name="name"><br>
      <label for="age">Příjmení:</label><br>
      <input type="number" id="surname" name="surname"><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email"><br>
      <input type="submit" value="Odeslat">