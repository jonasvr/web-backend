<?php
	session_start();
	//unset($_COOKIE['login']);
	setcookie("login", "", time()-60*60*24*30);
	//echo $_COOKIE['login'];
	$_SESSION['notification']['message']='U bent uitgelogd. Tot de volgende keer.';
	//echo $_SESSION['notification'];
	header('location: login-form.php');
?>