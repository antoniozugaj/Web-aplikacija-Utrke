
<?php
  require "baza.class.php";
  session_start();

  $godina = $_POST["godina"];
  $utrka = $_POST["utrka"];

  $putanja = "materijali/slike_korisnika/";
  $ekstenzija = strtolower(pathinfo(basename($_FILES["slika"]["name"]),PATHINFO_EXTENSION));
  $datoteka = $putanja . $_SESSION["username"]."_".$utrka.".".$ekstenzija;

  $greska = 0;


  if($ekstenzija != "jpeg" && $ekstenzija != "jpg" && $ekstenzija != "png") {
    $greska = 1;
  }

  if ($_FILES["slika"]["size"] > 500000) {
    $greska = 1;
  }

  if ($greska == 0){

    if (file_exists($datoteka)) {
      unlink($datoteka);
    }
    
    if (move_uploaded_file($_FILES["slika"]["tmp_name"], "../".$datoteka)) {

      $baza = new Baza;
      $baza->spojiDB();

      $sql="SELECT korisnik_id FROM korisnik WHERE username = '{$_SESSION["username"]}'";
      $rezultat = $baza->selectDB($sql);
      $row = $rezultat->fetch_assoc();
      $korisnik_id = $row["korisnik_id"];

      if(isset($_POST["azuriraj"])){
        $sql="UPDATE prijava SET godina_rodenja='$godina' WHERE korisnik_id = $korisnik_id AND utrka_id=$utrka";
        $rezultat = $baza->selectDB($sql);
        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), ' $username: AZURIRANA UTRKA $utrka', $korisnik_id)";
        $baza->selectDB($sql);

        $baza->zatvoriDB();
        header("Location: ../urediPrijavu.php?utrka=$utrka&korisnik=$korisnik_id");

      }else{
        $sql="INSERT INTO prijava (korisnik_id, utrka_id, godina_rodenja, slika, pozicija, ukupni_bodovi) VALUE ($korisnik_id, $utrka, '$godina','$datoteka', 0, 0)";
        $rezultat = $baza->selectDB($sql);

        $sql = "INSERT INTO log (vrijeme, dogadaj, korisnik_id) VALUE ( NOW(), ' $username: PRIJAVLJENA UTRKA $utrka', $korisnik_id)";
        $baza->selectDB($sql);

        $sql="UPDATE utrka SET broj_prijava = broj_prijava + 1 WHERE utrka_id = $utrka";
        $rezultat = $baza->selectDB($sql);

        $sql = "SELECT * FROM etapa WHERE utrka_id = $utrka";
        $rezultat = $baza->selectDB($sql);
        $etape=[];
        while($row = $rezultat->fetch_assoc()){
          $etape[] = $row;
        }

        foreach($etape as $etapa){
          $sql="INSERT INTO sudjelovanje (korisnik_id, etapa_id, sudjelovanje) VALUE ($korisnik_id, {$etapa["etapa_id"]}, 1)";
          $rezultat = $baza->selectDB($sql);
        }
        $baza->zatvoriDB();
        header("Location: ../mojeUtrke.php");
      }
      
    } else {
      header("Location: ../formaZaPrijavuUtrke.php?utrka=$utrka&greska=1");
    }
  }else{
    if(isset($_POST["azuriraj"])){
      header("Location: ../urediPrijavu.php?utrka=$utrka&greska=1");
    }else{
      header("Location: ../formaZaPrijavuUtrke.php?utrka=$utrka&korisnik=$korisnik_id&greska=1");
    }
  }
?>
