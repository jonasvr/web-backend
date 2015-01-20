<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		$this->load->database();
		
	}

	public function login($data)
	{
		$user 	= 	$this->getData($data['email']);
		if($user)#1==true => hoort maar 1 gebruiker te zijn met dit mail adres
		{
			#ingegeven wachtwoord contat met salt en dan hash
			$checkPassword	=	hash('sha512',$user->salt.$data['password']);
			
			#kijken of opgeslagen hash met aangemaakte hash overeen komt
			if($user->hashed_password==$checkPassword)
			{
				return $user;
			}
			return false; #ww komt niet overeen
		}
		return false; #geen gebruiker gevonden
	}

	public function registreer($data)
	{
		$user 	= 	$this->getData($data['email']);
		if(!$user) #1==true => hoort maar 1 gebruiker te zijn met dit mail adres
			{
				#nieuwe gebruiker toevoegen
				$this->db->insert('Users', $data); 
				$user 	= 	$this->getData($data['email']);
				return $user;
			}
		return false;
	}

	public function getData($email)
	{
		$this->db->where('email',$email);
		$user = $this->db->get('Users')->row();
		return $user;
	}


	public function loggedin()
	{
		$user 			=	$this->validateUser();
		return $user;
	}



	public function validateUser()
	{

		$rawCookieData	= 	get_cookie("login");

		$cookieData 	=	explode(',', $rawCookieData);

		// Controleer of de cookie de juiste waarde heeft
		if (isset($cookieData[1]))
		{

			$cookieEmail		=	$cookieData[0];
			$cookieHashedEmail	=	$cookieData[1];

			$dbData				= 	$this->getData($cookieEmail);

			$dbSalt				=	$dbData->salt;

			// Create hash based on input 
			// Maak de hash met het emailadres dat uit het formulier komt en de salt dat uit de database komt
			$hashedEmail 		=	hash('SHA512', $cookieEmail . $dbSalt);

			if ($cookieHashedEmail === $hashedEmail)
			{
				return $cookieEmail;;
			}
			else
			{
				redirect('login/logout');
			}
		}
		else
		{
			return false;
		}
	}


}