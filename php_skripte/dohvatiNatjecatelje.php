<?php
    require "baza.class.php"; 

    $etapa = $_GET["etapa"];

    $baza = new Baza;
    $baza->spojiDB();

    $sql = "SELECT * FROM sudjelovanje JOIN korisnik ON korisnik.korisnik_id = sudjelovanje.korisnik_id WHERE etapa_id = $etapa";
    $rezultat = $baza->selectDB($sql);

    $baza->zatvoriDB();

    $podatak=[];

    if($rezultat->num_rows > 0){
        while( $row = $rezultat->fetch_assoc()){
            $podatak[]= array("id" => "{$row["korisnik_id"]}","ime" => "{$row["ime_prezime"]}","username" => "{$row["username"]}","sudjelovanje" => "{$row["sudjelovanje"]}");
        }
    }


    header("Content-Type: application/json");

    echo json_encode($podatak);
?>