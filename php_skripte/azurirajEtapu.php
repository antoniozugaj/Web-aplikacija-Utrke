<?php
    require "baza.class.php"; 
    session_start();

    $baza = new Baza;
    $baza->spojiDB();

    $etapa=$_POST["etapa"];
    $novi_grad;
    $nova_adresa;
    $nova_duljina;
    $novi_pocetak;
    $novi_kraj;

    if(isset($_POST["novi_grad"]) and $_POST["novi_grad"] != "")
        $novi_grad=$_POST["novi_grad"];
    else
        $novi_grad=$_POST["grad"];

    if(isset($_POST["nova_adresa"]) and $_POST["nova_adresa"] != "")
        $nova_adresa=$_POST["nova_adresa"];
    else
        $nova_adresa=$_POST["adresa"];

    if(isset($_POST["nova_duljina"]) and $_POST["nova_duljina"] != "")
        $nova_duljina=$_POST["nova_duljina"];
    else
        $nova_duljina=$_POST["duljina"];

    if(isset($_POST["novi_pocetak"]) and $_POST["novi_pocetak"] != "")
        $novi_pocetak=$_POST["novi_pocetak"];
    else
        $novi_pocetak=$_POST["pocetak"];

    if(isset($_POST["novi_kraj"]) and $_POST["novi_kraj"] != "")
        $novi_kraj=$_POST["novi_kraj"];
    else
        $novi_kraj=$_POST["kraj"];

    $string=str_replace(".",":",$novi_pocetak);
    $string=str_replace(" ","",$string);
    $podjela = explode(":",$string);
    if(count($podjela) == 6){
        $novi_pocetak=date("Y-m-d H:i:s", mktime($podjela[3],$podjela[4],$podjela[5],$podjela[1],$podjela[0],$podjela[2]));
    }
    $string=str_replace(".",":",$novi_kraj);
    $string=str_replace(" ","",$string);
    $podjela = explode(":",$string);
    if(count($podjela) == 6){
        $novi_kraj=date("Y-m-d H:i:s", mktime($podjela[3],$podjela[4],$podjela[5],$podjela[1],$podjela[0],$podjela[2]));
    }

    $sql = "UPDATE etapa SET grad='$novi_grad', adresa_pocetka='$nova_adresa', duljina='$nova_duljina', vrijeme_pocetka = '$novi_pocetak', vrijeme_kraja = '$novi_kraj' WHERE etapa_id=$etapa";
    $rezultat = $baza->selectDB($sql);

    $sql = "SELECT korisnik_id FROM korisnik WHERE username= '{$_SESSION["username"]}'";
    $rezultat2 = $baza->selectDB($sql);
    if($rezultat2->num_rows > 0){
        $row = $rezultat2->fetch_assoc();
        $user_id = $row["korisnik_id"];
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} AZURIRANJE UTRKE: $etapa', $user_id)";
        $baza->selectDB($sql);
    }

    $baza->zatvoriDB();

    echo $rezultat;
?>