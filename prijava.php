<?php

    if($_SERVER["HTTPS"] != "on" || !isset($_SERVER["HTTPS"]))
    {
        header("Location: https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"],true,301);
    }

    $ogranicenje = 0;
    $title="Prijava";
    $description="Stranica za prijavu korisnika";
    require "php_skripte/zaglavlje.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
<script src="js/prijava.js"></script>

<div>
    <form id="prijava_forma" method="post">
        <label for="username" id="lab_korisnickoime">Korisnicko ime:</label>
        <input type="text" id="username" name="username">

        <label for="password" id="lab_lozinka">Lozinka:</label>
        <input type="password" id="password" name="password">
        <br>
        <label for="zapamti" id="lab_zapamti">Zapamti me:</label>
        <input type="checkbox" id="zapamti" name="zapamti">
        <br>
        <a id="zaboravili">Zaboravili ste lozinku?</a>
    	<br>
        <input type="submit" value="prijavi">
    </form>
    <br><br>
    <a href="registracija.php">REGISTRIRAJ SE</a>
</div>
<?php
    $cssValid="";
    $htmlValid="";
    require "php_skripte/podnozje.php";
?>