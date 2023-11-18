<?php
    $ogranicenje = 2;
    $title="Uređivanje odabranu etapu";
    $description="Stranica za uređivanje odabrane etapu.";
    require "php_skripte/zaglavlje.php";

    $id = $_GET["id"];
    $opcija=$_GET["opcija"];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
<script src="js/urediEtapu.js"></script>

<div id="azuriranje">
    <form>
        <?php
        echo "<input id=etapa_id type=hidden name=etapa_id value=$id>";
        echo "<input id=opcija type=hidden name=etapa_id value=$opcija>";
        ?>
    </form>
    <h3>Ažuriranje podataka</h3>
    <form id="azuriraj">
    </form>
</div>
<div id="rezultati">
    <h2>Sudionici etape</h2>
    <form id="upis">
    </form>
</div>
<div id="poruka"></div>
<?php
    $cssValid="";
    $htmlValid="";
    require "php_skripte/podnozje.php";
?>