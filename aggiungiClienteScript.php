<?php

  session_start();

  if (!isset($_SESSION['user'])) {
      header("Location: index.php");
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
		if($n==0){
			if($codice=="" || $nome==""){
				header("Location: aggiungiCliente.php?error=vuoto&type=aggiungi");
			} else {
				mysql_query("INSERT INTO clienti (codice, nome, pi, via, cap, citta, telefono, fax, mail, iban, banca, pagamento, scadenza, annotazioni, orari, sito) values (".$codice.", '".$nome."', ".$pi.", '".$via."', ".$cap.", '".$citta."', ".$telefono.", ".$fax.", '".$mail."', ".$iban.", '".$banca."', '".$pagamento."', '".$scadenza."', '".$annotazioni."', '".$orari."', '".$sito."');");
        header("Location: clienti.php");
      }
		} else
			header("Location: aggiungiCliente.php?error=clienteEsistente&type=aggiungi");
	} else
		header("Location: index.php");

?>
