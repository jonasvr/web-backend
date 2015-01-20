<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_controller extends CI_Controller {
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
		//titel doorgeven naar de header
		$data['title']	=	'Welkom op de examenopdracht.';
		#login checken
		$data['login']	= 	$this->login_model->loggedin();
		
		$this->load->helper('url');
		$this->load->view('templates/header',$data);
		$this->load->view('home');
		$this->load->view('templates/footer');
	}
}
