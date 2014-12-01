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

	if ($_POST['password']!='' && $_POST['email']!='')
	{	
		echo "all set";
		$email=$_POST['email'];
		$password=$_POST['password'];
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		echo $email.' is een correcte mail';
		}else{
			echo $email.' is geen correcte mail';
		}
	
	}
	else
	{
		
		$_SESSION['email']=$_POST['email'];
		$_SESSION['pasWoord'] = $_POST['password'];
		//redirect();
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
			header( 'Location: security-login.php' );
		}
?>