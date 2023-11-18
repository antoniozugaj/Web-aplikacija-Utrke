<?php
    session_start();
    require "baza.class.php";
    $ogranicenje=3;
    if(isset($_SESSION["tip_korisnika"])){
        if($_SESSION["tip_korisnika"] < $ogranicenje){
            header("Location: ../index.php");
        }
    }elseif($ogranicenje != 0){
        header("Location: ../index.php");
    }

    $id=$_GET["korisnik"];

    $baza=new Baza;
    $baza->spojiDB();
    $sql = "UPDATE korisnik SET blokiran = 1 WHERE korisnik_id = $id";
    $baza->selectDB($sql);

    $sql = "SELECT username FROM korisnik WHERE korisnik_id= $id";
    $rezultat = $baza->selectDB($sql);
    if($rezultat->num_rows > 0){
        $row = $rezultat->fetch_assoc();
        $username = $row["username"];
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), 'BLOKIRAN KORISNIK: $username', $id)";
        $baza->selectDB($sql);
    }

    $baza->zatvoriDB();
    header("Location: ../blokiraniKorisnici.php");
?>