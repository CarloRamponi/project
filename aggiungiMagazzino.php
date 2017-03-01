<html>
<head>
	<?php
		if(!isset($_GET['type']))
			header('location: magazzino.php');
		else {
			$type=$_GET['type'];
		}

		if(!isset($_GET['id']) && $type=="modifica"){
			header('location: magazzino.php');
		}
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($type=="modifica") echo "Modifica prodotto - Simulimpresa"; else echo "Aggiungi prodotto - Simulimpresa";?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<?php
		$page=1;
		include 'header.php';
		if($type=="modifica"){
			$res=mysql_query("SELECT * from prodotti where id='".$_GET['id']."'");
			$n=mysql_num_rows($res);
			if($n==0)
				header('location: magazzino.php');
			$prodotto=mysql_fetch_array($res);
		}
	?>

	<div id="wrapper">

	<div class="container">

    	<div class="page-header">
    	<h3><?php if($type == "modifica") echo "Modifica"; else echo "Aggiungi"; ?></h3>
    	</div>

         <form method="post" <?php if($type=="modifica") echo 'action="modificaProdottoScript.php?id='.$prodotto['id'].'"'; else echo 'action="aggiungiProdottoScript.php"'; ?> autocomplete="off">

    	<div class="col-md-12">

        	<div class="form-group">
            	<hr />
            </div>


            <div class="form-group" id="staticParent">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
            	<input id="child" type="integer" name="codice" class="form-control" placeholder="Codice prodotto" maxlength="13" <?php if($type=="modifica") echo "value='".$prodotto['codice']."'";?>/>
                </div>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
            	<input type="text" name="descrizione" class="form-control" placeholder="Descrizione del prodotto" maxlength="150" <?php if($type=="modifica") echo "value='".$prodotto['descrizione']."'";?>/>
                </div>
            </div>

             <div class="form-group" id="staticParent2">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-chevron-right"></span></span>
            	<input id="child2" type="text" name="iva" class="form-control" placeholder="Iva del prodotto" maxlength="150" <?php if($type=="modifica") echo "value='".$prodotto['iva']."'";?>/>
                </div>
            </div>

             <div class="form-group" id="staticParent1">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
            	<input id="child1" type="text" name="prezzo" class="form-control" placeholder="Prezzo unitario del prodotto" maxlength="150" <?php if($type=="modifica") echo "value='".$prodotto['prezzo']."'";?>/>
                </div>
            </div>

            <div class="form-group">
            	<hr />
				<?php
					if(isset($_GET['error'])){
						if($_GET['error']=="vuoto")
						?><span class="text-danger">I campi non possono essere vuoti!</span><?php
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
	 <script>
		$(function() { 
			$('#staticParent1').on('keydown', '#child1', function(e){
				-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()}); }) 
	</script>
	 <script>
		$(function() { 
			$('#staticParent2').on('keydown', '#child2', function(e){
				-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()}); }) 
	</script>

</body>
</html>
