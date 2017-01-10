<html>
	<head>

		<style>
			td:nth-child(odd),th:nth-child(odd){
				background-color: #f2f2f2;
			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!--<title>GS - Magazzino</title>-->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>

		<?php
			$page=1;
			include 'header.php';
		?>

		<script>var numeroProdotti=0;</script>

		<div id="wrapper">

			<div class="container">

				<div class="page-header">
				<h3>Magazzino</h3>
				</div>

				<?php if($userRow['magazzino']){ ?>

				<div class="panel panel-default">
				<!-- Default panel contents -->
					<div class="panel-heading">Elenco Prodotti</div>

					<!-- Table -->
					<table class="table">
						<tr>
							<th>Codice</th>
							<th>Descrizione</th>
							<th>Iva</th>
							<th>Prezzo senza Iva</th>
						</tr>
						<?php
							$res=mysql_query("SELECT * from prodotti");
							$n=mysql_num_rows($res);
							if($n!=0){
								for($i = 0; $i< $n; $i++){
									$prodotti[$i]=mysql_fetch_array($res);

						?>
									<tr>
										<td><?php echo $prodotti[$i]['codice']; ?></td>
										<td><?php echo $prodotti[$i]['descrizione']; ?></td>
										<td><?php echo $prodotti[$i]['iva']; ?>%</td>
										<td><?php echo $prodotti[$i]['prezzo']; ?>€</td>
										<?php
											echo "<td id='del".$prodotti[$i]['id']."'></td>";
											echo "<td id='edit".$prodotti[$i]['id']."'></td>";
										?>
									</tr>
						<?php
									$num=$prodotti[$i]['id'];
								}
								echo "<script>var numeroProdotti=".$num.";</script>";
							} else {
						?>
								<tr><td colspan="4">Nessun prodotto nel database!</td></tr>
						<?php } ?>
					</table>
				</div>

				<?php if($userRow['magazzino']==2){ ?>
					<!-- Bottoni aggiungi e modifica! -->
					<button class="btn btn-danger" onclick="bottoniElimina(numeroProdotti)">Elimina</button>
					<button class="btn btn-warning" onclick="bottoniModifica(numeroProdotti)">Modifica</button>
					<a class="btn btn-success" href = 'aggiungiMagazzino.php?type=aggiungi'>Aggiungi</a>
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
						document.getElementById("del"+i+"").outerHTML="<td></td><a href='eliminaMagazzino.php?id="+i+"' style='font-size:30px;'><div class='glyphicon glyphicon-remove'></div></a></td>";	
					}
				}
			}
			function bottoniModifica(n){
				for (i=1;i<=n;i++){
					if(document.getElementById("edit"+i+"")){
						document.getElementById("edit"+i+"").outerHTML="<td></td><a href='aggiugniMagazzino.php?type='modifica'&id="+i+"' style='font-size:30px;'><div style='background-color:black'class='glyphicon glyphicon-edit'></div></a></td>";	
					}
				}
			}
		</script>

		<script src="assets/jquery-1.11.3-jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

	</body>
</html>
