
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recupero password</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>


	<?php

	require_once 'swiftmailer/lib/swift_required_pear.php';

	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
	                          ->setUsername('s-elias.ennajimi@istitutopilati.it')
	                          ->setPassword('17082000');

	$mailer = Swift_Mailer::newInstance($transport);

	$msg = Swift_Message::newInstance('LUCCHINI SPAMMER')
	   ->setFrom(array('s-elias.ennajimi@istitutopilati.it' => 'LUCCHINI MEME'))
	        ->setBody("LUCCHINI INVIA MEME")
	   ->setTo(array("$email" => "s-alessandro.lucchini@istitutopilati.it"))
	  ;

	$numSent = $mailer->send($msg);


	?>

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
								  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
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
