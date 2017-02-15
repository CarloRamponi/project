<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cambio password</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<?php
		include 'header.php';
	?>

	<div id="wrapper">

	<div class="container">

    	<div class="page-header">
    	<h3>Pagina cambio password</h3>
    	</div>

         <form method="post" action="modificaPassword.php" autocomplete="off">

    	<div class="col-md-12">

        	<div class="form-group">
            	<hr />
        </div>


	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="Inserire la vecchia password" class="form-control" placeholder="Inserire la vecchia password" maxlength="32" />
		</div>
	</div>

	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span></span>
			<input type="password" name="Inserire la nuova password" class="form-control" placeholder="Inserire la nuova password" maxlength="32" />
		</div>
	</div>

	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="Reinserisci la nuova password" class="form-control" placeholder="Reinserisci la nuova password" maxlength="32" />
		</div>
	</div>



            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Conferma</button>
            </div>


        </div>

    </form>

    </div>

    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
