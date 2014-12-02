<?php
	session_start();
	try
        {
        	$email=$_POST['email'];
            $db = new PDO('mysql:host=localhost;dbname=opdracht-security-login','root','');
           	$query = 'SELECT * FROM users where email = :email';
           	$statement=$db->prepare($query);
           	$statement->bindParam(':email',$email);
           	$statement->execute();
           	$row = $statement->fetch();
           	
           	if($row != false)
           	{	
           		$passWord=$_POST['password'];
           		$salt=$row['salt'];
           		$hashPass=$row['hashed_password'];

           		//var_dump( $hashPass);
           		//var_dump( hash('sha512',($salt.$password)));
           		

           		if (hash('sha512',($salt.$password))==$hashPass)
           		{
           			setcookie('login', $email.','.hash('sha512',($email.$salt)), time()+(60*60*24*30)); 
           			header('location: dashboard.php');
           		}
           		else
           		{
           			echo 'false';
           			$_SESSION['notification']="Het ingegeven wachtwoord komt niet overeen.";
           		}
           	}
           	else
           	{	
           		$_SESSION['notification']="Het ingegeven email adres werd niet terug gevonden.";
           		redirect();
           	}

        }
        catch ( PDOException $e ) // http://be2.php.net/manual/en/class.pdoexception.php
        {
            $_SESSION['notification']['message']=  'De connectie is mislukt.';
			$_SESSION['notification']['type']='error';
		}

		function redirect()
		{
			header('location: login-form.php');
		}          

?>

<html>
<body>
	<pre><?= print_r($row); ?></pre>
</body>
</html>