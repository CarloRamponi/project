<html>
	<head>
	
		<style>
			table, th, td {
				border-collapse: collapse;
			}
			td:hover {
				background-color:#cc6600;
				color:blue;
			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Benvenuto - <?php echo $userRow['username']; ?></title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>

		<?php
			$page=1;
			include 'header.php'
		?>
		
		<div id="wrapper">

			<div class="container">
		
				<div class="page-header">
				<h3>Magazzino</h3>
				</div>
			
				<div class="panel panel-default">
				<!-- Default panel contents -->
					<div class="panel-heading">Elenco Prodotti</div>

					<!-- Table -->
					<table class="table">
						<tr>
							<td>codici</td>
							<td>descrizione prodotti</td>
							<td>um</td>
						</tr>
					</table>
				</div>
		
			</div>
		
		</div>
		
		<script src="assets/jquery-1.11.3-jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
	</body>
</html>

