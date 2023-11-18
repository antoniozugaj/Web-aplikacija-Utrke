<?php
    require "baza.class.php"; 

    $baza = new Baza;

    $baza->spojiDB();
    $sql = "SELECT * FROM utrka";
    $rezultat = $baza->selectDB($sql);
    $baza->zatvoriDB();

    $podatak=[];

    if($rezultat->num_rows > 0){
        while($row = $rezultat->fetch_assoc()){
			$row['vrijeme_zavrsetka_prijava']= date("d.m.Y H:i:s", strtotime($row['vrijeme_zavrsetka_prijava']));
			$row['pocetak_odrzavanja']= date("d.m.Y H:i:s", strtotime($row['pocetak_odrzavanja']));
			$row['kraj_odrzavanja']= date("d.m.Y H:i:s", strtotime($row['kraj_odrzavanja']));
            $podatak[] = array("utrka_id" => "{$row['utrka_id']}","naziv"=>"{$row['naziv']}","broj_sudionika"=>"{$row['broj_sudionika']}","vrijeme_zavrsetka_prijava"=>"{$row['vrijeme_zavrsetka_prijava']}","pocetak_odrzavanja"=>"{$row['pocetak_odrzavanja']}","kraj_odrzavanja"=>"{$row['kraj_odrzavanja']}","uredi"=>"<a href=urediUtrku.php?id={$row['utrka_id']}>UREDI</a>");
        }
    }

    header("Content-Type: application/json");

    echo json_encode($podatak);
?>