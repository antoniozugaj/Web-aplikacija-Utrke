<?php
    require "baza.class.php"; 

    $baza = new Baza;

    $baza->spojiDB();
    $sql = "SELECT * FROM drzava";
    $rezultat = $baza->selectDB($sql);
    $baza->zatvoriDB();

    $podatak=[];

    if($rezultat->num_rows > 0){
        while($row = $rezultat->fetch_assoc())
            $podatak[] = array("drzava_id" => "{$row['drzava_id']}","ime"=>"{$row['ime']}","kontinent"=>"{$row['kontinent']}","broj_dosadasnjih_utrka"=>"{$row['broj_dosadasnjih_utrka']}","uredi"=>"<a href=urediDrzavu.php?id={$row['drzava_id']}>UREDI</a>");
    }


    header("Content-Type: application/json");

    echo json_encode($podatak);
?>