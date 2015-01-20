<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class todo_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		$this->load->database();
		
	}

	public function getTodos($data) #taken ophalen (gedane of te doens naargelang data)
	{
		$this->db->where($data);
		$todos = $this->db->get('todos');
		$todos = $todos->result();
		return $todos;
	}

	public function getData($email) #user info ophalen gebasseerd op mail
	{
		$this->db->where('email',$email);
		$user = $this->db->get('Users')->row();
		return $user;
	}

	public function delete($ID) #taak verwijderen/archiveren gebasseerd op ID
	{
		$toggle = array('is_archived'	=> 	1);
		$this->db->where('ID', $ID);
		$todos = $this->db->get('todos')->row();
		$this->db->update('todos', $toggle);
		return $todos->omschrijving;
	}

	public function doneOrNot($ID) #taak gedaan of ongedaan maken
	{
		$data = array('ID' => $ID);
		$this->db->where($data);
		$todo = $this->db->get('todos')->row(); #1 ID - 1 taak

		if($todo->is_done == 0) #taak stond open en is nu gedaan
		{
			$isDone = 1;
			$this->session->set_flashdata('success', 'Alright! Dat is geschrapt.');
		}
		else #taak was af maar er was nog meer werk
		{
			$isDone = 0;
			$this->session->set_flashdata('success', 'Ai ai, nog meer werk...');
		}

		$toggle = array('is_done'	=> 	$isDone);
		$this->db->where($data);
		$this->db->update('todos', $toggle);		
	}

}