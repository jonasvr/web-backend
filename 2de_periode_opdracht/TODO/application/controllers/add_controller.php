<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		
		$this->load->model('add_model');
		$this->load->model('login_model');
		
		$this->load->library('session');
	}

	public function index()
	{
		$login 				=	$this->login_model->loggedin();
		
		if(!$login)
		{
			redirect('home');
		}
		else
		{	
			//titel doorgeven naar de header
			$data['title']	=	'Voeg een TODO-item toe';
			$data['login']	= 	$login;
		}

		$this->load->helper('url'); //to make urls work
		$this->load->helper('form');//to create forms
		$this->load->view('templates/header',$data);
		$this->load->view('add',$data);
		$this->load->view('templates/footer');
	}

	public function toevoegen() #nieuwe taak toevoegen
	{
		$this->load->library('form_validation'); 
		if ($this->form_validation->run('toevoegen')) #nakijken of het formulier ingevult is
		{
			#data voorbereiden om naar database te sturen
			$rawCookieData		= 	get_cookie("login");
			$cookieData 		=	explode(',', $rawCookieData);
			$cookieEmail		=	$cookieData[0];
			$data['FK_users'] 			= 	$this->add_model->getID($cookieEmail);
			$data['omschrijving'] 		=	$this->input->post('description');

			#dataverzenden
			$this->add_model->toevoegen($data);
			$this->session->set_flashdata('success', 'Todo "'. $data['omschrijving'] . '" toegevoegd.');
			#terug sturen naar todo
			redirect('todo');
		}
		else
		{	
			#terug naar het formulier sturen
			$this->index();
		}
	}

}