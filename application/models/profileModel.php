<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileModel extends CI_model {

	function __construct() {
        parent::__construct();

    }
	public function addProfile(){

		$query = $this->db->get_where('userinfo', array('userID' => $this->input->post('userID')));
		$data = array(
			'userID' => $this->input->post('userID'),
			'lastName' => $this->input->post('lname'),
			'firstName' => $this->input->post('fname'),
			'mi' => $this->input->post('mi'),
			'address' => $this->input->post('address'),
			'contactNUmber' => $this->input->post('contact'),
			);		
	
		if ($query->num_rows() > 0) {
			$where = array(
				'userID' => $this->session->userdata('id'),
				);
			$this->db->where($where);
			$update = $this->db->update('userinfo', $data);
			return $update;
		}else{
			$this->db->where('id',$this->session->userdata('id'));
			$insert = $this->db->insert('userinfo', $data);
			return $insert;
		}
	}
	public function getProfile(){
		$query = $this->db->get_where('userinfo', array('userID' => $this->session->userdata('id')));
		return $query->row();
	}
	public function thisProfile(){
		$query = $this->db->get_where('userinfo', array('userID' => $this->session->userdata('id')));
		if ($query->num_rows() > 0) {
			return false;
		}else{
			return true;
		}
	}
	function checkPass(){
		$this->db->where('email',$this->session->userdata('email') );
		$this->db->where('password',md5($this->input->post('password')));
		$query = $this->db->get('accounts');

		if ($query->num_rows() == 1)
		{
			return true;
		}
	}
	function changePass(){
		$pass = array(
			'password' => md5($this->input->post('newpwd')),
			);
		$this->db->where('email', $this->session->userdata('email'));
		$update = $this->db->update('accounts',$pass);
		if ($update){
			return true;
		}
	}
	public function checkEmail(){
        $check = $this->db->get_where('accounts', array('email' => $this->input->post('email')));
        if ($check->num_rows() > 0) {
        	return true;
        }
    }
    public function checkID(){
        $check = $this->db->get_where('accounts', array('id' => $this->input->post('id')));
        if ($check->num_rows() > 0) {
        	return true;
        }
    }
    
}

