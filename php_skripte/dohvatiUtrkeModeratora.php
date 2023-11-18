<?php
    require "baza.class.php"; 
    session_start();

    $baza = new Baza;
    $baza->spojiDB();

    $drzave=[];
    $sql = "SELECT moderiranje.*, drzava.ime FROM moderiranje JOIN korisnik ON korisnik.korisnik_id=moderiranje.korisnik_id JOIN drzava ON drzava.drzava_id = moderiranje.drzava_id WHERE korisnik.username = '{$_SESSION["username"]}'";
    $rezultat = $baza->selectDB($sql);
    while($row = $rezultat->fetch_assoc()){
        $drzave[] = array("drzava_id" => "{$row['drzava_id']}","ime"=>"{$row['ime']}");
    }
    $podatak;
    foreach($drzave as $drzava){
        $podaci_drzave=[];
        $sql = "SELECT * FROM utrka WHERE drzava_id = {$drzava['drzava_id']}";
        $rezultat = $baza->selectDB($sql);
        while($row = $rezultat->fetch_assoc()){
            $podaci_drzave[] = array("utrka_id" => "{$row['utrka_id']}","naziv"=>"{$row['naziv']}","zakljucana"=>"{$row['zakljucana']}","etape"=>"<a href='etape.php?id={$row['utrka_id']}&opcija={$row['zakljucana']}'>UREDI ETAPE</a>");
        }
        $podatak["{$drzava['ime']}"]=$podaci_drzave;
    }

    $baza->zatvoriDB();

    header("Content-Type: application/json");

    echo json_encode($podatak);
?>