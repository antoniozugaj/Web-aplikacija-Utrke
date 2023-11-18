<?php

    $ogranicenje = 0;
    $title="Registracija";
    $description="stranica za registraciju novog korisnika";
    require "php_skripte/zaglavlje.php";
?>
<script src='https://www.google.com/recaptcha/api.js'></script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
<script src="js/provjera_usernamea.js"></script>
<script src="js/registracija.js"></script>

<div>
    <form id="registracija" action="registriraj.php" method="post">
        <label for="imeprezime" id="lab_imeprezime">Ime i prezime:</label>
        <input type="text" id="imeprezime" name="imeprezime">

        <label for="email" id="lab_email">email:</label>
        <input type="text" id="email" name="email">

        <label for="korisnickoime" id="lab_korisnickoime">Korisnicko ime:</label>
        <input type="text" id="korisnickoime" name="korisnickoime">

        <label for="lozinka" id="lab_lozinka">Lozinka:</label>
        <input type="password" id="lozinka" name="lozinka">

        <label for="ponlozinka" id="lab_ponlozinka">Ponovljena lozinka:</label>
        <input type="password" id="ponlozinka" name="ponlozinka">
        <br>
        <input type="submit" value="registriraj">
    </form>
</div>
<?php
    $cssValid="";
    $htmlValid="";
    require "php_skripte/podnozje.php";
?>