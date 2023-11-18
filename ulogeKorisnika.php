<?php
    $ogranicenje = 3;
    $title="Uloge korisnikai";
    $description="Stranica za zakljucavanje/otkljucavanje korisnika.";
    require "php_skripte/zaglavlje.php";
    require "php_skripte/baza.class.php";
?>

<div>
    <h2>Registrirani korisnici</h2>
    <table>
        <tr><th>Ime i Prezime</th><th>Username</th><th>Postavi kao moderator</th><th>Postavi kao administrator</th></tr>
        <?php
            $baza = new Baza;

            $baza->spojiDB();
            $sql = "SELECT * FROM korisnik WHERE tip_korisnika = 1";
            $rezultat = $baza->selectDB($sql);
            $baza->zatvoriDB();
        
            if($rezultat->num_rows > 0){
                while($row = $rezultat->fetch_assoc()){
                    echo "<tr><td>{$row["ime_prezime"]}</td><td>{$row["username"]}</td>";
                    echo "<td><a href=php_skripte/promjeniUlogu.php?id={$row['korisnik_id']}&iz=1&u=2&username={$row['username']}>Postavi u moderatora</td>";
                    echo "<td><a href=php_skripte/promjeniUlogu.php?id={$row['korisnik_id']}&iz=1&u=3&username={$row['username']}>Postavi u administratora</td></tr>";
                }
            }
        ?>
    </table>
</div>
<div>
    <h2>Moderatori</h2>
    <table>
        <tr><th>Ime i Prezime</th><th>Username</th><th>Postavi kao registrirani korinik</th><th>Postavi kao administrator</th></tr>
        <?php
            $baza = new Baza;

            $baza->spojiDB();
            $sql = "SELECT * FROM korisnik WHERE tip_korisnika = 2";
            $rezultat = $baza->selectDB($sql);
            $baza->zatvoriDB();
        
            if($rezultat->num_rows > 0){
                while($row = $rezultat->fetch_assoc()){
                    echo "<tr><td>{$row["ime_prezime"]}</td><td>{$row["username"]}</td>";
                    echo "<td><a href=php_skripte/promjeniUlogu.php?id={$row['korisnik_id']}&iz=2&u=1&username={$row['username']}>Postavi u korisnika</td>";
                    echo "<td><a href=php_skripte/promjeniUlogu.php?id={$row['korisnik_id']}&iz=2&u=3&username={$row['username']}>Postavi u administratora</td></tr>";
                }
            }
        ?>
    </table>
</div>

<div>
    <h2>Administratori</h2>
    <table>
        <tr><th>Ime i Prezime</th><th>Username</th><th>Postavi kao registrirani korinik</th><th>Postavi kao moderator</th></tr>
        <?php
            $baza = new Baza;

            $baza->spojiDB();
            $sql = "SELECT * FROM korisnik WHERE tip_korisnika = 3";
            $rezultat = $baza->selectDB($sql);
            $baza->zatvoriDB();
        
            if($rezultat->num_rows > 0){
                while($row = $rezultat->fetch_assoc()){
                    echo "<tr><td>{$row["ime_prezime"]}</td><td>{$row["username"]}</td>";
                    echo "<td><a href=php_skripte/promjeniUlogu.php?id={$row['korisnik_id']}&iz=3&u=1&username={$row['username']}>Postavi u korisnika</td>";
                    echo "<td><a href=php_skripte/promjeniUlogu.php?id={$row['korisnik_id']}&iz=3&u=2&username={$row['username']}>Postavi u moderatora</td></tr>";
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