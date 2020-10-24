<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('accountModel','accounts');
	}

	public function ajax_list()
	{
		$list = $this->accounts->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $accounts) {
			$no++;
			$row = array();
			$row[] = $accounts->lastName;
			$row[] = $accounts->firstName;
			$row[] = $accounts->email;
			// $row[] = $accounts->password;
			$row[] = $accounts->role;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary crud" href="./account/'."".$accounts->id."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->accounts->count_all(),
						"recordsFiltered" => $this->accounts->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->accounts->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'email' => $this->input->post('email'),
				'password' => md5('1234'),
				'role' => $this->input->post('role'),
				
			);
		$insert = $this->accounts->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'email' => $this->input->post('email'),
				// 'password' => md5($this->input->post('password')),
				'role' => $this->input->post('role'),
			);
		$this->accounts->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delaccounts',$id);
		$this->accounts->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

