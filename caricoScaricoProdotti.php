<html>
	<head>

		<style>
			td:nth-child(odd),th:nth-child(odd){
				background-color: #f2f2f2;
			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>GS - Magazzino</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>

		<?php
			$page=1;
			include 'header.php';
			if(isset($_GET['codice'])){
				$codice = $_GET['codice'];
			} else {
				header('location: magazzino.php');
			}
			$res=mysql_query("SELECT * from prodotti WHERE codice=".$codice."");
			$n=mysql_num_rows($res);
			if($n==0){
				header('location: magazzino.php');
			} else {
				$res = mysql_query("SELECT * FROM log WHERE codice=".$codice."");
				$num = mysql_num_rows($res);
				if($num){
					$log=mysql_fetch_array($res);
				}
			}
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
					<div class="panel-heading">Registro</div>

					<!-- Table -->
					<table class="table">
						<tr><td>Data</td><td>Tipo</td><td>Quantità</td></tr>
 						<?php if($num==0) { ?>
							<tr><td colspan=3>Nessuno log nel database...</td></tr>
						<?php } else {
							for($i=0; $i<$num; $i++){ ?>
								<tr>
									<td><?php echo $log[$i]['data']; ?></td>
									<td><?php echo $log[$i]['tipo']; ?></td>
									<td><?php echo $log[$i]['quantita']; ?></td>
									<?php echo "<td style='background-color:#FFFFFF' id='del".$log[$i]['id']."'></td>"; ?>
								</tr>
						<?php }
							}
						$numeroMassimo = $log[$i]['id'];
						echo "<script>var numeroProdotti=".$num.";</script>";
						?>
					</table>
				</div>

					<?php if($userRow['magazzino']==2) { ?>
					<!-- Bottoni aggiungi e modifica! -->
					<button class="btn btn-danger" onclick="bottoniElimina(numeroProdotti)">Elimina</button>
					<button class="btn btn-success" onclick="Location.href = 'aggiungiMagazzino.php'">Aggiungi</button>
					<?php } ?>
				<?php } else { ?>
					<!-- Non autorizzato a visualizzare! -->
					Non autorizzato
				<?php } ?>

			</div>


		</div>


		<script src="assets/jquery-1.11.3-jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

	</body>
</html>
