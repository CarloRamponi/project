<?php

  session_start();

  if (!isset($_SESSION['user'])) {
      header("Location: index.php");
  }

  require_once 'dbconnect.php';

  $res=mysql_query("SELECT vendite FROM utenti WHERE username='".$_SESSION['user']."'");
  $userRow=mysql_fetch_array($res);
  $permessi=$userRow[0];
  $id = $_GET['id'];
  if($permessi==2){
		$res=mysql_query("DELETE FROM clienti WHERE id='".$id."'");
		header("Location: clienti.php");
  } else
	  header("Location: index.php");
?>
