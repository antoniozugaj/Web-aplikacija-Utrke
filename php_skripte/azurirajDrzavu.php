<?php
    $ogranicenje = 3;
    $title="Uređivanje države";
    $description="Stranica za uređivanje odabrane država.";
    require "zaglavlje.php";
    require "baza.class.php"; 

    $drzava_id = (int)$_GET["drzava_id"];
    $novo_ime;
    $novi_kontinent;
    $novi_broj;

    $baza = new Baza;
    $baza->spojiDB();

    if(isset($_GET["novo_ime"]) and $_GET["novo_ime"] != "")
        $novo_ime=$_GET["novo_ime"];
    else
        $novo_ime=$_GET["ime"];
    
    if(isset($_GET["novi_kontinent"]) and $_GET["novi_kontinent"] != "")
        $novi_kontinent=$_GET["novi_kontinent"];
    else
        $novi_kontinent=$_GET["kontinent"];

    if(isset($_GET["novi_broj"]) and $_GET["novi_broj"] != "")
        $novi_broj=$_GET["novi_broj"];
    else
        $novi_broj=$_GET["broj"];

    


    $sql = "UPDATE drzava SET ime='$novo_ime', kontinent='$novi_kontinent', broj_dosadasnjih_utrka=$novi_broj WHERE drzava_id=$drzava_id";
    $rezultat = $baza->selectDB($sql);

    $sql = "SELECT korisnik_id FROM korisnik WHERE username= '{$_SESSION["username"]}'";
    $rezultat = $baza->selectDB($sql);
    if($rezultat->num_rows > 0){
        $row = $rezultat->fetch_assoc();
        $user_id = $row["korisnik_id"];
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} AZURIRANJE DRZAVE: $novo_ime', $user_id)";
        $baza->selectDB($sql);
    }

    $baza->zatvoriDB();
        header("Location: ../urediDrzavu.php?id=$drzava_id");
    ?>
