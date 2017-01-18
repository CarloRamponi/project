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
		if(isset($_GET['id'])){
			$res=mysql_query("DELETE from log WHERE id='".$_GET['id']."'");
		}
	}

	header("location: caricoScaricoProdotti.php?codice=");


?>
