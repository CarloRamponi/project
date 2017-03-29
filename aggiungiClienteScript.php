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
			    $query="INSERT INTO clienti (";

			    if($codice!="")
			        $query.="codice";
			    if($nome!="")
			        $query.=", nome";
                if($pi!="")
                    $query.=", pi";
                if($via!="")
                    $query.=", via";
                if($cap!="")
                    $query.=", cap";
                if($citta!="")
                    $query.=", citta";
                if($telefono!="")
                    $query.=", telefono";
                if($fax!="")
                    $query.=", fax";
                if($mail!="")
                    $query.=", mail";
                if($iban!="")
                    $query.=", iban";
                if($banca!="")
                    $query.=", banca";
                if($pagamento!="")
                    $query.=", pagamento";
                if($scadenza!="")
                    $query.=", scadenza";
                if($annotazioni!="")
                    $query.=", annotazioni";
                if($orari!="")
                    $query.=", orari";
                if($sito!="")
                    $query.=", sito";

                $query .= ") VALUES ( ";

                if($codice!="")
                    $query.=$codice;
                if($nome!="")
                    $query.=", '".$nome."'";
                if($pi!="")
                    $query.=", '".$pi."'";
                if($via!="")
                    $query.=", '".$via."'";
                if($cap!="")
                    $query.=", ".$cap;
                if($citta!="")
                    $query.=", '".$citta."'";
                if($telefono!="")
                    $query.=", ".$telefono;
                if($fax!="")
                    $query.=", ".$fax;
                if($mail!="")
                    $query.=", '".$mail."'";
                if($iban!="")
                    $query.=", '".$iban."'";
                if($banca!="")
                    $query.=", '".$banca."'";
                if($pagamento!="")
                    $query.=", '".$pagamento."'";
                if($scadenza!="")
                    $query.=", '".$scadenza."'";
                if($annotazioni!="")
                    $query.=", '".$annotazioni."'";
                if($orari!="")
                    $query.=", '".$orari."'";
                if($sito!="")
                    $query.=", '".$sito."'";

                $query.=");";

                mysql_query($query);
                header("Location: clienti.php");
            }
		} else
			header("Location: aggiungiCliente.php?error=clienteEsistente&type=aggiungi");
	} else
		header("Location: index.php");

?>
