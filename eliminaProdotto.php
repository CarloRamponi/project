<?php

	session_start();

	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
	}

	require_once 'dbconnect.php';

	$res=mysql_query("SELECT magazzino FROM utenti WHERE username='".$_SESSION['user']."'");
	$userRow=mysql_fetch_array($res);
	$permessi=$userRow[0];

	echo "Permessi: ". $permessi ."";


?>
