<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notEnrolled extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('notEnrolledModel','notEnrolled');
	}

	public function ajax_list()
	{
		$list = $this->notEnrolled->get_datatables();
		$data = array();
		$no = $_POST['start'];
		
			foreach ($list as $notEnrolled) {
				$no++;
				$row = array();
				// $row[] = $notEnrolled->id;
				$row[] = $notEnrolled->userID;
				$row[] = $notEnrolled->firstName;
				$row[] = $notEnrolled->lastName;
				$row[] = $notEnrolled->grade;
				$row[] = $notEnrolled->section;
				$row[] = $notEnrolled->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="./studentView/'."".$notEnrolled->userID."".'" title="Edit"><i class="glyphicon glyphicon-eye-open"></i> View</a>
				';
			
				$data[] = $row;
			}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->notEnrolled->count_all(),
						"recordsFiltered" => $this->notEnrolled->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->notEnrolled->get_by_id($id);
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
		$insert = $this->notEnrolled->save($data);
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
		$this->notEnrolled->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delnotEnrolled',$id);
		$this->notEnrolled->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

