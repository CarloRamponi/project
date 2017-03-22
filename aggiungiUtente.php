<html>
<head>
	<title>Aggiungi Utente</title>
	<?php
		if(!isset($_GET['type']))
			header('location: index.php');
		else {
			$type=$_GET['type'];
		}

		if(!isset($_GET['id']) && $type=="modifica"){
			header('location: index.php');
		}
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($type=="modifica") echo "Modifica utente"; else echo "Aggiungi Utente";?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<?php
		include 'header.php';
		if($type=="modifica"){
			$res=mysql_query("SELECT * from utenti where id='".$_GET['id']."'");
			$n=mysql_num_rows($res);
			if($n==0)
				header('location: index.php');
			$prodotto=mysql_fetch_array($res);
		}
	?>

	<div id="wrapper">

	<div class="container">

    	<div class="page-header">
    	<h3><?php if($type == "modifica") echo "Modifica utente"; else echo "Aggiungi utente"; ?></h3>
    	</div>

         <form method="post" <?php if($type=="modifica") echo 'action="modificaUtenteScript.php?id='.$prodotto['id'].'"'; else echo 'action="aggiungiUtenteScript.php"'; ?> 	<autocomplete="off">

    	<div class="col-md-12">

        	<div class="form-group">
            	<hr />
          </div>


            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="integer" name="nuovo_utente" class="form-control" placeholder="Nome utente" <?php if($type=="modifica") echo "value='".$prodotto['username']."'";?>/>
                </div>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="new_password1" class="form-control" placeholder="Password<?php if($type=="modifica") echo " (vuoto per invariato)"; ?>" maxlength="150"/>
                </div>
            </div>

             <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            		<input type="password" name="new_password2" class="form-control" placeholder="Conferma password" maxlength="150"/>
                </div>
            </div>




					<div class="form-group">
						<span class="col-md-2"><h4>Admin</h4></span>
					</div>


					<div class="form-group col-md-10">
						<select class="form-control" name="admin">
						<option>Nessuno</option>
						<option>Scrittura</option>
					</select>
					</div>






					<div class="form-group">
						<span class="col-md-2"><h4>Magazzino</h4></span>
					</div>


					<div class="form-group col-md-10">
						<select class="form-control" name="magazzino">
						<option>Nessuno</option>
						<option>Lettura</option>
						<option>Scrittura</option>
					</select>
					</div>



					<div class="form-group">
						<span class="col-md-2"><h4>Finanza</h4></span>
					</div>


					<div class="form-group col-md-10">
						<select class="form-control" name="finanza">
						<option>Nessuno</option>
						<option>Lettura</option>
						<option>Scrittura</option>
					</select>
					</div>


					<div class="form


					<div class="form-group col-md-10">
						<select class="form-control" name="vendite">
						<option>Nessuno</option>
						<option>Lettura</option>
						<option>Scrittura</option>
					</select>
					</div>

            <div class="form-group">
            	<hr />

				<?php
					if(isset($_GET['error'])){
						if($_GET['error']=="vuoto") {
							?><span class="text-danger">I campi non possono essere vuoti!</span><?php
						} else if($_GET['error']=="newPassword") {
						?><span class="text-danger">Le password non combaciano!</span><?php
					} else if ($_GET['error']=="utenteEsistente"){
						?><span class="text-danger">Utente già esistente</span><?php
					}
					}
				?>
            </div>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login"><?php if($type=="modifica") echo "Modifica"; else echo "Aggiungi"; ?></button>
            </div>


        </div>

    </form>

    </div>

    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
<!--Admin,Magazzino,Finanza
