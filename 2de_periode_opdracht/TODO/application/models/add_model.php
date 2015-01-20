<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function toevoegen($data)
	{
		#nieuwe taak toevoegen
		$this->db->insert('todos', $data); 
	}

	public function getID($mail)
	{
		#Id ophalen van gebruiker gebasseerd op ID
		$this->db->where('email',$mail);
		$user = $this->db->get('Users')->row();
		return $user->ID;
	}
}