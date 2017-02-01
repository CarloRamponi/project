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
			$res=mysql_query("SELECT * from materie WHERE codice=".$codice.";");
			$n=mysql_num_rows($res);
			if($n==0){
				header('location: magazzino.php');
			} else {
				$res = mysql_query("SELECT * FROM logMaterie WHERE codice=".$codice.";");
				$num = mysql_num_rows($res);
				if($num){
					for($i=0; $i<$num; $i++)
						$log[$i]=mysql_fetch_array($res);
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
									<?php
										echo "<td style='background-color:#FFFFFF' id='del".$log[$i]['id']."'></td>";
										$numeroMassimo = $log[$i]['id'];
									?>
								</tr>
						<?php }
							}
						echo "<script>var numeroProdotti=".$numeroMassimo.";</script>";
						?>
					</table>
				</div>

					<?php if($userRow['magazzino']==2) { ?>
					<!-- Bottoni aggiungi e modifica! -->
					<button class="btn btn-danger" onclick="bottoniElimina(numeroProdotti)">Elimina</button>
					<a class="btn btn-success" href = 'aggiungiLogMateriePrime.php?codice=<?php echo $codice; ?>'>Aggiungi</a>
					<?php } ?>
				<?php } else { ?>
					<!-- Non autorizzato a visualizzare! -->
					Non autorizzato
				<?php } ?>


				<?php
					$tot = 0;
					for($i=0; $i<$num; $i++){
						if($log[$i]['tipo']=="Carico"){
							$tot+=$log[$i]['quantita'];
						}else{
							$tot-=$log[$i]['quantita'];
						}
					}
				?>

				
				<div class="btn btn-default" style="width:auto; float:right; font-size:20px;">
						Totale: <?php echo $tot; ?>
				</div>

			</div>


		</div>

		<script>
			function bottoniElimina(n){
				for (i=1;i<=n;i++){
					if(document.getElementById("del"+i+"")){
						document.getElementById("del"+i+"").outerHTML="<td style='background-color:#FFFFFF;' id='eli"+i+"'><a href='eliminaLogScriptMateriePrime.php?id="+i+"' style='font-size:25px;'><div class='glyphicon glyphicon-remove'></div></a></td>";
					} else if(document.getElementById("eli"+i+""))
							document.getElementById("eli"+i+"").outerHTML="<td style='background-color:#FFFFFF' id='del"+i+"'></td>";
				}
			}
		</script>

		<script src="assets/jquery-1.11.3-jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

	</body>
</html>
