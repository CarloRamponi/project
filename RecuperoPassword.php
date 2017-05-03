<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recupero password</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<div id="wrapper">

	<div class="container">

    	<div class="page-header">
    	<h3>Pagina recupero Password</h3>
    	</div>

         <form method="post" action="modificaPassword.php" autocomplete="off">

		    	<div class="col-md-12">

		        	<div class="form-group">
		            	<hr />
		        </div>


						<div class="form-group">
							<div class="input-group">
								<span class="glyphicon glyphicon-info-sign" class="input-group-addon"></span>
								<input id="pwd2" type="text" name="new_password1" class="form-control" placeholder="Inserire l'email" />
							</div>
						</div>




            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Invia mail di recupero</button>
            </div>

        </div>

    </form>

    </div>

    </div>



</body>
</html>
