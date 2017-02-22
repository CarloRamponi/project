<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aggiungi Finanza</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<?php
		$page=2;
		include 'header.php'
	?>

	<div id="wrapper">

	<div class="container">

    	<div class="page-header">
    	<h3>Aggiungi</h3>
    	</div>

         <form method="post" action="aggiungiFinanzaScript.php" autocomplete="off">

    	<div class="col-md-12">

        	<div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            	<input type="date" name="data" class="form-control" placeholder="Data" maxlength="150" />
                </div>
            </div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							<input type="text" name="descrizione" class="form-control" placeholder="Descrizione" maxlength="150" />
								</div>
						</div>

						<div class="form-group">
							<select class="form-control" name="tipo">
							<option>Entrata</option>
							<option>Uscita</option>
						</select>
						</div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-piggy-bank"></span></span>
            	<input type="text" name="importo" class="form-control" placeholder="Importo"/>
                </div>
            </div>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Aggiungi</button>
            </div>


        </div>

    </form>

    </div>

    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
