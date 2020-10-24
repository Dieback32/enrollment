<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TuitionModel extends CI_Model {

	var $table = 'tuition';
	var $column = array('id','for','amount');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
				
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
	
	// ############################################

	public function setTuition(){
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'grade' => $this->input->post('grade'),
			'section' => $this->input->post('section'),
			'total_amount' => $this->input->post('total'),
			'balance' => $this->input->post('total'),
			'sy' => $this->input->post('sy'),
			'back_account' => $this->input->post('back_account'),
			'months_pay' => $this->input->post('months_pay'),
		);		

		$insert = $this->db->insert('student_account', $data);
		return $insert;
	}
	public function payTuition(){
		$balance = $this->input->post('balance') - $this->input->post('amount');
		$data = array(
			'balance' => $balance,
		);		

		$where = $this->db->where('id', $this->input->post('id'));
		$update = $this->db->update('student_account', $data);
		return $update;
	}
	public function enrolled(){
		
		$data = array(
			'status' => 'enrolled',
		);		

		$where = $this->db->where('user_id', $this->input->post('user_id'));
		$update = $this->db->update('student_info', $data);
		return $update;
	}
	public function payReport(){
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'grade' => $this->input->post('grade'),
			'amount' => $this->input->post('amount'),
			'date' => date('0-m-0	',time()),
			'sy' => $this->input->post('sy'),
		);		

		$insert = $this->db->insert('payment_report', $data);
		$this->session->set_userdata('pay_id', $this->db->insert_id());
		return $insert;
	}
	public function paymentReport(){
		$this->db->from('userinfo');
		$this->db->join('payment_report', 'payment_report.user_id = userinfo.userID');
		$query = $this->db->get('');
		return $query->result();
	}
	public function paymentReports(){
		$sy = $this->session->userdata('year');
		$this->db->from('userinfo');
		$this->db->join('payment_report', 'payment_report.user_id = userinfo.userID');
		$this->db->where('sy', $sy);
		$query = $this->db->get();
		return $query->result();
	}
	public function paymentDaily(){
		$sy = $this->session->userdata('year');
		$this->db->from('userinfo');
		$this->db->join('payment_report', 'payment_report.user_id = userinfo.userID');
		$monthstring = date('Y-m-d	',time());
        $this->db->where ( "payment_report.date = '$monthstring'");
		$query = $this->db->get();
		return $query->result();
	}
	public function paymentMonthly(){
		if ($this->session->userdata('pyear') == NULL) {
			$this->db->from('userinfo');
			$this->db->join('payment_report', 'payment_report.user_id = userinfo.userID');
			$query = $this->db->get();
			return $query->result();
		}else{
			$year = $this->session->userdata('pyear');
			$month = $this->session->userdata('pmonth');
			$this->db->from('userinfo');
			$this->db->join('payment_report', 'payment_report.user_id = userinfo.userID');
			$monthstring = sprintf('%d-0%d-01', $year, $month);
			$this->db->where ( "payment_report.date >= '$monthstring'");
			$this->db->where ( "payment_report.date < '$monthstring' + INTERVAL 1 month");
			$query = $this->db->get('');
			return $query->result();
		}
		
	}
	public function tuitionAccount($id){
		$this->db->where('user_id', $id);
		$query = $this->db->get('student_account');
		return $query->result();
	}
	public function reservation($id){
		
		$data = array(
			'status' => 'reserved',
		);		

		$where = $this->db->where('user_id', $id);
		$update = $this->db->update('student_info', $data);
		return $update;
	}
	public function backAccount(){
		
		$data = array(
			'back_account' => $this->input->post('balance'),
		);		

		$where = $this->db->where('user_id', $this->input->post('user_id'));
		$update = $this->db->update('student_info', $data);
		return $update;
	}
	public function balanceZero(){
		
		$data = array(
			'balance' => 0,
		);		

		$where = $this->db->where('id', $this->input->post('id'));
		$update = $this->db->update('student_account', $data);
		return $update;
	}
	public function addBackAccount(){
		
		$data = array(
			'total_amount' => $this->input->post('balance'),
			'balance' => $this->input->post('balance'),
			'back_account' => $this->input->post('back_account'),
			'months_pay' => $this->input->post('months_pay'),
		);		

		$where = $this->db->where('id', $this->input->post('id'));
		$update = $this->db->update('student_account', $data);
		return $update;
	}
	public function baNone(){
		
		$data = array(
			'back_account' => 0,
		);		

		$where = $this->db->where('user_id', $this->input->post('user_id'));
		$update = $this->db->update('student_info', $data);
		return $update;
	}
	public function myRecord(){
		$this->db->where('user_id', $this->session->userdata('id'));
		$query = $this->db->get('student_account');
		return $query->result();
	}
	public function myPayment($sy){
		$this->db->where('user_id', $this->session->userdata('id'));
		$this->db->where('sy', $sy);
		$query = $this->db->get('payment_report');
		return $query->result();
	}
	public function totalBal($id){
		$this->db->where('end', 1);
		$query = $this->db->get('enrollment');
		$sy = $query->row();

		$this->db->where('sy', $sy->sy);
	    $this->db->where('user_id', $id);
	    $bal = $this->db->get('student_account');
	    return $bal->row();
	}



}
