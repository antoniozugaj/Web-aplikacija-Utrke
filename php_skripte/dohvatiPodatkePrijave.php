<?php
    require "baza.class.php"; 

    $username = $_GET["username"];

    $baza = new Baza;

    $baza->spojiDB();
    $sql = "SELECT * FROM korisnik WHERE username = '$username'";
    $rezultat = $baza->selectDB($sql);
    $baza->zatvoriDB();

    if($rezultat->num_rows > 0){
        $row = $rezultat->fetch_assoc();
        $podatak = array("username" => "{$row['username']}","lozinka"=>"{$row['lozinka']}","blokiran"=>"{$row['blokiran']}","uvjeti_koristenja"=>"{$row['uvjeti_koristenja']}","tip_korisnika"=>"{$row['tip_korisnika']}","validiran"=>"{$row['validiran']}","datum"=>"{$row['datum_registracije']}");
    }else{
        $podatak = array("username" => "null","lozinka"=>"null","blokiran"=> "null","uvjeti_koristenja"=>"null","tip_korisnika"=>"null","validiran"=>"null","datum"=>"null");
    }


    header("Content-Type: application/json");

    echo json_encode($podatak);
?>