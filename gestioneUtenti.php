<html>
	<head>

		<style>
			td:nth-child(odd),th:nth-child(odd){
				background-color: #f2f2f2;
			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Utenti</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>

		<?php
			include 'header.php';
		?>

		<script>var numeroProdotti=0;</script>

		<div id="wrapper">

			<div class="container">

				<div class="page-header">
				<h3>Gestione Utenti</h3>
				</div>

				<?php if($userRow['admin']){ ?>

				<div class="panel panel-default">
				<!-- Default panel contents -->
					<div class="panel-heading">Lista utenti e permessi</div>

					<!-- Table -->
					<table class="table">
						<tr>
							<th>Nome utente</th>
							<th>Magazzino</th>
							<th>Finanza</th>
							<th>Vendite</th>
						</tr>
						<?php
							$res=mysql_query("SELECT * from utenti");
							$n=mysql_num_rows($res);
							if($n!=0){
								for($i = 0; $i< $n; $i++){
									$utenti[$i]=mysql_fetch_array($res);

						?>
									<tr>
										<td><?php echo $utenti[$i]['username']; ?></td>
										<td><?php
													if($utenti[$i]['magazzino']==0)
														echo "Nessuno";
													else if($utenti[$i]['magazzino']==1)
														echo "Lettura";
													else if($utenti[$i]['magazzino']==2)
														echo "Scrittura";
												?>
										</td>
										<td><?php
													if($utenti[$i]['finanza']==0)
														echo "Nessuno";
													else if($utenti[$i]['finanza']==1)
														echo "Lettura";
													else if($utenti[$i]['finanza']==2)
														echo "Scrittura";
												?>
										</td>
										<td><?php
													if($utenti[$i]['vendite']==0)
														echo "Nessuno";
													else if($utenti[$i]['vendite']==1)
														echo "Lettura";
													else if($utenti[$i]['vendite']==2)
														echo "Scrittura";
												?>
										</td>
										<?php
											echo "<td style='background-color:#FFFFFF' id='del".$utenti[$i]['id']."'></td>";
											echo "<td style='background-color:#FFFFFF' id='edit".$utenti[$i]['id']."'></td>";
										?>
									</tr>
						<?php
									$num=$utenti[$i]['id'];
								}
								echo "<script>var numeroProdotti=".$num.";</script>";
							} else {
						?>
								<tr><td colspan="4">Nessun utente nel database!</td></tr>
						<?php } ?>
					</table>
				</div>

				<?php if(isset($_GET['error'])){
					$error = $_GET['error'];
					if($error=="deleteItself")
						echo "<span class='text-danger'>Non puoi eliminare te stesso!</span><br><br>";
				} ?>

				<?php if($userRow['magazzino']==2){ ?>
					<!-- Bottoni aggiungi e modifica! -->
					<button class="btn btn-danger" onclick="bottoniElimina(numeroProdotti)">Elimina</button>
					<button class="btn btn-warning" onclick="bottoniModifica(numeroProdotti)">Modifica</button>
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
					if(document.getElementById("del"+i+"")){
						document.getElementById("del"+i+"").outerHTML="<td style='background-color:#FFFFFF;' id='eli"+i+"'><a href='eliminaUtenteScript.php?id="+i+"' style='font-size:25px;'><div class='glyphicon glyphicon-remove'></div></a></td>";
					} else if(document.getElementById("eli"+i+""))
							document.getElementById("eli"+i+"").outerHTML="<td style='background-color:#FFFFFF' id='del"+i+"'></td>";
				}
			}
			function bottoniModifica(n){
				for (i=1;i<=n;i++){
					if(document.getElementById("edit"+i+"")){
						document.getElementById("edit"+i+"").outerHTML="<td style='background-color:#FFFFFF;' id='mod"+i+"'><a href='aggiungiUtente.php?type=modifica&id="+i+"' style='font-size:25px;'><div class='glyphicon glyphicon-edit'></div></a></td>";
					} else if(document.getElementById("mod"+i+""))
							document.getElementById("mod"+i+"").outerHTML="<td style='background-color:#FFFFFF' id='edit"+i+"'></td>";
				}
			}
		</script>

		<script src="assets/jquery-1.11.3-jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
