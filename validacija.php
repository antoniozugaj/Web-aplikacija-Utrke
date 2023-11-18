<?php

    session_start();
    $title="Validacija korisnika";
    $description="Stranica za validaciju korisnika";
    require "php_skripte/zaglavlje.php";
?>

<div>  
    <h1>Unesite kod za validaciju (poslana vam je na email)</h1>
    <form action="provjeraValidacije.php" method="post">
        <input type="text" name="unos">
        <br>
        <input type="submit" value="aktiviraj">
    </form>
</div>
<?php
    $cssValid="";
    $htmlValid="";
    require "php_skripte/podnozje.php";
?>