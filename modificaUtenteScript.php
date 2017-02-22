<?php

  session_start();

  if (!isset($_SESSION['user'])) {
      header("Location: index.php");
  }

  if(!isset($_GET['id']))
    header("Location: gestioneUtenti.php");
  else {
    $id=$_GET['id'];
  }

  require_once 'dbconnect.php';

  $res=mysql_query("SELECT admin FROM utenti WHERE username='".$_SESSION['user']."'");
  $userRow=mysql_fetch_array($res);
  $permessi=$userRow[0];

	$adminString = $_POST['admin'];
	if($adminString == "Nessuno"){
		$admin=0;
  } else if ($adminString == "Scrittura") {
		$admin=1;
  }


	$magazzinoScrittura = $_POST['magazzino'];
	if($magazzinoScrittura == "Nessuno") {
		$magazzino=0;
	} else if ($magazzinoScrittura == "Lettura") {
		$magazzino=1;
	} else if ($magazzinoScrittura == "Scrittura") {
		$magazzino=2;
  }

	$finanzaScrittura = $_POST['finanza'];
	if($finanzaScrittura == "Nessuno") {
		$finanza=0;
	} else if ($finanzaScrittura == "Lettura") {
		$finanza=1;
	} else if ($finanzaScrittura == "Scrittura") {
		$finanza=2;
  }

	$nuovo_utente = $_POST['nuovo_utente'];
	$new_password1 = $_POST['new_password1'];
	$new_password2 = $_POST['new_password2'];

	if($permessi==1){
		$res=mysql_query("SELECT * FROM utenti WHERE id='".$id."'");
		$n=mysql_num_rows($res);
		if($n!=0){
			if($nuovo_utente=="" || $new_password1=="" || $new_password2==""){
				header("Location: aggiungiUtente.php?error=vuoto&type=modifica&id=".$id);
			} else if($new_password1!=$new_password2) {
				header("Location: aggiungiUtente.php?error=newPassword&type=modifica&id=".$id);
			} else {
				mysql_query("UPDATE utenti SET username='".$nuovo_utente."', password='".$new_password1."', admin=".$admin.", finanza=".$finanza.", magazzino=".$magazzino." WHERE id=".$id.";");
        header("Location: gestioneUtenti.php");
      }
		} else
			header("Location: aggiungiUtente.php?error=utenteEsistente&type=modifica&id="$id);
	} else
		header("Location: index.php");

?>
