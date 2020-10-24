<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {

	var $table = 'accounts';
	var $table2 = 'student_info';
	var $table3 = 'userinfo';
	var $column = array('userinfo.userID','userinfo.firstName','userinfo.lastName','student_info.status','student_info.grade','student_info.section');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		// $this->db->from($this->table);
		$this->db->from($this->table2);
		$this->db->join('accounts','accounts.id = student_info.user_id');
		$this->db->join('userinfo','userinfo.userID = student_info.user_id');

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$this->db->where('status !=', 'reserved');
			if ($this->session->userdata('role') != 'cashier') {
				$this->db->where('status !=', 'not-enrolled');
			}
			if ($this->session->userdata('role') == 'treasurer') {
				$this->db->where('student_info.grade !=', '0');
				$this->db->where('student_info.section !=', '0');
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
	public function studentAccount($id){
		$this->db->where('id', $id);
		$query = $this->db->get('accounts');
		if ($query->num_rows() > 0) {
			return $query->row();
		}	
	}
	public function studentInfo($id){
		$this->db->where('userID', $id);
		$query = $this->db->get('userinfo');
		if ($query->num_rows() > 0) {
			return $query->row();
		}	
	}
	public function studentDetails($id){
		$this->db->where('user_id', $id);
		$query = $this->db->get('student_info');
		if ($query->num_rows() > 0) {
			return $query->row();
		}	
	}
	public function studentGradeLevel(){
	    $query = $this->db->get('grade_level');
	    return $query->result();
    }
	public function saveUserinfo(){
			$data = array(
				'lastName' => $this->input->post('lname'),
				'firstName' => $this->input->post('fname'),
				'mi' => $this->input->post('mi'),
				'address' => $this->input->post('address'),
				'contactNUmber' => $this->input->post('contact'),
				);		
				$where = $this->db->where('userID', $this->input->post('userID'));
				$update = $this->db->update('userinfo', $data, $where);
				return $update;
	}
	public function saveStudinfo(){
			$data = array(
				'grade' => $this->input->post('grade'),
				'section' => $this->input->post('grade_section'),
				'birthdate' => $this->input->post('birthdate'),
				'place_birth' => $this->input->post('place_birth'),
				'gender' => $this->input->post('gender'),
				'mother' => $this->input->post('mother'),
				'm_occupation' => $this->input->post('m_occupation'),
				'schoolType' => $this->input->post('schoolType'),
				'voucherId' => $this->input->post('voucher'),
				'track' => $this->input->post('tracks'),
				'lrn' => $this->input->post('lrn')
				
				);					
				$where = $this->db->where('user_id', $this->input->post('userID'));
				$update = $this->db->update('student_info', $data, $where);
				return $update;
	}
	public function acceptStudent($id){
			$data = array(
				'status' => 'accepted',
				);		
				$where = $this->db->where('user_id', $id);
				$update = $this->db->update('student_info', $data, $where);
				return $update;
	}
	public function gradeReport(){
		$this->db->from('student_info');
		$this->db->join('student_account', 'student_info.user_id = student_account.user_id');
		$this->db->join('userinfo', 'userinfo.userID = student_account.user_id');
		$this->db->where('student_account.grade', $this->session->userdata('ggrade'));
		$this->db->where('student_account.sy', $this->session->userdata('gyears'));
		$query = $this->db->get();
		return $query->result();
	}
	public function studentReport(){
		$this->db->from('student_info');
		$this->db->join('student_account', 'student_info.user_id = student_account.user_id');
		$this->db->join('userinfo', 'userinfo.userID = student_account.user_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function studentReports(){
		$sy = $this->session->userdata('years');
		$this->db->from('student_info');
		$this->db->join('student_account', 'student_info.user_id = student_account.user_id');
		$this->db->join('userinfo', 'userinfo.userID = student_account.user_id');
		$this->db->where('student_account.sy', $sy);
		$query = $this->db->get();
		return $query->result();
	}
	public function studDaily(){
		
		$monthstring = date('Y-m-d	',time());
        $this->db->where ( "date = '$monthstring'");
		$this->db->from('student_info');
		$this->db->join('student_account', 'student_info.user_id = student_account.user_id');
		$this->db->join('userinfo', 'userinfo.userID = student_account.user_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function studMonthly(){
		if ($this->session->userdata('syear') == NULL) {
			$this->db->from('student_info');
			$this->db->join('student_account', 'student_info.user_id = student_account.user_id');
			$this->db->join('userinfo', 'userinfo.userID = student_account.user_id');
			$query = $this->db->get();
			return $query->result();
		}else{
			$year = $this->session->userdata('syear');
			$month = $this->session->userdata('smonth');
			$monthstring = sprintf('%d-0%d-01', $year, $month);
			$this->db->where ( "date >= '$monthstring'");
			$this->db->where ( "date < '$monthstring' + INTERVAL 1 month");
			$this->db->from('student_info');
			$this->db->join('student_account', 'student_info.user_id = student_account.user_id');
			$this->db->join('userinfo', 'userinfo.userID = student_account.user_id');
			$query = $this->db->get();
			return $query->result();
		}
		
	}

}
