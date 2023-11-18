<?php
    session_start();

    //prije skripte postavi $ogranicenje
    if(isset($_SESSION["tip_korisnika"])){
        if($_SESSION["tip_korisnika"] < $ogranicenje){
            header("Location: index.php");
        }
    }elseif($ogranicenje != 0){
        header("Location: index.php");
    }

?>