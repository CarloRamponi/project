<?php

  session_start();

  if (!isset($_SESSION['user'])) {
      header("Location: index.php");
  }

  if(!isset($_GET['id'])) {
    header("Location: clienti.php");
  } else {
    $id=$_GET['id'];
  }

  require_once 'dbconnect.php';

  $res=mysql_query("SELECT vendite FROM utenti WHERE username='".$_SESSION['user']."'");
  $userRow=mysql_fetch_array($res);
  $permessi=$userRow[0];

  $codice=$_POST['codice'];
  $nome=$_POST['nome'];
  $pi=$_POST['pi'];
  $via=$_POST['via'];
  $cap=$_POST['cap'];
  $citta=$_POST['citta'];
  $telefono=$_POST['telefono'];
  $fax=$_POST['fax'];
  $mail=$_POST['mail'];
  $iban=$_POST['iban'];
  $banca=$_POST['banca'];
  $pagamento=$_POST['pagamento'];
  $scadenza=$_POST['scadenza'];
  $annotazioni=$_POST['annotazioni'];
  $orari=$_POST['orari'];
  $sito=$_POST['sito'];

	if($permessi==2){
		$res=mysql_query("SELECT * FROM clienti WHERE codice='".$codice."'");
		$n=mysql_num_rows($res);
		if($n!=0){
			if($codice=="" || $nome==""){
				header("Location: aggiungiCliente.php?error=vuoto&type=modifica&id=".$id."");
			} else {
				mysql_query("UPDATE clienti SET codice=".$codice.", nome='".$nome."', pi=".$pi.", via='".$via."', cap=".$cap.", citta='".$citta."', telefono=".$telefono", fax=".$fax.", mail='".$mail."', iban=".$iban.", banca='".$banca."', pagamento='".$pagamento."', scadenza='".$scadenza."', annotazioni='".$annotazioni."', orari='".$orari."', sito='".$sito."' WHERE id=".$id";");
        header("Location: clienti.php");
      }
		}
	} else
		header("Location: index.php");

  ?>

?>
