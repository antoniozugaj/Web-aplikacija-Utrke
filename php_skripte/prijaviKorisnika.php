<?php
    require "baza.class.php";

    $username = $_POST["korisnicko"];
    $uvjeti = $_POST["uvjeti"];
    $tipKorisnika = $_POST["tip"];
    $validiran = $_POST["validiran"];
    $datum = $_POST["datum"];
    
    session_start();

    if($validiran == "0"){
        $_SESSION["username_validacija"]=$username;
        $_SESSION["vrijeme_registracije"]=$datum;
    }else{

        $baza = new Baza;
        $baza->spojiDB();

        $sql = "SELECT korisnik_id FROM korisnik WHERE username= '$username'";
        $rezultat = $baza->selectDB($sql);
        if($rezultat->num_rows > 0){
            $row = $rezultat->fetch_assoc();
            $id = $row["korisnik_id"];
            $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), 'PRIJAVA KORISNIKA: $username', $id)";
            $baza->selectDB($sql);
        }
        $baza->zatvoriDB();

        $_SESSION["username"]=$username;
        $_SESSION["uvjeti"]=$uvjeti;
        $_SESSION["tip_korisnika"]=$tipKorisnika;
    }

?>