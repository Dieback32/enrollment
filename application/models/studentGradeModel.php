<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentGradeModel extends CI_Model {

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
			$this->db->where('grade', $this->session->userdata('sGrade'));
			if ($this->session->userdata('role') != 'cashier') {
				$this->db->where('status !=', 'not-enrolled');
				$this->db->where('grade', $this->session->userdata('sGrade'));
			}
			if ($this->session->userdata('role') == 'treasurer') {
				$this->db->where('student_info.grade !=', '0');
				$this->db->where('student_info.section !=', '0');
				$this->db->where('grade', $this->session->userdata('sGrade'));
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
	

}
