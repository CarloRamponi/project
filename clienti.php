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
		<style>
			.btn-genera {
			color: #fff;
			background-color: #0066ff;
			border-color: #0000ff;
			}
			.btn-genera:focus,
			.btn-genera.focus {
			color: #fff;
			background-color: #0000ff;
			border-color: #0000ff;
			}
			.btn-genera:hover {
			color: #fff;
			background-color: #0000ff;
			border-color: #0000ff;
			}
			.btn-genera:active,
			.btn-genera.active,
			.open > .dropdown-toggle.btn-genera {
			color: #fff;
			background-color: #0000ff;
			border-color: #0000ff;
			}
		</style>
	</head>
	<body>

		<?php
			$page=3;
			include 'header.php';
		?>

		<script>var nclienti=0;</script>

		<div id="wrapper">

			<div class="container">

				<div class="page-header">
				<h3>Tabella Clienti</h3>
				</div>

				<?php if($userRow['vendite']){ ?>


				<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Lista clienti</div>

					<!-- Table -->
					<div style="overflow-x: scroll;">
					<table class="table">
						<tr>
							<th width="200px">Codice cliente</th>
							<th width="200px">Nome azienda</th>
							<th width="200px">PI/CF </th>
							<th width="200px">Indirizzo </th>
							<th width="200px">CAP</th>
							<th width="200px">Città</th>
							<th width="200px">Telefono </th>
							<th width="200px">FAX</th>
							<th width="200px">E-mail</th>
							<th width="200px">Iban</th>
							<th width="200px">Banca D'appogio</th>
							<th width="200px">Modalità di pagamento</th>
							<th width="200px">Scadenza</th>
							<th width="200px">Annotazioni</th>
							<th width="200px">Giorni di attività</th>
							<th width="200px">Sito</th>
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
										<td><?php echo $utenti[$i]['citta']; ?></td>
										<td><?php echo $utenti[$i]['telefono']; ?></td>
										<td><?php echo $utenti[$i]['fax']; ?></td>
										<td><?php echo $utenti[$i]['mail']; ?></td>
										<td><?php echo $utenti[$i]['iban']; ?></td>
										<td><?php echo $utenti[$i]['banca']; ?></td>
										<td><?php echo $utenti[$i]['pagamento']; ?></td>
										<td><?php echo $utenti[$i]['scadenza']; ?></td>
										<td><?php echo $utenti[$i]['annotazioni']; ?></td>
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
			</div>

				<?php if($userRow['vendite']==2){ ?>
					<!-- Bottoni aggiungi e modifica! -->
					<button class="btn btn-danger" onclick="bottoniElimina(numeroProdotti)">Elimina</button>
					<button class="btn btn-warning" onclick="bottoniModifica(numeroProdotti)">Modifica</button>
					<a class="btn btn-success" href = 'aggiungiCliente.php?type=aggiungi'>Aggiungi</a>
					<br></br>
					<a class="btn btn-genera" href = 'generaFattura.php'> Genera Fattura </a>
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
						document.getElementById("delll"+i+"").outerHTML="<td style='background-color:#FFFFFF;' id='elill"+i+"'><a href='eliminaClienteScript.php?id="+i+"' style='font-size:25px;'><div class='glyphicon glyphicon-remove'></div></a></td>";
					} else if(document.getElementById("elill"+i+""))
							document.getElementById("elill"+i+"").outerHTML="<td style='background-color:#FFFFFF' id='delll"+i+"'></td>";
				}
			}
			function bottoniModifica(n){
				for (i=1;i<=n;i++){
					if(document.getElementById("editl"+i+"")){
						document.getElementById("editl"+i+"").outerHTML="<td style='background-color:#FFFFFF;' id='modl"+i+"'><a href='aggiungiCliente.php?type=modifica&id="+i+"' style='font-size:25px;'><div class='glyphicon glyphicon-edit'></div></a></td>";
					} else if(document.getElementById("modl"+i+""))
							document.getElementById("modl"+i+"").outerHTML="<td style='background-color:#FFFFFF' id='editl"+i+"'></td>";
				}
			}
		</script>

		<script src="assets/jquery-1.11.3-jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
