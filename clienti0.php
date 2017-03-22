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

				<!-- Default panel contents -->
					<div class="panel-heading">Lista clienti</div>

					<!-- Table -->
					<frame src="clientiTable.php">
				</div>

				<?php if($userRow['vendite']==2){ ?>
					<!-- Bottoni aggiungi e modifica! -->
					<button class="btn btn-danger" onclick="bottoniElimina(numeroProdotti)">Elimina</button>
					<button class="btn btn-warning" onclick="bottoniModifica(numeroProdotti)">Modifica</button>
					<a class="btn btn-success" href = 'aggiungiCliente.php?type=aggiungi'>Aggiungi</a>
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
