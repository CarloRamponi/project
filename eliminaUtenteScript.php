<?php

  session_start();

  if (!isset($_SESSION['user'])) {
      header("Location: index.php");
  }

  require_once 'dbconnect.php';

  $res=mysql_query("SELECT admin FROM utenti WHERE username='".$_SESSION['user']."'");
  $userRow=mysql_fetch_array($res);
  $permessi=$userRow[0];
  $id = $_POST['id'];
  if($permessi==1){
	  $res=mysql_query("DELETE FROM utenti WHERE id='".$id."'");
	  header("Location: gestioneUtenti.php");
  } else
	  header("Location: index.php");
?>
