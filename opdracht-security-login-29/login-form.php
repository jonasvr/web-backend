<?php
session_start();
if(isset($_COOCKIE['login']))
	{
		
		header('location: dashboard.php');
	}
include('redirect-dashboard.php');
?><!Doctype html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Inloggen</h1>
	<?php if(isset($_SESSION['notification'])): ?>
		<h3><?= $_SESSION['notification'] ?></h3>
	<?php endif ?>
        <form action='login-process.php' method='post'>
            <ul>
                <li>
                    <label for="email">e-mail</label>
                    <input type="text" id="email" name="email">
                </li>
                <li>
                    <label for="password">paswoord</label>
                    <input type="password" id="password" name="password">
                </li>
            </ul>
            <input type="submit" value="Inloggen">
        </form>

        <p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a>.</p>
</body>
</html>