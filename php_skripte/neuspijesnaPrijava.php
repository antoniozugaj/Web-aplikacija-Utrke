<?php
    require "baza.class.php"; 

    $username = $_POST["korisnicko"];

    $baza = new Baza;

    $baza->spojiDB();
    
    $sql = "SELECT korisnik_id FROM korisnik WHERE username= '$username'";

    $rezultat = $baza->selectDB($sql);

    if($rezultat->num_rows > 0){
        $row = $rezultat->fetch_assoc();
        $id = $row["korisnik_id"];

        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), 'NEUSPIJEŠNA PRIJAVA: $username', $id)";
        $baza->selectDB($sql);
    }

    $baza->zatvoriDB();
?>