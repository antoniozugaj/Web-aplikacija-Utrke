<?php
    session_start();
    require "baza.class.php";

    $kod = $_SESSION["kod"];
    $username = $_SESSION["username_validacija"];
    $vrijeme = $_SESSION["vrijeme_registracije"];

    
    $vrijeme = date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($vrijeme)));
    $sad =date('Y-m-d H:i:s');

    $unos = $_POST["unos"];

    if($sad < $vrijeme){
        if($unos == $kod){
            $baza=new Baza;
            $baza->spojiDB();
            $sql = "UPDATE korisnik SET validiran = 1 WHERE username ='".$username."'";
            $baza->selectDB($sql);

            $sql = "SELECT korisnik_id FROM korisnik WHERE username= '$username'";
            $rezultat = $baza->selectDB($sql);
            if($rezultat->num_rows > 0){
                $row = $rezultat->fetch_assoc();
                $id = $row["korisnik_id"];
                $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), 'VALIDIRAN KORISNIK: $username', $id)";
                $baza->selectDB($sql);
            }

            $baza->zatvoriDB();

            session_unset();
            session_destroy();

            header("Location: ../prijava.php");
        }else{
            header("Location: ../validacija.php");  
        }
     }else{
        header("Location: ../validacija.php"); 
     }
    
?>
