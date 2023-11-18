<?php
    require "baza.class.php"; 

    $drzava = $_POST["drzava"];
    $sortiranje = $_POST["sortiranje"];

    $baza = new Baza;
    $baza->spojiDB();


    if($drzava == ""){
        $sql = "SELECT * FROM korisnik JOIN prijava ON korisnik.korisnik_id = prijava.korisnik_id JOIN utrka ON utrka.utrka_id = prijava.utrka_id WHERE prijava.pozicija < 4 AND prijava.pozicija > 0 ";
    }else{
        $sql = "SELECT * FROM korisnik JOIN prijava ON korisnik.korisnik_id = prijava.korisnik_id JOIN utrka ON utrka.utrka_id = prijava.utrka_id WHERE utrka.drzava_id = $drzava AND prijava.pozicija < 4 AND prijava.pozicija > 0";
    }
    
    if($sortiranje =="ime_uzlazno"){
        $sql .= "ORDER BY korisnik.ime_prezime ASC";
    }elseif($sortiranje =="ime_silazno"){
        $sql .= "ORDER BY korisnik.ime_prezime DESC";
    }

    $rezultat = $baza->selectDB($sql);
    $baza->zatvoriDB();

    $podatak=[];
    if($rezultat->num_rows > 0){
        while( $row = $rezultat->fetch_assoc()){
            $ime = explode(" ",$row["ime_prezime"]);
            $podatak[]= array("ime" => "{$ime[0]}","prezime" => "{$ime[1]}","username" => "{$row["username"]}","utrka" => "{$row["naziv"]}","pozicija" => "{$row["pozicija"]}","slika"=>"{$row["slika"]}");
        }
    }

    if($sortiranje =="prezime_uzlazno"){
        $stupac = array_column($podatak, 'prezime');
        array_multisort($stupac, SORT_ASC, $podatak);  
    }elseif($sortiranje =="prezime_silazno"){
        $stupac = array_column($podatak, 'prezime');
        array_multisort($stupac, SORT_DESC, $podatak);
    }
    
    header("Content-Type: application/json");

    echo json_encode($podatak);
?>