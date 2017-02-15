<?php

  session_start();

  if (!isset($_SESSION['user'])) {
      header("Location: index.php");
  }

  require_once 'dbconnect.php';
	
	$res=mysql_query("SELECT admin FROM utenti WHERE username='".$_SESSION['user']."'");
    $userRow=mysql_fetch_array($res);
    $permessi=$userRow[0];
	
	$admin = $_POST['admin'];
	$magazzino = $_POST['magazzino'];
	$finanza = $_POST['finanza'];
	$nuovo_utente = $_POST['nuovo_utente'];
	$new_password1 = $_POST['new_password1'];
	$new_password2 = $_POST['new_password2'];
	
	if($permessi==1){
		$res=mysql_query("SELECT * FROM utenti WHERE username='".$nuovo_utente."'");
		$n=mysql_num_rows($res);
		if($n==0){
			if($nuovo_utente=="" || $new_password1=="" || $new_password2==""){
				header("location: cambiaPassword.php?error=vuoto");
			} else if($new_password1!=$new_password2){
				eader("location: cambiaPassword.php?error=newPassword");
			mysql_query("INSERT INTO utenti (username, password, admin, magazzino, finanza) values ('".$nuovo_utente."', '".$new_password1."', ".$admin.", ".$magazzino.", ".$finanza.");");
		}
		else
			header("location: aggiungiUtente.php?error=utenteEsistente");
	}
	header("location: index.php");
  }

?>
