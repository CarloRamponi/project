<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modifica- <?php echo $userRow['username']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<?php
		$page=1;
		include 'header.php'
	?>

	<div id="wrapper">

	<div class="container">
    
    	<div class="page-header">
    	<h3>Modifica</h3>
    	</div>
        
         <form method="post" action="modificaProdotti.php" autocomplete="off">
    
    	<div class="col-md-12">
        
        	
        
        	<div class="form-group">
            	<hr />
            </div>
            
            
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
            	<input type="integer" name="codice" class="form-control" placeholder="Codice prodotto" value="0"/>
                </div>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
            	<input type="text" name="descrizione" class="form-control" placeholder="Descrizione del prodotto" maxlength="150" />
                </div>
            </div>
            
             <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-coins"></span></span>
            	<input type="text" name="iva" class="form-control" placeholder="Iva del prodotto" maxlength="150" />
                </div>
            </div>
            
             <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-money"></span></span>
            	<input type="text" name="prezzo" class="form-control" placeholder="prezzo unitario del prodotto" maxlength="150" />
                </div>
            </div>
            
            <div class="form-group">
            	<hr />
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
