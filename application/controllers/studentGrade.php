<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentGrade extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('studentGradeModel','studentGrade');
	}

	public function ajax_list()
	{
		$list = $this->studentGrade->get_datatables();
		$data = array();
		$no = $_POST['start'];
		if ($this->session->userdata('role') == 'cashier') {
			foreach ($list as $studentGrade) {
				$no++;
				$row = array();
				$row[] = $studentGrade->userID;
				$row[] = $studentGrade->firstName;
				$row[] = $studentGrade->lastName;
				$row[] = $studentGrade->grade;
				$row[] = $studentGrade->section;
				$row[] = $studentGrade->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="./payment/'."".$studentGrade->userID."".'" title="Payment"><i class="glyphicon glyphicon-check"></i> Enroll</a>
				';
			
				$data[] = $row;
			}
		}
		if ($this->session->userdata('role') == 'treasurer') {
			foreach ($list as $studentGrade) {
				$no++;
				$row = array();
				$row[] = $studentGrade->userID;
				$row[] = $studentGrade->firstName;
				$row[] = $studentGrade->lastName;
				$row[] = $studentGrade->grade;
				$row[] = $studentGrade->section;
				$row[] = $studentGrade->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="./accounts/'."".$studentGrade->userID."".'" title="Payment"><i class="glyphicon glyphicon-check"></i> Enroll</a>
				';
			
				$data[] = $row;
			}
		}
		if ($this->session->userdata('role') == 'faculty') {
			foreach ($list as $studentGrade) {
				$no++;
				$row = array();
				$row[] = $studentGrade->userID;
				$row[] = $studentGrade->firstName;
				$row[] = $studentGrade->lastName;
				$row[] = $studentGrade->grade;
				$row[] = $studentGrade->section;
				$row[] = $studentGrade->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="/grading/firstq.php/'."".$studentGrade->userID."".'" title="Grading System"><i class="glyphicon glyphicon-check"></i> Input Grades</a>
				';
			
				$data[] = $row;
			}
		}
		if ($this->session->userdata('role') == 'registrar' || $this->session->userdata('role') == 'asstreg') {
			foreach ($list as $studentGrade) {
				$no++;
				$row = array();
				// $row[] = $studentGrade->id;
				$row[] = $studentGrade->userID;
				$row[] = $studentGrade->firstName;
				$row[] = $studentGrade->lastName;
				$row[] = $studentGrade->grade;
				$row[] = $studentGrade->section;
				$row[] = $studentGrade->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="./studentGradeView/'."".$studentGrade->userID."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
			
				$data[] = $row;
			}
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->studentGrade->count_all(),
						"recordsFiltered" => $this->studentGrade->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->studentGrade->get_by_id($id);
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
		$insert = $this->studentGrade->save($data);
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
		$this->studentGrade->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delstudentGrade',$id);
		$this->studentGrade->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

