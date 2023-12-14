<?php
session_start();

require_once "function/cenaSDPH.php";
if (isset($_COOKIE["mena"])&& isset($_COOKIE["kurz"]))
{
    $mena = $_COOKIE["mena"];
    $kurz = $_COOKIE["kurz"];
    unset($_COOKIE['mena']);
    setcookie('mena',  "", time()-3600);
    unset($_COOKIE['kurz']);
    setcookie('kurz',  "", time()-3600);
}else
{
    $mena = "CZK";
    $kurz = 0;
}



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
$meny = [
    "CZK" => "Kč",
    "EUR" => "€",
    "USD" => "$",
    ];



// zpracovani tlacitka Odebrat
if (array_key_exists("odebrat", $_POST))
{
   $kodProduktu = $_POST["odebrat"];
   $_SESSION["kosik"][$kodProduktu]--;
   if ($_SESSION["kosik"][$kodProduktu] == 0)
   {
       unset($_SESSION["kosik"][$kodProduktu]);
   }
   //header("Location: ?");
}



function cenaProduktu($cena, $kurz, $mena)
{ 
    if ($kurz > 0)
    {
        $cena = $cena/$kurz;
    }
    if ($mena === "EUR")
    {
        $symbol = "€";
    } elseif ($mena === "USD"){
        $symbol = "$";
    }
    elseif ($mena === "CZK"){
        $symbol = "Kč";
    }


    $return = number_format($cena, 0, ",", " ")." ". $symbol;
    return $return;
}

?>
<!DOCTYPE html>
<html lang="cs">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TP-MOBIL Market</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reset.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js"></script>
    <script src="formular.js"></script>
    <script async="1" src="https://data.kurzy.cz/json/meny/b[6]cb[vypiskurzy].js"></script>

</head>
<body>
    <header>
        <menu>
            <div class="container">
            <a href="index.php">
                <img src="img/logo.png" alt="Logo TP-MOBIL" width="200" heigt="154">
                </a>
            </div>
            <form method="get" action="index.php">
    <button type="submit" class="produkty-button">Produkty</button>
</form>
        </menu>
    </header>
<h1>  Produkty </h1>
<main>
   
    <?php

    if (isset($_GET['kosik']))
    {
        //require_once "kurzy.php";
        require "kosik.php";
        require "formular.php";

    }else
    {
        require_once "kurzy.php";
         require "zbozi.php";
    }



    ?>



</main>
</body>
</html>