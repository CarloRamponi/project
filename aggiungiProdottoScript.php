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
        $codice = $_POST['codice'];
        $descrizione = $_POST['descrizione'];
        $iva = $_POST['iva'];
        $prezzo = $_POST['prezzo'];
        if($codice=="" || $descrizione == "" || $iva=="" || $prezzo=="")
            header("location: aggiungiMagazzino.php?error=vuoto");
        else{
            mysql_query("INSERT INTO prodotti (codice, descrizione, iva, prezzo) VALUES (".$codice.", '".$descrizione."', ".$iva.", ".$prezzo.");");
        }
    }

    header("location: magazzino.php");

?>
