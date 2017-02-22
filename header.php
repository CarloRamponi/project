<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM utenti WHERE username='".$_SESSION['user']."'");
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
	 <script>
		$(function() { 
			$('#staticParent').on('keydown', '#child', function(e){
				-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()}); }) 
	</script>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Gestione Simulimpresa</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if($page==1) echo "active"; ?>"><a href="magazzino.php">Magazzino</a></li>
            <li class="<?php if($page==2) echo "active"; ?>"><a href="finanza.php">Finanza</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  			<span class="glyphicon glyphicon-user"></span>&nbsp;Ciao <?php echo $userRow['username']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
								<?php if($userRow['admin']==1) { ?>
									<li><a href="gestioneUtenti.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Gestione Utenti</a></li>
								<?php } ?>
								<li><a href="cambiaPassword.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Cambia Password</a></li>
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Esci</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
