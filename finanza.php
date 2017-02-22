<html>
	<head>

		<style>
			td:nth-child(odd),th:nth-child(odd){
				background-color: #f2f2f2;
			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>GS - Finanza</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>

		<?php
			$page=2;
			include 'header.php';
		?>

		<?php
			$res = mysql_query("SELECT * FROM finanza;");
			$num = mysql_num_rows($res);
			if($num){
				for($i=0; $i<$num; $i++)
					$finanza[$i]=mysql_fetch_array($res);
			}
		?>

		<script>var numeroProdotti=0;</script>

		<div id="wrapper">

			<div class="container">

				<div class="page-header">
				<h3>Finanza</h3>
				</div>

				<?php if($userRow['finanza']){ ?>

				<div class="panel panel-default">
				<!-- Default panel contents -->
					<div class="panel-heading">Registro</div>

					<!-- Table -->
					<table class="table">
						<tr><td>Data</td><td>Tipo</td><td>Descrizione</td><td>Importo</td></tr>
 						<?php if($num==0) { ?>
							<tr><td colspan=4>Nessuno log nel database...</td></tr>
						<?php } else {
							for($i=0; $i<$num; $i++){ ?>
								<tr>
									<td><?php echo $finanza[$i]['data']; ?></td>
									<td><?php echo $finanza[$i]['tipo']; ?></td>
									<td><?php echo $finanza[$i]['descrizione']; ?></td>
									<td><?php echo $finanza[$i]['importo']; ?></td>
									<?php
										echo "<td style='background-color:#FFFFFF' id='del".$finanza[$i]['id']."'></td>";
										$numeroMassimo = $finanza[$i]['id'];
									?>
								</tr>
						<?php }
							}
						echo "<script>var numeroProdotti=".$numeroMassimo.";</script>";
						?>
					</table>
				</div>

				<?php if($userRow['finanza']==2) { ?>
					<!-- Bottoni aggiungi e modifica! -->
					<button class="btn btn-danger" onclick="bottoniElimina(numeroProdotti)">Elimina</button>
					<a class="btn btn-success" href = 'aggiungiFinanza.php'>Aggiungi</a>
				<?php } ?>


					<?php
						$tot = 0;
						for($i=0; $i<$num; $i++){
							if($finanza[$i]['tipo']=="Entrata"){
								$tot+=$finanza[$i]['importo'];
							}else{
								$tot-=$finanza[$i]['importo'];
							}
						}



					?>

					<div class="btn btn-default" style="width:auto; float:right; font-size:20px;">
							Totale: <?php echo $tot; ?>
					</div>
					<?php } else { ?>
					<!-- Non autorizzato a visualizzare! -->
					Non autorizzato
				<?php } ?>



			</div>


		</div>

		<script>
			function bottoniElimina(n){
				for (i=1;i<=n;i++){
					if(document.getElementById("del"+i+"")){
						document.getElementById("del"+i+"").outerHTML="<td style='background-color:#FFFFFF;' id='eli"+i+"'><a href='eliminaFinanza.php?id="+i+"' style='font-size:25px;'><div class='glyphicon glyphicon-remove'></div></a></td>";
					} else if(document.getElementById("eli"+i+""))
							document.getElementById("eli"+i+"").outerHTML="<td style='background-color:#FFFFFF' id='del"+i+"'></td>";
				}
			}
		</script>

		<script src="assets/jquery-1.11.3-jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

	</body>
</html>
