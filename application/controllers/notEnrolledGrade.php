<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notEnrolledGrade extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('notEnrolledGradeModel','notEnrolledGrade');
	}

	public function ajax_list()
	{
		$list = $this->notEnrolledGrade->get_datatables();
		$data = array();
		$no = $_POST['start'];
		
			foreach ($list as $notEnrolledGrade) {
				$no++;
				$row = array();
				// $row[] = $notEnrolledGrade->id;
				$row[] = $notEnrolledGrade->userID;
				$row[] = $notEnrolledGrade->firstName;
				$row[] = $notEnrolledGrade->lastName;
				$row[] = $notEnrolledGrade->grade;
				$row[] = $notEnrolledGrade->section;
				$row[] = $notEnrolledGrade->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="./studentView/'."".$notEnrolledGrade->userID."".'" title="Edit"><i class="glyphicon glyphicon-eye-open"></i> View</a>
				';
			
				$data[] = $row;
			}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->notEnrolledGrade->count_all(),
						"recordsFiltered" => $this->notEnrolledGrade->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->notEnrolledGrade->get_by_id($id);
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
		$insert = $this->notEnrolledGrade->save($data);
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
		$this->notEnrolledGrade->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delnotEnrolledGrade',$id);
		$this->notEnrolledGrade->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

