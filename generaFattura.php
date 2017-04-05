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

    	<div class="col-md-12">

        	<div class="form-group">
            	<hr />
            </div>

            <div class="col-md-6">
                <div class="col-md-3">
                    Fattura n.
                </div>
                <div class="col-md-9">
                    <input class="form-control" name="numeroFattura" type="number">
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-3">
                    Data
                </div>
                <div class="col-md-9">
                    <input class="form-control" name="data" type="date">
                </div>
            </div>


            <div class="form-group">
                <br><br>
            </div>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Genera</button>
            </div>


        </div>

    </form>

    </div>

    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>
