<?php
    $ogranicenje = 1;
    $title="Početna stranica";
    $description="pocetna stranica. kreirana 22.5.2022.";
    require "php_skripte/zaglavlje.php";
    require "php_skripte/baza.class.php";

    $baza = new Baza;
    $baza->spojiDB();

    $zavrseneUtrke=[];
    $sql = "SELECT * FROM korisnik JOIN prijava ON korisnik.korisnik_id = prijava.korisnik_id JOIN utrka ON utrka.utrka_id=prijava.utrka_id WHERE username='{$_SESSION["username"]}' AND utrka.zakljucana=1";
    $rezultat = $baza->selectDB($sql);
    while($row = $rezultat->fetch_assoc()){
        $row['kraj_odrzavanja']= date("d.m.Y H:i:s", strtotime($row['kraj_odrzavanja']));
        $zavrseneUtrke[] =$row;
    }
            

    $prijavljeneUtrke=[];
    $sql = "SELECT * FROM korisnik JOIN prijava ON korisnik.korisnik_id = prijava.korisnik_id JOIN utrka ON utrka.utrka_id=prijava.utrka_id WHERE username='{$_SESSION["username"]}' AND utrka.zakljucana=0";
    $rezultat = $baza->selectDB($sql);
    while($row = $rezultat->fetch_assoc()){
        $row['vrijeme_zavrsetka_prijava']= date("d.m.Y H:i:s", strtotime($row['vrijeme_zavrsetka_prijava']));
        $row['pocetak_odrzavanja']= date("d.m.Y H:i:s", strtotime($row['pocetak_odrzavanja']));
        $prijavljeneUtrke[] =$row;
    }
            

    $baza->zatvoriDB();

?>
<div>
    <h2>Završene utrke</h2>
    <table>
        <tr><th>Naziv utrke</th><th>Vrijeme kraja utrke</th><th>Završna pozicija</th><th>Ukupni bodovi</th><th>Detalji</th></tr>
        <?php
            foreach($zavrseneUtrke as $utrke){
                echo "<tr><td>{$utrke["naziv"]}</td><td>{$utrke["kraj_odrzavanja"]}</td><td>{$utrke["pozicija"]}</td><td>{$utrke["ukupni_bodovi"]}</td><td><a href='detaljiUtrke.php?utrka={$utrke["utrka_id"]}&korisnik={$utrke["korisnik_id"]}'>OTVORI</a></td></tr>";
            }
        ?>
    </table>
</div>
<div>
    <h2>Prijavljene utrke</h2>
    <table>
        <tr><th>Naziv utrke</th><th>Kraj prijavama</th><th>Vrijeme početka</th><th>Promjeni</th></tr>
        
        <?php
            foreach($prijavljeneUtrke as $utrke){
                echo "<tr><td>{$utrke["naziv"]}</td><td>{$utrke["vrijeme_zavrsetka_prijava"]}</td><td>{$utrke["pocetak_odrzavanja"]}</td><td><a href='urediPrijavu.php?utrka={$utrke["utrka_id"]}&korisnik={$utrke["korisnik_id"]}'>PROMJENI</a></td></tr>";
            }
        ?>
    </table>
</div>
<?php
    $cssValid="";
    $htmlValid="";
    require "php_skripte/podnozje.php";
?>