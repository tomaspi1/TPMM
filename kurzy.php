<link rel="stylesheet" href="css/style.css">

<?php echo "<a class='kosik-link' href='?kosik={$mena}&kurz={$kurz}'>Košík</a>"; ?>

<h3>Výběr měny</h3>
<form action="" method="get">
        <select name="meny" id="meny">
            <?php
            foreach ($meny as $x => $hodnota)
            {
                if ($mena === $x )
                {
                    $vybrano = "selected";
                }else
                {
                    $vybrano = "";
                }


                echo "<option {$vybrano} value={$x}>{$hodnota}</option>";
            }

            ?>
        </select>
    </form>

	