<?php
    $ogranicenje = 1;
    $title="Lista otvorenih utrka";
    $description="Stranica s listom otvorenih utrka.";
    require "php_skripte/zaglavlje.php";
    require "php_skripte/baza.class.php";
?>


<div>
    <h2>Lista otvorenih utrka</h2>
    <table id="otkljucani">
        <tr><th>Država</th><th>Ime utrke</th><th>Rok prijave</th><th>Broj slobodnih mjesta</th><th>Prijavi se na utrku</th></tr>
        <?php
            $baza = new Baza;

            $baza->spojiDB();
            $sql = "SELECT * FROM utrka JOIN drzava ON drzava.drzava_id = utrka.drzava_id WHERE utrka.broj_sudionika > utrka.broj_prijava AND utrka.vrijeme_zavrsetka_prijava > NOW()";
            $rezultat = $baza->selectDB($sql);
            $baza->zatvoriDB();
        
            if($rezultat->num_rows > 0){
                while($row = $rezultat->fetch_assoc()){
                    $slobodnihMjesta = $row["broj_sudionika"] - $row["broj_prijava"];
                    $row['vrijeme_zavrsetka_prijava']= date("d.m.Y H:i:s", strtotime($row['vrijeme_zavrsetka_prijava']));
                    echo "<tr><td>{$row["ime"]}</td><td>{$row["naziv"]}</td><td>{$row["vrijeme_zavrsetka_prijava"]}</td><td>$slobodnihMjesta</td>";
                    echo "<td><a href='formaZaPrijavuUtrke.php?utrka={$row["utrka_id"]}'>PRIJAVI</a></td></tr>";
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