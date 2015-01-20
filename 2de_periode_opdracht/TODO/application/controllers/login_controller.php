<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	
		$this->load->helper('url');
		$this->load->helper('cookie');

		$this->load->model('login_model');

		$this->load->library('session');
	}

	public function index()
	{
		//titel doorgeven naar de header
		$data['title']='Meld je aan.';
		$data['type']='login';//login of registreer form
		$this->load_page($data);
	}

	public function registreer_pagina()
	{

		//titel doorgeven naar de header
		$data['title']='Registreer';
		$data['type']='registreer';//login of registreer form
		$this->load_page($data);
		
	}

	public function load_page($data)
	{
		
		$login			= 	$this->login_model->loggedin();

		if($login != FALSE)
		{
			redirect('dashboard');
		}
		else
		{
			$data['login']=$login;
		}

		$this->load->helper('url'); //to make urls work
		$this->load->helper('form');//to create forms
		$this->load->view('templates/header',$data);
		$this->load->view('login',$data);
		$this->load->view('templates/footer');
	}

	public function validate_form()
	{
		$this->load->library('form_validation'); #om fout meldingen van het formulier te geven
		if ($this->form_validation->run('loginform') == FALSE)
		{
			if ($this->input->post('type')=='login') #nakijken of het van het login form of registratie form komt om terug te sturen
			{
				$this->index();
			}
			else
			{
				$this->registreer_pagina();
			}
		}
		else
		{
			$data 			= 	array();
			$data['email']	=	$this->input->post('email');

			if ($this->input->post('type')=='login') #nakijken of het van het login form of registratie form komt
			{
				#data preppen om in te loggen & en ophalen
				$data['password']	=	$this->input->post('password');
				$login 				= 	$this->login_model->login($data);

				if($login !=false) #kijken of het inloggen lukt met de gekregen gegevens
				{
					$this->create_cookie($login);
					$this->session->set_flashdata('success', 'Pfieuw, het aanmelden is goed verlopen. Welkom!');
					redirect('dashboard'); #gaat naar dashboard moeten
				}
				else
				{
					$this->session->set_flashdata('errors', 'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw');
					redirect('login');
				}
			}
			elseif($this->input->post('type')=='registreer')
			{
				//echo 'registreer';
				$this->load->helper('date');
				$data['salt']					= 	uniqid(mt_rand(), true); //http://php.net/manual/en/function.uniqid.php
	            $saltedPassWord 				= 	$data['salt'].$this->input->post('password'); 
				$data['hashed_password']		= 	hash('sha512',$saltedPassWord);
				//var_dump($data);
				$registreer 					= 	$this->login_model->registreer($data);
				
				if($registreer !=false)
				{
					$this->create_cookie($registreer);
					$this->session->set_flashdata('success', 'Pfieuw, het registreren is gelukt. Welkom!');
					redirect('dashboard'); #gaat naar dashboard moeten
				}
				else //als de gebruiker al bestaat
				{
					$this->session->set_flashdata('errors', 'Dit mail adres is al in gebruik.');
					redirect('login/registreer_pagina');
				}
			}
			else
			{
				$this->session->set_flashdata('errors', 'Pruts niet met de code.');
				redirect('home');
			}
		}
	}

	public function create_cookie($data)
	{
		$hashedEmail	=	hash('SHA512', $data->email . $data->salt);
		$cookieValue	=	$data->email . ',' . $hashedEmail;

		$cookie = array(
				    'name'		=> 'login',
				    'value'		=> $cookieValue,
				    'expire' 	=> time()+(60*60*24*30),
				    );

		$this->input->set_cookie($cookie); 
	}

	public function logout()
	{
		//echo 'logged out';
		delete_cookie('login');
		$this->session->set_flashdata('success', 'Je bent afgemeld. Tot de volgende keer!');
					
		redirect('home');
	}
}
