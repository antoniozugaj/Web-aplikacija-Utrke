<?php
    $ogranicenje = 1;
    $title="Uređivanje prijave";
    $description="Stranica za uređivanje odabrane utrke.";
    require "php_skripte/zaglavlje.php";

    $utrka_id = $_GET["utrka"];
    $korisnik_id=$_GET["korisnik"];

    require "php_skripte/baza.class.php"; 

    $baza = new Baza;

    $baza->spojiDB();

    $sql = "SELECT * FROM utrka WHERE utrka_id = $utrka_id";
    $rezultat = $baza->selectDB($sql);
    $utrka = $rezultat->fetch_assoc();

    $sql = "SELECT * FROM prijava WHERE utrka_id = $utrka_id AND korisnik_id=$korisnik_id";
    $rezultat = $baza->selectDB($sql);
    $prijava = $rezultat->fetch_assoc();

    $etape=[];
    $sql = "SELECT * FROM sudjelovanje JOIN etapa ON etapa.etapa_id=sudjelovanje.etapa_id WHERE utrka_id = $utrka_id AND korisnik_id=$korisnik_id";
    $rezultat = $baza->selectDB($sql);
    while($row = $rezultat->fetch_assoc()){
        $row['vrijeme_pocetka']= date("d.m.Y H:i:s", strtotime($row['vrijeme_pocetka']));
        $etape[] = $row;
    }    

    $sql = "SELECT * FROM utrka WHERE utrka_id = $utrka_id AND vrijeme_zavrsetka_prijava > NOW()";
    $vrijeme = $baza->selectDB($sql);

    $baza->zatvoriDB();

?>
<script src="js/prijavaZaUtrku.js"></script>
<div> 
    <?php
    echo "<h1>{$utrka['naziv']}</h1>";
    ?>
</div>
<?php
    if(mysqli_num_rows($vrijeme) > 0){
?>
<div>
    <h3>Ažuriranje podataka</h3>
    <form id="prijava_obrazac" action="php_skripte/prijavaUpload.php" method="post" enctype="multipart/form-data">
        <?php
        echo '<label for="stara_godina">Stara godina rođenja</label>
        <input type="text" id = "stara_godina" name="stara_godina" value='.$prijava["godina_rodenja"].' readonly>';
        echo ' <label for="stara_slika">Stara slika</label><img src="'.$prijava["slika"].'" id=stara_slika alt="Slika prijave" width="100" height="100"> ';
        echo "<input type='hidden' name='utrka' value=$utrka_id>";
        echo "<input type='hidden' name='azuriraj' value=1>";
        ?>
        <br>
        <label for="godina" id="labela_godina">Godina rođenja</label>
        <input type="text" id = "godina" name="godina">

        <label for="slika" id="labela_slika">Slika</label>
        <input type="file" id = "slika" name="slika">
        <br>

        <input type="submit" value="Promjeni">
    </form>
</div>
<?php
    }
?>
<div>
    <h3> Promjena dolazaka</h3>
    <table>
        <tr><th>Grad</th><th>Adresa</th><th>Vrijeme početka</th><th>Duljina</th><th>Dolazak</th><th>Promjeni</th></tr>
        <?php
            foreach($etape as $etapa){
                if($etapa["sudjelovanje"] == 1){
                    echo "<tr><td>{$etapa["grad"]}</td><td>{$etapa["adresa_pocetka"]}</td><td>{$etapa["vrijeme_pocetka"]}</td><td>{$etapa["duljina"]}</td><td>Dolazim</td><td><a href='php_skripte/promjeniDolazak.php?etapa={$etapa["etapa_id"]}&korisnik={$etapa["korisnik_id"]}&u=0&utrka={$utrka["utrka_id"]}'>OTKAŽI DOLAZAK</a></td></tr>";
                }else{
                    echo "<tr><td>{$etapa["grad"]}</td><td>{$etapa["adresa_pocetka"]}</td><td>{$etapa["vrijeme_pocetka"]}</td><td>{$etapa["duljina"]}</td><td>Ne dolazim</td><td><a href='php_skripte/promjeniDolazak.php?etapa={$etapa["etapa_id"]}&korisnik={$etapa["korisnik_id"]}&u=1&utrka={$utrka["utrka_id"]}'>NAJAVI DOLAZAK</a></td></tr>";
                }
            }
            
        ?>
    </table>
</div>
<?php
    $cssValid="";
    $htmlValid="";
    require "php_skripte/podnozje.php";
?>