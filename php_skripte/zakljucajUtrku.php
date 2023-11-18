<?php
    require "baza.class.php"; 
    session_start();
    $baza = new Baza;

    $id=$_POST["utrka"];
    $opcija=(int)$_POST["opcija"];

    $baza->spojiDB();

    if($opcija == 0){

        $sql = "UPDATE utrka SET zakljucana = 0 WHERE utrka_id = $id";
        $rezultat = $baza->selectDB($sql);

        $sql = "SELECT korisnik_id FROM korisnik WHERE username= '{$_SESSION["username"]}'";
        $rezultat = $baza->selectDB($sql);

        if($rezultat->num_rows > 0){
            $row = $rezultat->fetch_assoc();
            $user_id = $row["korisnik_id"];
            $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} OTKLJUČANA UTRKA: $id', $user_id)";
            $baza->selectDB($sql);
        }
        $baza->zatvoriDB();
        echo 0;
    }else{
        $sql = "SELECT * FROM etapa WHERE utrka_id = $id AND zakljucana = 0";
        $rezultat = $baza->selectDB($sql);

        if(mysqli_num_rows($rezultat) > 0 ){
            $baza->zatvoriDB();
            echo 5;
        }else{
            $sql = "UPDATE utrka SET zakljucana = 1 WHERE utrka_id = $id";
            $rezultat = $baza->selectDB($sql);
            $sql = "SELECT korisnik_id FROM korisnik WHERE username= '{$_SESSION["username"]}'";
            $rezultat = $baza->selectDB($sql);
            if($rezultat->num_rows > 0){
                $row = $rezultat->fetch_assoc();
                $user_id = $row["korisnik_id"];
                $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} ZAKLJUČANA UTRKA: $id', $user_id)";
                $baza->selectDB($sql);
            }

            $sql = "SELECT * FROM prijava WHERE utrka_id = $id ORDER BY ukupni_bodovi DESC";
            $rezultat = $baza->selectDB($sql);
            $pozicije=[];
            while($row = $rezultat->fetch_assoc()){
                $pozicije[]=$row;
            }

            $redniBroj =  1;

            for($i = 0; $i < count($pozicije); $i++){
                $sql = "UPDATE prijava SET pozicija = $redniBroj WHERE utrka_id = $id AND korisnik_id = {$pozicije[$i]["korisnik_id"]}";
                $rezultat = $baza->selectDB($sql);

                if($i < count($pozicije)-1){
                    if($pozicije[$i]["ukupni_bodovi"] != $pozicije[$i+1]["ukupni_bodovi"]){
                        $redniBroj++;
                    }
                }       
            }
            $baza->zatvoriDB();
            echo 1;
        }

    }
    
?>