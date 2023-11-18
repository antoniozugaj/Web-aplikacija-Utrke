<?php
    require "baza.class.php"; 

    $username = $_POST["korisnicko"];

    $baza = new Baza;

    $baza->spojiDB();
    $sql = "UPDATE korisnik SET blokiran = 1 WHERE username = '$username'";
    $rezultat = $baza->selectDB($sql);

    $sql = "SELECT korisnik_id FROM korisnik WHERE username= '$username'";

    $rezultat = $baza->selectDB($sql);

    if($rezultat->num_rows > 0){
        $row = $rezultat->fetch_assoc();
        $id = $row["korisnik_id"];

        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), 'BLOKIRAN KORISNIK:$username', $id)";
        $baza->selectDB($sql);
    }

    $baza->zatvoriDB();
?>