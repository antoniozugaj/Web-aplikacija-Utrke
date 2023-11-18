<?php
    require "baza.class.php"; 
    session_start();

    $baza = new Baza;
    $baza->spojiDB();

    if(isset($_POST["grad"])){

        $utrka_id =$_POST["utrka"];
        $grad = $_POST["grad"];
        $adresa= $_POST["adresa"];
        $duljina=$_POST["duljina"];

        $pocetak="";
        $string=str_replace(".",":",$_POST["pocetak"]);
		$string=str_replace(" ","",$string);
		$podjela = explode(":",$string);
		if(count($podjela) == 6){
			$pocetak=date("Y-m-d H:i:s", mktime($podjela[3],$podjela[4],$podjela[5],$podjela[1],$podjela[0],$podjela[2]));
		} 

        $kraj="";
        $string=str_replace(".",":",$_POST["kraj"]);
		$string=str_replace(" ","",$string);
		$podjela = explode(":",$string);
		if(count($podjela) == 6){
			$kraj=date("Y-m-d H:i:s", mktime($podjela[3],$podjela[4],$podjela[5],$podjela[1],$podjela[0],$podjela[2]));
		} 

        $sql = "INSERT INTO etapa (grad, adresa_pocetka, duljina, zakljucana, vrijeme_pocetka, vrijeme_kraja, utrka_id) VALUE ('$grad', '$adresa', '$duljina', 0, '$pocetak', '$kraj', $utrka_id)";
        $rezultat = $baza->selectDB($sql);

        $sql = "SELECT korisnik_id FROM korisnik WHERE username= '{$_SESSION["username"]}'";
        $rezultat = $baza->selectDB($sql);
        if($rezultat->num_rows > 0){
            $row = $rezultat->fetch_assoc();
            $user_id = $row["korisnik_id"];
            $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} KREIRANJE Etape: $utrka_id', $user_id)";
            $baza->selectDB($sql);
        }

        $baza->zatvoriDB();
    }

    if(isset($_GET["id"])){

        $id=$_GET["id"];
        $novi_naziv;
        $novi_sudionici;
        $nove_prijave;
        $novi_pocetak;
        $novi_kraj;

        $nova_drzava=$_GET["nova_drzava"];
        $novi_tip=$_GET["novi_tip"];
        

        if(isset($_GET["novi_naziv"]) and $_GET["novi_naziv"] != "")
            $novi_naziv=$_GET["novi_naziv"];
        else
            $novi_naziv=$_GET["naziv"];

        if(isset($_GET["novi_sudionici"]) and $_GET["novi_sudionici"] != "")
            $novi_sudionici=$_GET["novi_sudionici"];
        else
            $novi_sudionici=$_GET["sudionici"];

        if(isset($_GET["nove_prijave"]) and $_GET["nove_prijave"] != "")
            $nove_prijave=$_GET["nove_prijave"];
        else
            $nove_prijave=$_GET["prijave"];

        if(isset($_GET["novi_pocetak"]) and $_GET["novi_pocetak"] != "")
            $novi_pocetak=$_GET["novi_pocetak"];
        else
            $novi_pocetak=$_GET["pocetak"];

        if(isset($_GET["novi_kraj"]) and $_GET["novi_kraj"] != "")
            $novi_kraj=$_GET["novi_kraj"];
        else
            $novi_kraj=$_GET["kraj"];

        $string=str_replace(".",":",$nove_prijave);
        $string=str_replace(" ","",$string);
        $podjela = explode(":",$string);
        if(count($podjela) == 6){
            $nove_prijave=date("Y-m-d H:i:s", mktime($podjela[3],$podjela[4],$podjela[5],$podjela[1],$podjela[0],$podjela[2]));
        }
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

        $sql = "UPDATE utrka SET naziv='$novi_naziv', vrijeme_zavrsetka_prijava='$nove_prijave', pocetak_odrzavanja='$novi_pocetak', kraj_odrzavanja = '$novi_kraj', broj_sudionika = $novi_sudionici, drzava_id= $nova_drzava, tip_utrke_id= $novi_tip WHERE utrka_id=$id";
        $rezultat = $baza->selectDB($sql);

        $sql = "SELECT korisnik_id FROM korisnik WHERE username= '{$_SESSION["username"]}'";
        $rezultat = $baza->selectDB($sql);
        if($rezultat->num_rows > 0){
            $row = $rezultat->fetch_assoc();
            $user_id = $row["korisnik_id"];
            $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), '{$_SESSION["username"]} AZURIRANJE UTRKE: $novi_naziv', $user_id)";
            $baza->selectDB($sql);
        }

        $baza->zatvoriDB();
        header("Location: ../urediUtrku.php?id=$id");
    }

?>