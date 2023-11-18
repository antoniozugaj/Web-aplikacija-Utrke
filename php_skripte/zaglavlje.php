<!DOCTYPE html>
<html lang="hr">

    <head>

        <?php

        require "provjeraPristupa.php";

        echo "<title> $title </title>";
        echo '<meta name="description" content="'.$description.'">';
        ?>
        <link rel="stylesheet" type="text/css" href="css/azugaj.css">
        <meta name="author" content="Antonio Žugaj">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body id="prikazi">
        
        <header id="zaglavlje_stranice">

            <a class ="lijevo" href="index.php"> <img src="materijali/main_icon.png"  height="40" width="40" alt="ikona TRCANJA"></a> 
            <a id = "naslov" href="">TRCANJE</a>
            <a class="desno" href="#prikazi"> <img src="materijali/menu_icon.png" height="30" width="30" alt="Menu za navigaciju"></a>

        </header>
        
        <nav class="desno">

            <ul>
                <?php
                    require "navigacija.php";
                ?>
            </ul>

        </nav>

        <main>