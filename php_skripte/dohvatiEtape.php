<?php
    require "baza.class.php"; 
    session_start();
    $baza = new Baza;

    $id=$_GET["id"];
    $baza->spojiDB();

    if(isset($_GET["forma"])){
        $sql = "SELECT * FROM etapa WHERE etapa_id = $id";
        $rezultat = $baza->selectDB($sql);
        $baza->zatvoriDB();
        $row = $rezultat->fetch_assoc();
        $row['vrijeme_pocetka']= date("d.m.Y. H:i:s", strtotime($row['vrijeme_pocetka']));
        $row['vrijeme_kraja']= date("d.m.Y. H:i:s", strtotime($row['vrijeme_kraja']));
        $podatak=array("grad" => "{$row["grad"]}","adresa" => "{$row["adresa_pocetka"]}","duljina" => "{$row["duljina"]}","pocetak" => "{$row["vrijeme_pocetka"]}","kraj" => "{$row["vrijeme_kraja"]}");

        header("Content-Type: application/json");
        echo json_encode($podatak);

    }else{
        $sql = "SELECT * FROM etapa WHERE utrka_id = $id";
        $rezultat = $baza->selectDB($sql);
        $baza->zatvoriDB();

        $podatak=[];

        if($rezultat->num_rows > 0){
            while($row = $rezultat->fetch_assoc()){
                $row['vrijeme_pocetka']= date("d.m.Y. H:i:s", strtotime($row['vrijeme_pocetka']));
                $row['vrijeme_kraja']= date("d.m.Y. H:i:s", strtotime($row['vrijeme_kraja']));
                if($row['zakljucana']==1){
                    $podatak[] = array("etapa_id" => "{$row['etapa_id']}","grad"=>"{$row['grad']}","adresa"=>"{$row['adresa_pocetka']}","duljina"=>"{$row['duljina']}","zakljucana"=>"{$row['zakljucana']}","pocetak"=>"{$row['vrijeme_pocetka']}","kraj"=>"{$row['vrijeme_kraja']}","uredi"=>"ZAKLJUČANA ETAPA");
                }else{
                    $podatak[] = array("etapa_id" => "{$row['etapa_id']}","grad"=>"{$row['grad']}","adresa"=>"{$row['adresa_pocetka']}","duljina"=>"{$row['duljina']}","zakljucana"=>"{$row['zakljucana']}","pocetak"=>"{$row['vrijeme_pocetka']}","kraj"=>"{$row['vrijeme_kraja']}","uredi"=>"<a href=urediEtapu.php?id={$row['etapa_id']}&opcija={$row['zakljucana']}>UREDI</a>");
                }
            }
                
        }

        header("Content-Type: application/json");

        echo json_encode($podatak);

    }

    
?>