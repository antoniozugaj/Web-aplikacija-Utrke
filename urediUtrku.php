<?php
    $ogranicenje = 3;
    $title="Uređivanje utrku";
    $description="Stranica za uređivanje odabrane utrke.";
    require "php_skripte/zaglavlje.php";

    $id = $_GET["id"];

    require "php_skripte/baza.class.php"; 

    $baza = new Baza;

    $baza->spojiDB();

    $sql = "SELECT * FROM utrka WHERE utrka_id = $id";
    $rezultat = $baza->selectDB($sql);
    $utrka = $rezultat->fetch_assoc();

    $utrka['vrijeme_zavrsetka_prijava']= date("d.m.Y. H:i:s", strtotime($utrka['vrijeme_zavrsetka_prijava']));
	$utrka['pocetak_odrzavanja']= date("d.m.Y. H:i:s", strtotime($utrka['pocetak_odrzavanja']));
	$utrka['kraj_odrzavanja']= date("d.m.Y. H:i:s", strtotime($utrka['kraj_odrzavanja']));

    $tip_utrke=[];
    $sql = "SELECT * FROM tip_utrke";
    $rezultat = $baza->selectDB($sql);
    while($row = $rezultat->fetch_assoc())
            $tip_utrke[] = array("tip_utrke_id" => "{$row['tip_utrke_id']}","naziv_tipa"=>"{$row['naziv_tipa']}");
    
    $drzava=[];
    $sql = "SELECT * FROM drzava";
    $rezultat = $baza->selectDB($sql);
    while($row = $rezultat->fetch_assoc())
            $drzava[] = array("drzava_id" => "{$row['drzava_id']}","ime"=>"{$row['ime']}");

    $baza->zatvoriDB();

    $stari_tip;
    foreach($tip_utrke as $trazi){
        if($trazi["tip_utrke_id"] == $utrka["tip_utrke_id"])
            $stari_tip=$trazi["naziv_tipa"];
    }

    $stara_drzava;
    foreach($drzava as $trazi){
        if($trazi["drzava_id"] == $utrka["drzava_id"])
            $stara_drzava=$trazi["ime"];
    }
   
?>

<div> 
    <?php
    echo "<h1>{$utrka['naziv']}</h1><br><h2>$stara_drzava</h2>";
    ?>
</div>
<div>
    <h3>Ažuriranje podataka</h3>
    <form method="get" action="php_skripte/dodajUtrku.php">
        <?php
        echo '<input type=hidden name=id value='.$utrka['utrka_id'].'>
            <label for="naziv">Naziv</label>
            <input type="text" id = "naziv" name="naziv" value="'.$utrka['naziv'].'" readonly>

            <label for="sudionici">Broj sudionika</label>
            <input type="text" id = "sudionici" name="sudionici" value="'.$utrka['broj_sudionika'].'" readonly>

            <label for="drzava">Država</label>
            <input type="text" id = "drzava" name="drzava" value="'.$stara_drzava.'" readonly>

            <label for="tip">Tip utrke</label>
            <input type="text" id = "tip" name="tip" value="'.$stari_tip.'" readonly><br>

            <label for="prijave">Kraj prijava</label>
            <input type="text" id = "prijave" name="prijave" value="'.$utrka['vrijeme_zavrsetka_prijava'].'" readonly>

            <label for="pocetak">Pocetak održavanja</label>
            <input type="text" id = "pocetak" name="pocetak" value="'.$utrka['pocetak_odrzavanja'].'" readonly>

            <label for="kraj">Kraj održavanja</label>
            <input type="text" id = "kraj" name="kraj" value="'.$utrka['kraj_odrzavanja'].'" readonly>';
        ?>
        <hr>
        <label for="novi_naziv">Novi naziv</label>
        <input type="text" id = "novi_naziv" name="novi_naziv" >

        <label for="novi_sudionici">Novi broj sudionika</label>
        <input type="text" id = "novi_sudionici" name="novi_sudionici">

        <label for="nova_drzava">Nova država</label>
        <select name="nova_drzava" id="nova_drzava">
        <?php
                foreach($drzava as $dr){
                    echo "<option value={$dr['drzava_id']}> {$dr['ime']}</option>";
                }
                echo "</select>";
            ?>

        <label for="novi_tip">Novi tip utrke</label>
        <select name="novi_tip" id="novi_tip">
            <?php
                foreach($tip_utrke as $t){
                    echo "<option value={$t['tip_utrke_id']}> {$t['naziv_tipa']}</option>";
                }
                echo "</select>";
            ?>
        <br>
        <label for="nove_prijave">Novi kraj prijava</label>
        <input type="text" id = "nove_prijave" name="nove_prijave">

        <label for="novi_pocetak">Novi pocetak održavanja</label>
        <input type="text" id = "novi_pocetak" name="novi_pocetak">

        <label for="novi_kraj">novi kraj održavanja</label>
        <input type="text" id = "novi_kraj" name="novi_kraj">
        <br>
        <input type="submit" value="Promjeni">
    </form>
</div>
<?php
    $cssValid="";
    $htmlValid="";
    require "php_skripte/podnozje.php";
?>