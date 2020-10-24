<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accountModel extends CI_Model {

	var $table = 'accounts';
	var $table2 = 'userinfo';
	var $column = array('accounts.id','accounts.email','userinfo.firstName','userinfo.lastName','accounts.role');
	var $order = array('id' => 'desc');
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getFaculty(){

		$this->db->join('accounts','accounts.id = userinfo.userID');
		$this->db->where('accounts.role' ,'faculty');
		return $this->db->get('userInfo')->result();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table2);
		$this->db->join('accounts','accounts.id = userinfo.userID');

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
				$this->db->where('email !=', $this->session->userdata('email'));
				$this->db->where('role !=', 'admin');
				if ($this->session->userdata('role') == 'admin') {
					$this->db->where('role !=', 'student');
				}
				if ($this->session->userdata('role') == 'registrar') {
					$this->db->where('role', 'asstreg');
					$this->db->or_where('role', 'faculty');
				}
				if ($this->session->userdata('role') == 'faculty') {
					$this->db->where('role', 'asstreg');

				}
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return;
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	public function saveAccount(){
		$data = array(
			'id' => $this->input->post('id'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'role' => $this->input->post('role'),
			);	
			$insert = $this->db->insert('accounts', $data);	
			$query = $this->db->get_where('accounts', array('email' => $this->input->post('email')));
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$this->session->set_userdata(array(
				 	 'account_id' => $row->id,
			 	 ));
			}	
			
			return $insert;
	}
	public function saveUserinfo(){
			$data = array(
				'userID' => $this->session->userdata('account_id'),
				'lastName' => $this->input->post('lname'),
				'firstName' => $this->input->post('fname'),
				'mi' => $this->input->post('mi'),
				'address' => $this->input->post('address'),
				'contactNUmber' => $this->input->post('contact'),
				);		
		
				$insert = $this->db->insert('userinfo', $data);
				return $insert;
	}
	public function saveStudinfo(){
			$data = array(
				'user_id' => $this->session->userdata('account_id'),
				'grade' => $this->input->post('grade'),
				'section' => $this->input->post('grade_section'),
				'birthdate' => $this->input->post('birthdate'),
				'place_birth' => $this->input->post('place_birth'),
				'gender' => $this->input->post('gender'),
				'mother' => $this->input->post('mother'),
				'm_occupation' => $this->input->post('m_occupation'),
				'status' => $this->input->post('status'),
				'track' => $this->input->post('tracks'),
				'schoolType' => $this->input->post('schoolType')
				// 'sy' => $this->input->post('sy'),
				);		
		
				$insert = $this->db->insert('student_info', $data);
				return $insert;
	}
	public function reserve(){
			$data = array(
				'last_name' => $this->input->post('lname'),
				'first_name' => $this->input->post('fname'),
				'mi' => $this->input->post('mi'),
				'address' => $this->input->post('address'),
				'contact' => $this->input->post('contact'),
				'grade' => $this->input->post('grade'),
				'birthdate' => $this->input->post('birthdate'),
				'place_birth' => $this->input->post('place_birth'),
				'gender' => $this->input->post('gender'),
				'mother' => $this->input->post('mother'),
				'm_occu' => $this->input->post('m_occupation'),
				'track' => $this->input->post('tracks'), 
				
				// 'sy' => $this->input->post('sy'),
				);		
		
				$insert = $this->db->insert('reservation', $data);
				return $insert;
	}
	public function getReserve($id){
		$this->db->where('id', $id);
		$query = $this->db->get('reservation');
		return $query->row();
	}
	public function deleteRes(){
		$this->db->where('id', $this->input->post('del_id'));
		$this->db->delete('reservation'); 
	}
	function checkInfo(){
		$this->db->where('email',$this->input->post('email') );
		$this->db->where('contactNUmber',$this->input->post('contact'));
		$this->db->from('accounts');
		$this->db->join('userinfo','userinfo.userID = accounts.id');
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return true;
		}
	}
	function changePass(){
		$pass = array(
			'password' => md5($this->input->post('newpwd')),
			);
		$this->db->where('email', $this->session->userdata('my-email'));
		$update = $this->db->update('accounts',$pass);
		if ($update){
			return true;
		}
	}
	public function getAccount($id){
		$this->db->where('id', $id);
		$query = $this->db->get('accounts');
		return $query->row();
	}
	public function getInfo($id){
		$this->db->where('userID', $id);
		$query = $this->db->get('userinfo');
		return $query->row();
	}
	public function updateAccount(){
		$id = $this->input->post('id');
        $pass = array(
            'email' => $this->input->post('email'),
            );
        $this->db->where('id', $id);
        $update = $this->db->update('accounts',$pass);
        if ($update){
            return true;
        }
    }
    public function updateInfo(){
    	$id = $this->input->post('id');
        $pass = array(
            'lastName' => $this->input->post('lname'),
            'firstName' => $this->input->post('fname'),
            'Mi' => $this->input->post('mi'),
            'address' => $this->input->post('address'),
            'contactNUmber' => $this->input->post('contact'),
            );
        $this->db->where('userID', $id);
        $update = $this->db->update('userinfo',$pass);
        if ($update){
            return true;
        }
    }
    public function checkEmail(){
		$this->db->where('id !=', $this->input->post('id'));
        $check = $this->db->get_where('accounts', array('email' => $this->input->post('email')));
        if ($check->num_rows() > 0 ) {
        	return true;
        }
    }


}
