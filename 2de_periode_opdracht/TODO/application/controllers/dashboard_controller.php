<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		
		$this->load->helper('url');
		$this->load->helper('cookie');

		$this->load->library('session');
	}

	public function index()
	{
		$login				= 	$this->login_model->loggedin();

		if(!$login)
		{
			redirect('home');
		}
		else
		{	
			//titel doorgeven naar de header
			$data['title']	=	'Dashboard';
			$data['login']	= 	$login;
		}
		
		
		$this->load->helper('url'); //to make urls work
		$this->load->helper('form');//to create forms
		$this->load->view('templates/header',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('templates/footer');
	}

}