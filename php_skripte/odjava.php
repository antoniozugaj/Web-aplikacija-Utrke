<?php

    require "baza.class.php";

    session_start();

    $username = $_SESSION["username"];

    session_unset();
    session_destroy();

    $baza = new Baza;
    $baza->spojiDB();

    $sql = "SELECT korisnik_id FROM korisnik WHERE username= '$username'";
    $rezultat = $baza->selectDB($sql);
    if($rezultat->num_rows > 0){
        $row = $rezultat->fetch_assoc();
        $id = $row["korisnik_id"];
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), 'ODJAVA KORISNIKA: $username', $id)";
        $baza->selectDB($sql);
    }
    $baza->zatvoriDB();

    header("Location: ../index.php");
?>