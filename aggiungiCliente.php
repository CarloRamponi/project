<html>
<head>
	<?php
		if(!isset($_GET['type']))
			header('location: clienti.php');
		else {
			$type=$_GET['type'];
		}

		if(!isset($_GET['id']) && $type=="modifica"){
			header('location: clienti.php');
		}
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($type=="modifica") echo "Modifica Cliente - Simulimpresa"; else echo "Aggiungi Cliente - Simulimpresa";?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<?php
		$page=3;
		include 'header.php';
		if($type=="modifica"){
			$res=mysql_query("SELECT * from clienti where id='".$_GET['id']."'");
			$n=mysql_num_rows($res);
			if($n==0)
				header('location: clienti.php');
			$clienti=mysql_fetch_array($res);
		}
	?>

	<div id="wrapper">

	<div class="container">

    	<div class="page-header">
    	<h3><?php if($type == "modifica") echo "Modifica"; else echo "Aggiungi"; ?></h3>
    	</div>

         <form method="post" <?php if($type=="modifica") echo 'action="modificaClienteScript.php?id='.$clienti['id'].'"'; else echo 'action="aggiungiClienteScript.php"'; ?> autocomplete="off">

    	<div class="col-md-12">

        	<div class="form-group">
            	<hr />
            </div>


            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
            	<input type="integer" name="codice" class="form-control" placeholder="Codice Cliente*" <?php if($type=="modifica") echo "value='".$clienti['codice']."'";?>/>
                </div>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
            	<input type="text" name="nome" class="form-control" placeholder="Nome Azienda*" maxlength="50" <?php if($type=="modifica") echo "value='".$clienti['nome']."'";?>/>
                </div>
            </div>

             <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-chevron-right"></span></span>
            	<input type="text" name="pi" class="form-control" placeholder="PI/CF" maxlength="30" <?php if($type=="modifica") echo "value='".$clienti['pi']."'";?>/>
                </div>
            </div>

             <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
            	<input type="text" name="via" class="form-control" placeholder="Indirizzo" maxlength="100" <?php if($type=="modifica") echo "value='".$clienti['via']."'";?>/>
                </div>
            </div>

            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
             <input type="integer" name="cap" class="form-control" placeholder="CAP"<?php if($type=="modifica") echo "value='".$clienti['cap']."'";?>/>
               </div>
            </div>

            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
             <input type="text" name="citta" class="form-control" placeholder="Città" maxlength="50" <?php if($type=="modifica") echo "value='".$clienti['citta']."'";?>/>
               </div>
           </div>

           <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
            <input type="integer" name="telefono" class="form-control" placeholder="Telefono" <?php if($type=="modifica") echo "value='".$clienti['telefono']."'";?>/>
              </div>
          </div>

          <div class="form-group">
           <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
           <input type="integer" name="fax" class="form-control" placeholder="Fax" <?php if($type=="modifica") echo "value='".$clienti['fax']."'";?>/>
             </div>
         </div>

        <div class="form-group">
         <div class="input-group">
           <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
         <input type="text" name="mail" class="form-control" placeholder="E-mail" maxlength="100" <?php if($type=="modifica") echo "value='".$clienti['mail']."'";?>/>
           </div>
       </div>

       <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
        <input type="integer" name="iban" class="form-control" placeholder="Iban"<?php if($type=="modifica") echo "value='".$clienti['iban']."'";?>/>
          </div>
      </div>

       <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
        <input type="text" name="banca" class="form-control" placeholder="Banca d'appoggio" maxlength="200" <?php if($type=="modifica") echo "value='".$clienti['banca']."'";?>/>
          </div>
       </div>

       <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
        <input type="text" name="pagamento" class="form-control" placeholder="Modalità di pagamento" maxlength="100" <?php if($type=="modifica") echo "value='".$clienti['pagamento']."'";?>/>
          </div>
      </div>

      <div class="form-group">
       <div class="input-group">
         <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
       <input type="text" name="scadenza" class="form-control" placeholder="Scadenza" maxlength="100" <?php if($type=="modifica") echo "value='".$clienti['scadenza']."'";?>/>
         </div>
     </div>

     <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
      <input type="text" name="annotazioni" class="form-control" placeholder="Annotazioni" maxlength="300" <?php if($type=="modifica") echo "value='".$clienti['annotazioni']."'";?>/>
        </div>
    </div>

    <div class="form-group">
     <div class="input-group">
       <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
     <input type="text" name="orari" class="form-control" placeholder="Giorni di Attività" maxlength="100" <?php if($type=="modifica") echo "value='".$clienti['orari']."'";?>/>
       </div>
   </div>

   <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
    <input type="text" name="sito" class="form-control" placeholder="Sito" maxlength="100" <?php if($type=="modifica") echo "value='".$clienti['sito']."'";?>/>
      </div>
  </div>

            <div class="form-group">
            <div class="form-group">
            	<hr />
				<?php
					if(isset($_GET['error'])){
						if($_GET['error']=="vuoto")
						?><span class="text-danger">I campi  obbligatori non possono essere vuoti!</span><?php
            if($_GET['error']=="clienteEsistente")
            ?><span class="text-danger">Il codice inserito è gia esistente!</span><?php
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>
