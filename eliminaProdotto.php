<?php

	session_start();

	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
	} else if(isset($_SESSION['user'])!="") {
		header("Location: home.php");
	}

	require_once 'dbconnect';

	$res=mysql_query("SELECT magazzino FROM utenti WHERE username='".$_SESSION['user']."'");
	$userRow=mysql_fetch_array($res);
	$permessi=$userRow[0];

	echo "Permessi: ". $permessi;


?>
