<?php

  session_start();

  if (!isset($_SESSION['user'])) {
      header("Location: index.php");
  }

  require_once 'dbconnect.php';

  $res=mysql_query("SELECT admin FROM utenti WHERE username='".$_SESSION['user']."'");
  $userRow=mysql_fetch_array($res);
  $permessi=$userRow[0];
  $id = $_GET['id'];
  if($permessi==1){
	  $res=mysql_query("SELECT id FROM utenti WHERE username='".$_SESSION['user']."'");
	  $value=mysql_fetch_array($res);
	  if($value[0]==$id)
		header("Location: gestioneUtenti.php?error=deleteItself");
	  else {
		$res=mysql_query("DELETE FROM utenti WHERE id='".$id."'");
		header("Location: gestioneUtenti.php");
	  }
  } else
	  header("Location: index.php");
?>
