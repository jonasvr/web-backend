<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class todo_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('todo_model');

		$this->load->helper('url');
		$this->load->helper('cookie');
		
		$this->load->library('session');
		
	}

	public function index()
	{
		$login				= 	$this->login_model->loggedin();

		if(!$login)
		{	
			$this->session->set_flashdata('errors', 'Voor deze pagina dient u ingelogd te zijn.');
			redirect('login');
		}
		else
		{
			$data			= 	$this->getTodos();
			$data['title']	=	'TODO-app';
			$data['login']	=	$login;
		}

		$this->load->helper('url'); //to make urls work
		$this->load->helper('form');//to create forms
		$this->load->view('templates/header',$data);
		$this->load->view('todo',$data);
		$this->load->view('templates/footer');
	}

	public function getTodos()
	{
		#mail uit cookie halen
		$rawCookieData		= 	get_cookie("login");
		$cookieData 		=	explode(',', $rawCookieData);
		$mail				=	$cookieData[0];
		
		#gebasseerd op mail, ID ophelen
		$user 				= 	$this->todo_model->getData($mail);
		$ID 				= 	$user->ID;

		#data preppen om taken op te halen
		$todos				= 	array(
									'FK_users' 		=>	$ID,
									'is_archived' 	=>	0
								);
		$done				= 	$todos; #tot hier is de array hetzelfde

		#gedane taken en open taken scheiden
		$todos['is_done']	=	0;
		$done['is_done'] 	=	1;
		
		$data['todos']		=	$this->todo_model->getTodos($todos);
		$data['dones']		=	$this->todo_model->getTodos($done);

		return $data;
	}

	public function activate($ID)
	{
		#taak op gedaan of ongedaan zetten gebasseerd op de ID van de taak
		$this->todo_model->doneOrNot($ID);
		redirect('todo','refresh');
	}

	public function delete($ID)
	{
		#taak verwijderen gebasseerd op de ID van de taak
		$taak = $this->todo_model->delete($ID);
		$this->session->set_flashdata('success', 'Het item "'. $taak .'" werd verwijderd.');
		redirect('todo','refresh');
	}

}