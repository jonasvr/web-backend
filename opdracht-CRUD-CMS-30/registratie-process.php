<?php
	session_start();

	if (isset($_POST['generatePassword']))
		{
			//echo 'generate';
			$_SESSION['pasWoord']=generatePassword();
			$_SESSION['inputType']="text";
			$_SESSION['email']=$_POST['email'];

			redirect();
		}
	if(isset($_POST['registreer']))
	{
	//	echo 'registreer';
		if ($_POST['password']!='' && $_POST['email']!='')
		{	
			//echo "all set";
			$email=$_POST['email'];
			$password=$_POST['password'];
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
				// controleren of het een geldige mail is
				// =>http://be2.php.net/manual/en/function.filter-var.php
	    		$_SESSION['notification']['message']= $email.' is een correcte mail';
				$_SESSION['notification']['type']='success';

				try
			        {
			            $db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms','root','');
			            $_SESSION['email']=$_POST['email'];
			            //kijken of er al een gebruiker met dit mail adres bestaat
			            $query ='SELECT * FROM users WHERE email = :email';
			            $statement = $db->prepare($query);
			            $statement->bindParam(':email',$_POST[ 'email' ]);
			            $unique = $statement->execute();

			            $row=$statement->fetch(PDO::FETCH_ASSOC); //geeft of array (als er data is) of false (geen data)
			            if($row==false) 
			            {
				            //nieuwe user query toevoegen
				            $query = 'INSERT INTO users (email, salt, hashed_password, last_login_time) 
				                                   VALUES(:email, :salt, :hashed_password, now())';
				            
				            $statement = $db->prepare($query);
				            $salt= uniqid(mt_rand(), true); //http://php.net/manual/en/function.uniqid.php
				            $saltedPassWord = $salt.$_SESSION['passWord']; 
				            $hash = hash('sha512',$saltedPassWord);//http://php.net/manual/en/function.hash.php
				          	$email= $_POST['email'];

				            $statement->bindParam( ':email', $email);
				            $statement->bindParam( ':salt', $salt );
				            $statement->bindParam( ':hashed_password', $hash );
				           	$toegevoegd = $statement->execute();
				           	
				           	setcookie("login", $email.','.hash('sha512',($email.$salt)), time()+(60*60*24*30));  /* expire in 30 dagen */
				           	session_destroy();
				          	header( 'Location: dashboard.php' );
			           }else //er is een gebruiker met deze mail
			           {
			           		$_SESSION['notification']['message']=  'Er is reeds een gebruiker met deze mail.';
							$_SESSION['notification']['type']='error';
							redirect();
			           }
			        }

			    catch ( PDOException $e ) // http://be2.php.net/manual/en/class.pdoexception.php
			        {
			            $_SESSION['notification']['message']=  'De connectie is mislukt.';
						$_SESSION['notification']['type']='error';
						redirect();
			        }

			}else{
				$_SESSION['notification']['message']=  $email.' is geen correcte mail';
				$_SESSION['notification']['type']='error';
				redirect();
			}
			
		}
		else
		{
		//echo 'in';	
			$_SESSION['email']=$_POST['email'];
			$_SESSION['pasWoord'] = $_POST['password'];
			redirect();
		}
		
	}else
	{
		echo 'not registreer';
	}

	function generatePassword()
	{
		$aantalUpper="3";
		$aantalLower="3";
		$aantalCijfers="3";
		$aantalSpeciaal="3";
		//$totaalLengte= $aantalSpeciaal + $aantalCijfers + $aantalLower + $aantalUpper;

		$pasWoord =array();
		for($i=0;$i<$aantalUpper;$i++)
		{
			$pasWoord[]=chr(rand(65,90));//random upper
		}
		for($i=0;$i<$aantalLower;$i++)
		{
			$pasWoord[]=chr(rand(97,122));//randon lower
		}
		for($i=0;$i<$aantalSpeciaal;$i++)
		{
			$pasWoord[]=chr(rand(33,46));//random special
		}
		for($i=0;$i<$aantalCijfers;$i++)
		{
			$pasWoord[]=chr(rand(48,58));//random cijfer
		}
		shuffle($pasWoord);
		$strPasWoord="";
		foreach ($pasWoord as $char) {
			$strPasWoord.=$char;
		}
		return $strPasWoord;
	}

	function redirect()//naar registration
		{
			header( 'Location:  registratie-form.php' );
		}
?>