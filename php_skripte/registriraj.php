<?php

    require "baza.class.php";

    $imePrezime = $_POST["imeprezime"];
    $email = $_POST["email"];
    $username = $_POST["korisnickoime"];
    $password = $_POST["lozinka"];
    $ponovljena = $_POST["ponlozinka"];

    $greska = false;

    $reg = "/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/";
    if(!preg_match($reg,$email))
        $greska = true;
    if($email == "")
        $greska = true;
    
    if(strlen($password) < 8)
        $greska = true;
    if($password == "")
        $greska = true;
    if(strlen($password) > 20)
        $greska = true;
    if(!preg_match("/\d/",$password))
        $greska = true;
    if(strtoupper($password) == $password)
        $greska = true;
    if(strtolower($password) == $password)
        $greska = true;

    if($password !== $ponovljena)
        $greska = true;
    if($ponovljena == "")
        $greska = true;

    if($imePrezime == "")
        $greska = true;
    if(strlen($imePrezime) > 40)
        $greska = true;

    if($username == "")
        $greska = true;
    if(strlen($username) > 20)
        $greska = true;
    

    if($greska){
        header("Location: ../registracija.php");
    }else{
        $imePrezime = htmlspecialchars($imePrezime);
        $email = htmlspecialchars($email);
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $hash = hash('sha256',$password);
        $datum = date('Y-m-d H:i:s');
        $kod="";

        $pool = '0123456789abcdefghijklmnopqrstuvwxyz';
        for ($i = 0; $i < 6; $i++) {
            $kod .= $pool[ rand(0, strlen($pool) - 1) ];
        }

     
        $sql = "INSERT INTO korisnik (ime_prezime,username,lozinka,SHA256_lozinka,blokiran,uvjeti_koristenja,email,datum_registracije,aktivacijski_kod, tip_korisnika,validiran) VALUES ('$imePrezime','$username','$password','$hash',0,1,'$email','$datum','$kod',1,0)";
        $baza = new Baza;
        $baza->spojiDB();
        $baza->selectDB($sql);

        $sql = "SELECT korisnik_id FROM korisnik WHERE username= '$username'";
        $rezultat = $baza->selectDB($sql);
        if($rezultat->num_rows > 0){
            $row = $rezultat->fetch_assoc();
            $id = $row["korisnik_id"];
            $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), 'REGISTRIRAN KORISNIK: $username', $id)";
            $baza->selectDB($sql);
        }

        $baza->zatvoriDB();

        $poruka = "Kod za verifikaciju:\n".$kod."\n\nKOD ZA VALIDACIJU TRAJE SAMO 7h!";
        mail($email,"TRCANJE validacija računa",$poruka);
        session_start();
        $_SESSION["username_validacija"] = $username;
        $_SESSION["kod"] = $kod;
        $_SESSION["vrijeme_registracije"] = $datum;

        header("location: ../validacija.php");
    }
    
    
?>