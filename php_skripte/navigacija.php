<?php


    if(!isset($_SESSION["username"]))
        echo '<li><a class="menu_nav" href="prijava.php">Prijava</a></li>';

    echo '<li><a class="menu_nav" href="index.php">Početna stranica</a></li>';
    echo '<li><a class="menu_nav" href="rangListaKorisnika.php">Rang lista korisnika</a></li>';
    echo '<li><a class="menu_nav" href="galerija.php">Galerija</a></li>';

    if(isset($_SESSION["tip_korisnika"])){

        echo '<li><a class="menu_nav" href="popisUtrka.php">Popis utrka</a></li>';
        echo '<li><a class="menu_nav" href="mojeUtrke.php">Popis mojih utrka</a></li>';
        

        if($_SESSION["tip_korisnika"] > 1){

            echo '<li><a class="menu_nav" href="moderiranje.php">Moderiranje utrka</a></li>';
        }

        if($_SESSION["tip_korisnika"] > 2){

            echo '<li><a class="menu_nav" href="blokiraniKorisnici.php">Blokirani korisnici</a></li>';
            echo '<li><a class="menu_nav" href="dnevnikRada.php">Pregled dnevnika rada</a></li>';
            echo '<li><a class="menu_nav" href="ulogeKorisnika.php">Promjena uloga korisnika</a></li>';
            echo '<li><a class="menu_nav" href="drzave.php">Države</a></li>';
            echo '<li><a class="menu_nav" href="dodavanjeUtrke.php">Utrke</a></li>';
        }

        echo '<li><a class="menu_nav" href="php_skripte/odjava.php">Odjava</a></li>';
    }
  
?>