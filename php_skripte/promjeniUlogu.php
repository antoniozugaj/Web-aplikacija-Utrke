<?php
    $ogranicenje = 3;
    $title="Uloge korisnikai";
    $description="Stranica za zakljucavanje/otkljucavanje korisnika.";
    require "zaglavlje.php";
    require "baza.class.php"; 

    $id = $_GET["id"];
    $iz = $_GET["iz"];
    $u = $_GET["u"];
    $username = $_GET["username"];

    $baza = new Baza;
    $baza->spojiDB();

    if($iz != 2){
        $sql = "UPDATE korisnik SET tip_korisnika = $u WHERE korisnik_id = $id";
        $baza->selectDB($sql);
    }else{
        $sql = "UPDATE korisnik SET tip_korisnika = $u WHERE korisnik_id = $id";
        $baza->selectDB($sql);
        $sql = "DELETE FROM moderiranje WHERE korisnik_id=$id";
        $baza->selectDB($sql);
    }

    if($u == 1){
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '$username POSTAVLJEN ZA KORISNIKA (OD {$_SESSION['username']})', $id)";
        $baza->selectDB($sql);
    }elseif($u == 2){
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '$username POSTAVLJEN ZA MODERATORA (OD {$_SESSION['username']})', $id)";
        $baza->selectDB($sql);
    }else{
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '$username POSTAVLJEN ZA ADMINISTRATORA (OD {$_SESSION['username']})', $id)";
        $baza->selectDB($sql);
    }

    $baza->zatvoriDB();
    header("Location: ../ulogeKorisnika.php");
?>