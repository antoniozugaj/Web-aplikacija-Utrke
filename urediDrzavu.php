<?php
    $ogranicenje = 3;
    $title="Uređivanje države";
    $description="Stranica za uređivanje odabrane država.";
    require "php_skripte/zaglavlje.php";

    $id = $_GET["id"];

    require "php_skripte/baza.class.php"; 

    $baza = new Baza;

    $baza->spojiDB();

    $sql = "SELECT * FROM drzava WHERE drzava_id = $id";
    $rezultat = $baza->selectDB($sql);
    $drzava = $rezultat->fetch_assoc();

    $sql = "SELECT * FROM korisnik WHERE tip_korisnika = 2";
    $rezultat = $baza->selectDB($sql);
    $moderatori=[];
    while($row = $rezultat->fetch_assoc())
            $moderatori[] = array("korisnik_id" => "{$row['korisnik_id']}","username"=>"{$row['username']}","ime_prezime"=>"{$row['ime_prezime']}");

    $sql="SELECT * FROM moderiranje JOIN korisnik ON moderiranje.korisnik_id = korisnik.korisnik_id WHERE drzava_id = $id";
    $rezultat = $baza->selectDB($sql);
    $zaduzeni=[];
    while($row = $rezultat->fetch_assoc())
            $zaduzeni[] = array("korisnik_id" => "{$row['korisnik_id']}","username"=>"{$row['username']}","ime_prezime"=>"{$row['ime_prezime']}");

    $baza->zatvoriDB();
   
?>
<div> 
    <?php
    echo "<h1>{$drzava['ime']}</h1><br><h2>{$drzava['kontinent']}</h2>";
    ?>
</div>
<div>
    <h3>Ažuriranje podataka</h3>
    <form method="get" action="php_skripte/azurirajDrzavu.php">
        <?php
        echo '<input type=hidden name=drzava_id value='.$drzava['drzava_id'].'>
        <label for="ime">Ime</label>
        <input type="text" id = "ime" name="ime" value="'.$drzava['ime'].'" readonly>

        <label for="kontinent">Kontinent</label>
        <input type="text" id = "kontinent" name="kontinent" value="'.$drzava['kontinent'].'" readonly>

        <label for="broj">Broj održanih utrka</label>
        <input type="text" id = "broj" name="broj" value="'.$drzava['broj_dosadasnjih_utrka'].'" readonly>';
        ?>
        <br>
        <hr>
        <label for="novo_ime">Nova vrijednost: Ime</label>
        <input type="text" id = "novo_ime" name="novo_ime">
        <label for="novi_kontinent">Nova vrijednost: Kontinent</label>
        <input type="text" id = "novi_kontinent" name="novi_kontinent">
        <label for="novi_broj">Nova vrijednost: Broj održanih utrka</label>
        <input type="text" id = "novi_broj" name="novi_broj">
        <br>
        <input type="submit" value="Promjeni">
    </form>
</div>
<div>
    <h3>Ažuriranje moderatora</h3>
    <table>
        <tr><th>Moderatori za državu</th><th>Ukloni moderatora</th></tr>
        <?php
            foreach($zaduzeni as $mod){
                echo "<tr> <td>{$mod['username']} ({$mod['ime_prezime']})</td>";
                echo "<td> <a href=php_skripte/azurirajModeratoraDrzave.php?zadatak=ukloni&drzava={$drzava['drzava_id']}&korisnik={$mod['korisnik_id']}>Ukloni</a> </td></tr>";
            }
        ?>
    </table>
</div>
<div>
    <h3>Dodavanje moderatora</h3>
    <form method="get" action="php_skripte/azurirajModeratoraDrzave.php">
        <select name="korisnik">
            <?php
                foreach($moderatori as $mod){
                    echo "<option value={$mod['korisnik_id']}> {$mod['username']} ({$mod['ime_prezime']})</option>";
                }
                echo "</select>";
                echo "<input type=hidden name=drzava value={$drzava['drzava_id']}>";
            ?>
        <input type="submit" value="Dodaj">
    </form>
</div>
<?php
    $cssValid="";
    $htmlValid="";
    require "php_skripte/podnozje.php";
?>