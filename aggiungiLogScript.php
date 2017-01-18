<?php

    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
    }

    require_once 'dbconnect.php';

    $res=mysql_query("SELECT magazzino FROM utenti WHERE username='".$_SESSION['user']."'");
    $userRow=mysql_fetch_array($res);
    $permessi=$userRow[0];

    if($permessi==2){
        $codice = $_GET['codice'];
        $tipo = $_POST['tipo'];
        $data = $_POST['data'];
        $quantita = $_POST['quantita'];
        if($codice=="" || $tipo == "" || $data=="" || $quantita=="")
            header("location: aggiungiLog.php?error=vuoto");
        else{
            mysql_query("INSERT INTO log (codice, tipo, data, quantita) VALUES (".$codice.", '".$tipo."', ".$data.", ".$quantita.");");
        }
    }

    header("location: caricoScaricoProdotti.php");

?>
