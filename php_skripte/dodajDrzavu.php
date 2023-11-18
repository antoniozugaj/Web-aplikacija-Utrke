<?php
    require "baza.class.php"; 
    session_start();
    $baza = new Baza;

    $baza->spojiDB();
    $sql = "INSERT INTO drzava (ime, kontinent, broj_dosadasnjih_utrka) VALUE ('{$_POST['ime']}', '{$_POST['kontinent']}',{$_POST['brojUtrka']})";
    $rezultat = $baza->selectDB($sql);

    $sql = "SELECT korisnik_id FROM korisnik WHERE username= '{$_SESSION["username"]}'";
    $rezultat = $baza->selectDB($sql);
    if($rezultat->num_rows > 0){
        $row = $rezultat->fetch_assoc();
        $user_id = $row["korisnik_id"];
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} KREIRANJE DRZAVE: {$_POST['ime']}', $user_id)";
        $baza->selectDB($sql);
    }
    $baza->zatvoriDB();

?>