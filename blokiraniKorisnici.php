<?php
    $ogranicenje = 3;
    $title="Blokirani korisnici";
    $description="Stranica za zakljucavanje/otkljucavanje korisnika.";
    require "php_skripte/zaglavlje.php";
    require "php_skripte/baza.class.php";
?>


<div>
    <h2>Lista blokiranih korisnika</h2>
    <table id="otkljucani">
        <tr><th>Ime i Prezime</th><th>Username</th><th>Otključaj</th></tr>
        <?php
            $baza = new Baza;

            $baza->spojiDB();
            $sql = "SELECT * FROM korisnik WHERE blokiran = 1";
            $rezultat = $baza->selectDB($sql);
            $baza->zatvoriDB();
        
            if($rezultat->num_rows > 0){
                while($row = $rezultat->fetch_assoc()){
                    echo "<tr><td>{$row["ime_prezime"]}</td><td>{$row["username"]}</td>";
                    echo "<td><form method=get action=php_skripte/rucnoOtkljucaj.php> <input type=hidden name=korisnik value={$row["korisnik_id"]}> <input type=submit value=Otključaj> </form></td></tr>";
                }
            }
        ?>
    </table>
</div>
<div>
    <h2>Lista otkljucanih Korisnika</h2>
    <table id="blokirani">
    <tr><th>Ime i Prezime</th><th>Username</th><th>zaključaj</th></tr>
    <?php
            $baza = new Baza;

            $baza->spojiDB();
            $sql = "SELECT * FROM korisnik WHERE blokiran = 0";
            $rezultat = $baza->selectDB($sql);
            $baza->zatvoriDB();
        
            if($rezultat->num_rows > 0){
                while($row = $rezultat->fetch_assoc()){
                    echo "<tr><td>{$row["ime_prezime"]}</td><td>{$row["username"]}</td>";
                    echo "<td><form method=get action=php_skripte/rucnoBlokiraj.php> <input type=hidden name=korisnik value={$row["korisnik_id"]}> <input type=submit value=Blokiraj> </form></td></tr>";
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