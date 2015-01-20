<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class validate_user_model extends CI_Model
{

	public function loggedin()
	{
		$data['login']	= 	false;
		$data['user']	=	false;

		if($this->input->cookie('login'))
		{
			$cookie 		= 	get_cookie("login");
			//var_dump($cookie);
			$data['login']	= 	true;
			$data['user']	=	$cookie;
		}
		return $data;
	}

}