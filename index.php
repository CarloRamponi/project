<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		if($_SESSION['user']=="magazzino")
			header("Location: magazzino.php");
		else if($_SESSION['user']=="finanza"){
			header("Location: finanza.php");
		} else {
			header("Location: magazzino.php");
		}
		exit;
	}
	$error = false;
	if( isset($_POST['btn-login']) ) {
		// prevent sql injections/ clear user invalid inputs
		$username=$_POST['user'];
		$pass = $_POST['pass'];
		if(empty($username)){
			$error = true;
			$usernameError = "Inserisci l'username!";
		}
		if(empty($pass)){
			$error = true;
			$passError = "Inserisci la password!";
		}
		// if there's no error, continue to login
		if (!$error) {
			$password = $pass;
			$res=mysql_query("SELECT password FROM utenti WHERE username='$username'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			if( $count == 1 && $row['password']==$password ) {
				$_SESSION['user'] = $username;
				header("Location: index.php");
			} else {
				$errMSG = "Credenziali errate";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestione Simulimpresa</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

    	<div class="col-md-12">

        	<div class="form-group">
            	<h2 class="">Accesso</h2>
            </div>

        	<div class="form-group">
            	<hr />
            </div>

            <?php
			if ( isset($errMSG) ) {
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="user" class="form-control" placeholder="Username" value="<?php echo $username; ?>" maxlength="50" />
                </div>
                <span class="text-danger"><?php echo $usernameError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Password" maxlength="50" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Accedi</button>
            </div>


        </div>

    </form>
    </div>

</div>

</body>
</html>
<?php ob_end_flush(); ?>
