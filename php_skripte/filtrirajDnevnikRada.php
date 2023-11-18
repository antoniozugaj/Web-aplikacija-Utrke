<?php
    require "baza.class.php";

    $vrijemeOd= "";
    $vrijemeDo="";
    $tip="";
    $username="";
    
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
        
    if(isset($_POST["tip"]))
        $tip=$_POST["tip"];
    if(isset($_POST["username"]))
        $username=$_POST["username"];


    $baza = new Baza;
    $baza->spojiDB();

    $pogodak=[];

    $sql = "SELECT * FROM log";
    $rezultat = $baza->selectDB($sql);

    while($row = $rezultat->fetch_assoc()){
        $dodaj=true;

        if($username != "" and !str_contains($row["dogadaj"], $username))
            $dodaj=false;
        
        if($tip != "" and !str_contains($row["dogadaj"], $tip))
            $dodaj=false;

        if($vrijemeOd != ""){
            if($vrijemeOd > $row["vrijeme"])
                $dodaj=false;
        }
        if($vrijemeDo != ""){
            if($vrijemeDo < $row["vrijeme"])
                $dodaj=false;
        }
            
        if($dodaj){
            $row['vrijeme']= date("d.m.Y H:i:s", strtotime($row['vrijeme']));
            $pogodak[] = $row;
        }
            
    }
    
    $baza->zatvoriDB();


    header("Content-Type: application/json");
  
    echo json_encode($pogodak);

?>