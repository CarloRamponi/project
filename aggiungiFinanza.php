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

            <div class="form-group" id="staticParent1">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-piggy-bank"></span></span>
            	<input id="child1" type="text" name="importo" class="form-control" placeholder="Importo"/>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
	 <script>
		$(function() { 
			$('#staticParent1').on('keydown', '#child1', function(e){
				-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()}); }) 
	</script>
	 

</body>
</html>
