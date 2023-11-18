<?php
    include "baza.class.php";

    $baza = new Baza;

    $baza->spojiDB();

    $upit="select ime_prezime from korisnik where username = '".$_GET["korisnickoime"]."'";

    $rezultat=$baza->selectDB($upit);

    $baza->zatvoriDB();

    if(mysqli_num_rows($rezultat) == 0){
        $podatak = array("pronaden" => "0");
    }else{
        $podatak = array("pronaden" => "1");
    }

    header("Content-Type: application/json");

    echo json_encode($podatak);
?>