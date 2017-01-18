<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aggiungi Log<?php echo $userRow['username']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<?php
		if(!isset($_GET['codice']))
			header('location: caricoScaricoProdotti.php');
		$page=1;
		include 'header.php'
	?>

	<div id="wrapper">

	<div class="container">

    	<div class="page-header">
    	<h3>Aggiungi</h3>
    	</div>

         <form method="post" action="aggiungiLogScript.php?codice=<?php echo $_GET['codice']; ?>" autocomplete="off">

    	<div class="col-md-12">



        	<div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            	<input type="date" name="data" class="form-control" placeholder="data" maxlength="150" />
                </div>
            </div>


             <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-piggy-bank"></span></span>
            	<input type="text" name="quantita" class="form-control" placeholder="quantità"/>
                </div>
            </div>
            
            <div class="form-group">
            	<select class="form-control" name="tipo">
					<option>Carico</option>
					<option>Scarico</option>
				</select>
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
