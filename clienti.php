<html>
	<head>

		<style>
			td:nth-child(odd),th:nth-child(odd){
				background-color: #f2f2f2;
			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Clienti</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>

		<?php
			include 'header.php';
		?>

		<script>var nclienti=0;</script>

		<div id="wrapper">

			<div class="container">

				<div class="page-header">
				<h3>Tabella Clienti</h3>
				</div>

				<?php if($userRow['vendite']){ ?>

				<div style=""width:700px;height: 400px; overflow-x:  scroll; overflow-y:  scroll;border:1px solid black;"><table cellpadding="4" cellspacing="1" width="100%" border=0>
				<!-- Default panel contents -->
					<div class="panel-heading">Lista clienti</div>

					<!-- Table -->
					<table cellpadding="4" cellspacing="1" width="100%" border=0>
						<tr>
							
							<td><b>Codice cliente</b>
							<td><b>Nome azienda</b>
							<td><b>PI/CF </b>
							<td><b>Indirizzo </b>
							<td><b>CAP</b>
							<td><b>Città</b>
							<td><b>Telefono </b>
							<td><b>FAX</b>
							<td><b>E-mail</b>
							<td><b>Iban</b>
							<td><b>Banca D'appogio</b>
							<td><b>Modalità di pagamento</b>
							<td><b>Scadenza</b>
							<td><b>Annotazioni</b>
							<td><b>Giorni di attività</b>
							<td><b>Sito</b>
						</tr>
						<?php
							$res=mysql_query("SELECT * from clienti");
							$n=mysql_num_rows($res);
							if($n!=0){
								for($i = 0; $i< $n; $i++){
									$utenti[$i]=mysql_fetch_array($res);

						?>
									<tr>
										<td><?php echo $utenti[$i]['codice']; ?></td>
										<td><?php echo $utenti[$i]['nome']; ?></td>
										<td><?php echo $utenti[$i]['pi']; ?></td>
										<td><?php echo $utenti[$i]['via']; ?></td>
										<td><?php echo $utenti[$i]['cap']; ?></td>
										<td><?php echo $utenti[$i]['città']; ?></td>
										<td><?php echo $utenti[$i]['telefono']; ?></td>
										<td><?php echo $utenti[$i]['fax']; ?></td>
										<td><?php echo $utenti[$i]['mail']; ?></td>
										<td><?php echo $utenti[$i]['iban']; ?></td>
										<td><?php echo $utenti[$i]['banca']; ?></td>
										<td><?php echo $utenti[$i]['pagamento']; ?></td>
										<td><?php echo $utenti[$i]['scadenza']; ?></td>
										<td><?php echo $utenti[$i]['annotazione']; ?></td>
										<td><?php echo $utenti[$i]['orari']; ?></td>
										<td><?php echo $utenti[$i]['sito']; ?></td>
										<?php
											echo "<td style='background-color:#FFFFFF' id='delll".$utenti[$i]['id']."'></td>";
											echo "<td style='background-color:#FFFFFF' id='editl".$utenti[$i]['id']."'></td>";
										?>
									</tr>
						<?php
									$num=$utenti[$i]['id'];
								}
								echo "<script>var numeroProdotti=".$num.";</script>";
							} else {
						?>
								<tr><td colspan="4">Nessun cliente nel database!</td></tr>
						<?php } ?>
					</table>
				</div>

				<?php if($userRow['vendite']==2){ ?>
					<!-- Bottoni aggiungi e modifica! -->
					<button class="btn btn-danger" onclick="bottoniElimina">Elimina</button>
					<button class="btn btn-warning" onclick="bottoniModifica">Modifica</button>
					<a class="btn btn-success" href = 'aggiungiUtente.php?type=aggiungi'>Aggiungi</a>
				<?php } ?>
			</div>

			<?php } else { ?>
				<!-- Non autorizzato a visualizzare! -->
				Non autorizzato
			<?php } ?>

		</div>

		<script>
			function bottoniElimina(n){
				for (i=1;i<=n;i++){
					if(document.getElementById("delll"+i+"")){
						document.getElementById("delll"+i+"").outerHTML="<td style='background-color:#FFFFFF;' id='eli"+i+"'><a href='eliminaUtenteScript.php?id="+i+"' style='font-size:25px;'><div class='glyphicon glyphicon-remove'></div></a></td>";
					} else if(document.getElementById("elill"+i+""))
							document.getElementById("elill"+i+"").outerHTML="<td style='background-color:#FFFFFF' id='del"+i+"'></td>";
				}
			}
			function bottoniModifica(n){
				for (i=1;i<=n;i++){
					if(document.getElementById("editl"+i+"")){
						document.getElementById("editl"+i+"").outerHTML="<td style='background-color:#FFFFFF;' id='mod"+i+"'><a href='aggiungiUtente.php?type=modifica&id="+i+"' style='font-size:25px;'><div class='glyphicon glyphicon-edit'></div></a></td>";
					} else if(document.getElementById("modl"+i+""))
							document.getElementById("modl"+i+"").outerHTML="<td style='background-color:#FFFFFF' id='edit"+i+"'></td>";
				}
			}
		</script>

		<script src="assets/jquery-1.11.3-jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
