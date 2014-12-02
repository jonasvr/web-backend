<?php
	if(isset($_COOKIE['login']))
	{
		$email = strstr($_COOKIE['login'], ',', true); //string uitlezen tot aan de eerste komma
		try
        {
            $db = new PDO('mysql:host=localhost;dbname=opdracht-security-login','root','');
            $query ='SELECT salt FROM users WHERE email = :email';
            $statement = $db->prepare($query);
            $statement->bindParam(':email',$email);
            $statement->execute();
            $row = $statement->fetch();
            
            $saltCookie=strstr($_COOKIE['login'], ',', false); //alles met en achter de eerste komma
            $checkHash = ','.hash('sha512', ($email.$row['salt'])); // extra komma vanwegen lijn hoger
        }
        catch ( PDOException $e ) // http://be2.php.net/manual/en/class.pdoexception.php
        {
            $_SESSION['notification']['message']=  'De connectie is mislukt.';
			$_SESSION['notification']['type']='error';
        }
	}else
	{
		redirect();
	}

	function redirect()
	{
		header ('location: login.php');
	}
?>

<?php if($saltCookie==$checkHash): ?>
<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include('header.php') ?>
	<h1>Dashboard</h1>
	<a href="artikel-overzicht.php">artikels</a>
</body>
</html>
<?php else: redirect(); endif ?>