<?php
    require "baza.class.php";

    $username = $_POST["korisnicko"];
    $novalozinka;

    do{
        $greska = false;
        $novalozinka="";
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ';
        for ($i = 0; $i < 8; $i++) {
                $novalozinka .= $pool[ rand(0, strlen($pool) - 1) ];
        }

        if(!preg_match("/\d/",$novalozinka))
            $greska = true;
        if(strtoupper($novalozinka) == $novalozinka)
            $greska = true;
        if(strtolower($novalozinka) == $novalozinka)
            $greska = true;

    }while($greska);
    
    $baza = new Baza;

    $baza->spojiDB();
    $sql = "UPDATE korisnik SET lozinka = '$novalozinka' WHERE username = '$username'";
    $baza->selectDB($sql);
    $sql = "SELECT email FROM korisnik WHERE username = '$username'";
    $rezultat = $baza->selectDB($sql);

    $email="";
    if($rezultat->num_rows > 0){
        $row = $rezultat->fetch_assoc();
        $email = $row["email"];
    }

    $sql = "SELECT korisnik_id FROM korisnik WHERE username= '$username'";

    $rezultat = $baza->selectDB($sql);

    if($rezultat->num_rows > 0){
        $row = $rezultat->fetch_assoc();
        $id = $row["korisnik_id"];

        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), 'KREIRANA NOVA LOZINKA ZA $username: $novalozinka', $id)";
        $baza->selectDB($sql);
    }

    $baza->zatvoriDB();

    $poruka = "Nova generirana lozinka za $username: $novalozinka";
        mail($email,"TRCANJE nova lozinka",$poruka);
?>