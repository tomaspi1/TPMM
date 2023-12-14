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
        </menu>
    </header>
   
   
<main>
  <h1>
	Děkujeme Vaše objednávka byla odeslána.
  </h1>

<?php   

$finalniOdeslani = "index.php";
?>

<form action="<?php echo $finalniOdeslani; ?>" method="post" action="#">
    <button type="submit">Zpět</button>
</form>
 
</main>
</body>
</html>