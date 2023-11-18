<?php
    require "baza.class.php"; 
    session_start();
    $baza = new Baza;

    $id=$_POST["utrka"];
    $opcija=(int)$_POST["opcija"];

    $podaci=$_POST["podaci"]; //0-id 1-pozicija 2-vrijeme

    $baza->spojiDB();

    if($opcija == 0){
        $baza->zatvoriDB();
        echo 0;
    }else{
            $user_id;
            $sql = "UPDATE etapa SET zakljucana = 1 WHERE etapa_id = $id";
            $rezultat = $baza->selectDB($sql);
            $sql = "SELECT korisnik_id FROM korisnik WHERE username= '{$_SESSION["username"]}'";
            $rezultat = $baza->selectDB($sql);
            if($rezultat->num_rows > 0){
                $row = $rezultat->fetch_assoc();
                $user_id = $row["korisnik_id"];
                $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} ZAKLJUČANA ETAPA: $id', $user_id)";
                $baza->selectDB($sql);
            }

            $sql = "SELECT utrka_id FROM etapa WHERE etapa_id=$id";
            $rezultat = $baza->selectDB($sql);
            $row = $rezultat->fetch_assoc();
            $utrka_id = $row["utrka_id"];

            foreach($podaci as $osoba){
                if($osoba[1] != "ODUSTAO/LA"){
                    $sql = "UPDATE sudjelovanje SET pozicija = '{$osoba[1]}', vrijeme = '{$osoba[2]}' WHERE korisnik_id = {$osoba[0]} AND etapa_id = $id";
                    $rezultat = $baza->selectDB($sql);
                    $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} UNESEN REZULTAT ETAPE ZA {$osoba[0]}', $user_id)";
                    $baza->selectDB($sql);
                }

                $pozicija = intval($osoba[1]);
                if($pozicija == 1){
                    $sql = "UPDATE prijava SET ukupni_bodovi = ukupni_bodovi + 100 WHERE korisnik_id = {$osoba[0]} AND utrka_id = $utrka_id";
                    $rezultat = $baza->selectDB($sql);
                }elseif($pozicija == 2){
                    $sql = "UPDATE prijava SET ukupni_bodovi = ukupni_bodovi + 50 WHERE korisnik_id = {$osoba[0]} AND utrka_id = $utrka_id";
                    $rezultat = $baza->selectDB($sql);
                }elseif($pozicija == 3){
                    $sql = "UPDATE prijava SET ukupni_bodovi = ukupni_bodovi + 10 WHERE korisnik_id = {$osoba[0]} AND utrka_id = $utrka_id";
                    $rezultat = $baza->selectDB($sql);
                }

            }

            $baza->zatvoriDB();
            echo 1;
    }
    
?>