<?php

    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
    }

    require_once 'dbconnect.php';

    $res=mysql_query("SELECT finanza FROM utenti WHERE username='".$_SESSION['user']."'");
    $userRow=mysql_fetch_array($res);
    $permessi=$userRow[0];

    if($permessi==2){
        $data = $_POST['data'];
        $descrizione = $_POST['descrizione'];
        $tipo = $_POST['tipo'];
        $importo = $_POST['importo'];
        if($data == "" || $descrizione == "" || $tipo == "" || $importo = "")
            header("location: aggiungiFinanza.php?error=vuoto");
        else{
            mysql_query("INSERT INTO finanza (data, descrizione, tipo, importo) VALUES ('".$data."', '".$descrizione."', '".$tipo."', ".$importo.");");
        }
    }

    header("location: finanza.php");

?>
