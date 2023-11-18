<?php
    $ogranicenje = 1;
    $title="Uloge korisnikai";
    $description="Stranica za zakljucavanje/otkljucavanje korisnika.";
    require "zaglavlje.php";
    require "baza.class.php"; 

    $etapa = $_GET["etapa"];
    $korisnik = $_GET["korisnik"];
    $utrka= $_GET["utrka"];
    $u = $_GET["u"];

    $baza = new Baza;
    $baza->spojiDB();


    $sql = "UPDATE sudjelovanje SET sudjelovanje = $u WHERE korisnik_id = $korisnik AND etapa_id=$etapa";
    $baza->selectDB($sql);

    $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '$username AŽURIRANO SUDJELOVANJE: $etapa', $id)";
    $baza->selectDB($sql);

    $baza->zatvoriDB();
    header("Location: ../urediPrijavu.php?utrka=$utrka&korisnik=$korisnik");
?>