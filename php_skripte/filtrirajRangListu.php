<?php
    require "baza.class.php";

    $vrijemeOd= "";
    $vrijemeDo="";
 
    if(isset($_POST["od"]) and $_POST["od"] != ""){
        $string=str_replace(".",":",$_POST["od"]);
		$string=str_replace(" ","",$string);
		$podjela = explode(":",$string);
		if(count($podjela) == 6){
			$vrijemeOd=date("Y-m-d H:i:s", mktime($podjela[3],$podjela[4],$podjela[5],$podjela[1],$podjela[0],$podjela[2]));
		}
    }   
    if(isset($_POST["do"]) and $_POST["do"] != ""){
        $string=str_replace(".",":",$_POST["do"]);
		$string=str_replace(" ","",$string);
		$podjela = explode(":",$string);
		if(count($podjela) == 6){
			$vrijemeDo=date("Y-m-d H:i:s", mktime($podjela[3],$podjela[4],$podjela[5],$podjela[1],$podjela[0],$podjela[2]));
		}
    }


    $baza = new Baza;
    $baza->spojiDB();

    $pogodak=[];
    $sql;
    
    if($vrijemeOd == ""){
        if($vrijemeDo == ""){
            $sql = "SELECT korisnik.username, korisnik.ime_prezime, COUNT(*) as rang FROM `korisnik`JOIN sudjelovanje on korisnik.korisnik_id=sudjelovanje.korisnik_id JOIN etapa ON etapa.etapa_id = sudjelovanje.etapa_id WHERE sudjelovanje.sudjelovanje = 1 GROUP BY korisnik.username ORDER BY rang desc";
        }else{
            $sql = "SELECT korisnik.username, korisnik.ime_prezime, COUNT(*) as rang FROM `korisnik`JOIN sudjelovanje on korisnik.korisnik_id=sudjelovanje.korisnik_id JOIN etapa ON etapa.etapa_id = sudjelovanje.etapa_id WHERE sudjelovanje.sudjelovanje = 1 AND etapa.vrijeme_kraja <= '$vrijemeDo' GROUP BY korisnik.username ORDER BY rang desc";
        }
    }else{
        if($vrijemeDo == ""){
            $sql = "SELECT korisnik.username, korisnik.ime_prezime, COUNT(*) as rang FROM `korisnik`JOIN sudjelovanje on korisnik.korisnik_id=sudjelovanje.korisnik_id JOIN etapa ON etapa.etapa_id = sudjelovanje.etapa_id WHERE sudjelovanje.sudjelovanje = 1 AND etapa.vrijeme_kraja >= '$vrijemeOd' GROUP BY korisnik.username ORDER BY rang desc";
        }else{
            $sql = "SELECT korisnik.username, korisnik.ime_prezime, COUNT(*) as rang FROM `korisnik`JOIN sudjelovanje on korisnik.korisnik_id=sudjelovanje.korisnik_id JOIN etapa ON etapa.etapa_id = sudjelovanje.etapa_id WHERE sudjelovanje.sudjelovanje = 1 AND etapa.vrijeme_kraja <= '$vrijemeDo' AND etapa.vrijeme_kraja >= '$vrijemeOd' GROUP BY korisnik.username ORDER BY rang desc";
        }
    }

    $rezultat = $baza->selectDB($sql);

    while($row = $rezultat->fetch_assoc()){
            $pogodak[] = $row;   
    }
    
    $baza->zatvoriDB();


    header("Content-Type: application/json");
  
    echo json_encode($pogodak);

?>