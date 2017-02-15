<?php

    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
    }

    require_once 'dbconnect.php';


	$password = $_POST['password'];
	$new_password1 = $_POST['new_password1'];
	$new_password2 = $_POST['new_password2'];
	
	$res= mysql_query("SELECT password from utenti where username=".$_SESSION['user'].";");
	$row = mysql_fetch_array($res);
	$v_pass = $row[0];
	
	if($password=="" || $new_password1=="" || $new_password2==""){
		header("location: cambioPassword.php?error=vuoto");	
	}	
	if($v_pass!=$password){
		header("location: cambioPassword.php?error=password");
	}
	if($new_password1!=$new_password2){
		header("location: cambioPassword.php?error=newPassword");
	}
	mysql_query("UPDATE utenti SET password=".$new_password1." WHERE username=".$_SESSION['user'].";");
    header("location: index.php");
    
?>
