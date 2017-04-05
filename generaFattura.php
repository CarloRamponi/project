<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Genera fattura</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />ì
</head>
<body>

	<?php
		$page=3;
		include 'header.php';
	?>

	<div id="wrapper">

        <div class="container">

            <div class="page-header">
            <h3>Genera Fattura</h3>
            </div>

            <form method="post" action="generaFattura.php" autocomplete="off">

                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon">Numero fattura: </span>
                        <input class="form-control" name="numeroFattura" type="number" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon">Data:</span>
                        <input class="form-control" name="data" type="date" />
                    </div>
                </div>

                <div>
                    <br><br>

                    <h4>Dati cliente</h4>

                    <br>

                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Codice cliente</span>
                            <select class="form-control" name="codiceCliente">
                                <option>Pavel</option>
                                <option>Ilie</option>
                                <option>Rebenciuc</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Banca d'appoggio:</span>
                            <input class="form-control" type="text" disabled />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Scadenza:</span>
                            <input class="form-control" type="text" disabled />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Modalità di pagamento:</span>
                            <input class="form-control" type="text" disabled />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">IBAN:</span>
                            <input class="form-control" type="text" disabled />
                        </div>
                    </div>

                    <br><br><hr>
                </div>

                <br><br><br>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-block btn-primary" name="btn-login">Genera</button>
                </div>

            </form>

        </div>

    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>
