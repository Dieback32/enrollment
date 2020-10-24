<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_model {

	function __construct() {
        parent::__construct();

    }
	public function check_credentials(){

		$query = $this->db->get_where('accounts', array('email' => $this->input->post('email'), 'password' => md5($this->input->post('password'))));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata(array(
			 	 'id' => $row->id,
				 'email' => $row->email,
				 'role'	=> $row->role,
				 'is_logged_in' => true,
		 	 ));
			return true;
		}
	}
	public function check_credentials1(){
		$this->db->where('email',$this->input->post('email'));
        $up = array('status1' => '1');
        $query1 = $this->db->update('accounts', $up);
        return $query1;
		
	}

}

