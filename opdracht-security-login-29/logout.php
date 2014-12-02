<?php
	session_start();
	unset($_COOCKIE['login']);
	$_SESSION['notification']='U bent uitgelogd. Tot de volgende keer.';
	header('location: login-form.php');
?>