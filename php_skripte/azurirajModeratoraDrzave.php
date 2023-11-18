<?php
    $ogranicenje = 3;
    $title="Uloge korisnikai";
    $description="Stranica za zakljucavanje/otkljucavanje korisnika.";
    require "zaglavlje.php";
    require "baza.class.php";


    $baza = new Baza;
    $baza->spojiDB();

    $drzava_id = (int)$_GET["drzava"];
    $korisnik_id= (int)$_GET["korisnik"];

    if(isset($_GET["zadatak"]) and $_GET["zadatak"]=="ukloni"){
        $sql = "DELETE FROM moderiranje WHERE korisnik_id = $korisnik_id AND drzava_id = $drzava_id";
        $rezultat = $baza->selectDB($sql);
    }else{
        $sql = "INSERT INTO moderiranje (korisnik_id, drzava_id, datum_postavljanja_moderatora, broj_moderiranih_utrka) VALUE ($korisnik_id, $drzava_id, NOW(), 0)";
        $rezultat = $baza->selectDB($sql);
    }

    $sql = "SELECT korisnik_id FROM korisnik WHERE username= '{$_SESSION["username"]}'";
    $rezultat2 = $baza->selectDB($sql);
    if($rezultat2->num_rows > 0){
        $row = $rezultat2->fetch_assoc();
        $user_id = $row["korisnik_id"];
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} AZURIRANJE MODERATORA ZA DRZAVU: $drzava_id', $user_id)";
        $baza->selectDB($sql);
    }

    $baza->zatvoriDB();
    header("Location: ../urediDrzavu.php?id=$drzava_id");
?>