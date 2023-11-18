<?php
    $ogranicenje = 0;
    $title="Rang lista korisnika";
    $description="pocetna stranica. kreirana 22.5.2022.";
    require "php_skripte/zaglavlje.php";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
<script src="js/rangLista.js"></script>

<div>
    <h1>Rang Lista korisnika prema broju etapa</h1>
    <form id="filter">
        <label for="vrijeme_od">Od</label>
        <input type="text" placeholder="d.m.y. h:m:s" id = "vrijeme_od">

        <label for="vrijeme_do">Do</label>
        <input type="text" placeholder="d.m.y. h:m:s" id = "vrijeme_do">

        <br>
        <input type="submit" value="filtriraj">
    </form>
</div>
<div>
    <table id="rang_lista">
        
        
    </table>
</div>

<?php
    $cssValid="";
    $htmlValid="";
    require "php_skripte/podnozje.php";
?>