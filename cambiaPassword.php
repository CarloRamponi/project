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
								<input id="pwd1" type="password" name="password" class="form-control" placeholder="Inserire la vecchia password" maxlength="32" />
								<button type="button" onclick="showHide1()" id="eye"/>
									<img src="eye.png" alt="eye" width="24" height="24"/>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span></span>
								<input id="pwd2" type="password" name="new_password1" class="form-control" placeholder="Inserire la nuova password" maxlength="32" />
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input id="pwd3" type="password" name="new_password2" class="form-control" placeholder="Reinserisci la nuova password" maxlength="32" />
							</div>
						</div>
						
			<?php
				if(isset($_GET['error'])){
					$error = $_GET['error'];
					if($error=="vuoto")
						echo '<span class="text-danger">I campi non possono essere vuoti</span>';
						
					if($error=="password")
						echo '<span class="text-danger">Password errata. Riprova.</span>';
						
					if($error=="newPasssword")
						echo '<span class="text-danger">Le pasword non combaciano</span>';
						
				}
				
			?>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Conferma</button>
            </div>

        </div>

    </form>

    </div>

    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
	 function show1()
	{
		var p = document.getElementById('pwd1');
		p.setAttribute('type','text');  
	}

	function hide1()
	{
		var p = document.getElementById('pwd1');
		p.setAttribute('type','password');   
	}

	function showHide1()
	{
		var input = document.getElementById("pwd1");
		if (input.getAttribute("type") === "password") {
			show1();
		} else {
			hide1();
		}
	}
	
		 function show2()
	{
		var p = document.getElementById('pwd2');
		p.setAttribute('type','text');  
	}

	function hide2()
	{
		var p = document.getElementById('pwd2');
		p.setAttribute('type','password');   
	}

	function showHide2()
	{
		var input = document.getElementById("pwd2");
		if (input.getAttribute("type") === "password") {
		show2();
		} else {
			hide2();
		}
	}
	
		 function show3()
	{
		var p = document.getElementById('pwd3');
		p.setAttribute('type','text');  
	}

	function hide3()
	{
		var p = document.getElementById('pwd3');
		p.setAttribute('type','password');   
	}

	function showHide3()
	{
		var input = document.getElementById("pwd3");
		if (input.getAttribute("type") === "password") {
		show3();
		} else {
			hide3();
		}
	}
 </script>

</body>
</html>






