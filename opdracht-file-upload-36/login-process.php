<?php
	session_start();
	try
        {
        	  $email=$_POST['email'];
            $db = new PDO('mysql:host=localhost;dbname=opdracht-upload','root','');
           	$query = 'SELECT * FROM users where email = :email';
           	$statement=$db->prepare($query);
           	$statement->bindParam(':email',$email);
           	$statement->execute();
           	$row = $statement->fetch();
           	
           	if($row != false)
           	{	
           		$password=$_POST['password'];
           		$salt=$row['salt'];
           		$hashPass=$row['hashed_password'];
              
           		if (hash('sha512',($salt.$password))==$hashPass)
           		{
           			setcookie('login', $email.','.hash('sha512',($email.$salt)), time()+(60*60*24*30)); 
           			unset($_SESSION['notification']);
                header('location: dashboard.php');
           		}
           		else
           		{
           			echo 'false';
           			$_SESSION['notification']['message']="Het ingegeven wachtwoord komt niet overeen.";
                redirect();
           		}
           	}
           	else
           	{	
           		$_SESSION['notification']['message']="Het ingegeven email adres werd niet terug gevonden.";
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
</body>
</html>