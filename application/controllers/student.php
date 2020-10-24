<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('studentModel','student');
	}

	public function ajax_list()
	{
		$list = $this->student->get_datatables();
		$data = array();
		$no = $_POST['start'];
		if ($this->session->userdata('role') == 'cashier') {
			foreach ($list as $student) {
				$no++;
				$row = array();
				$row[] = $student->userID;
				$row[] = $student->firstName;
				$row[] = $student->lastName;
				$row[] = $student->grade;
				$row[] = $student->section;
				$row[] = $student->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="./payment/'."".$student->userID."".'" title="Payment"><i class="glyphicon glyphicon-check"></i>Payment</a>
				';
			
				$data[] = $row;
			}
		}
		if ($this->session->userdata('role') == 'treasurer') {
			foreach ($list as $student) {
				$no++;
				$row = array();
				$row[] = $student->userID;
				$row[] = $student->firstName;
				$row[] = $student->lastName;
				$row[] = $student->grade;
				$row[] = $student->section;
				$row[] = $student->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="./accounts/'."".$student->userID."".'" title="Payment"><i class="glyphicon glyphicon-check"></i>View</a>
				';
			
				$data[] = $row;
			}
		}
		if ($this->session->userdata('role') == 'faculty') {
			foreach ($list as $student) {
				$no++;
				$row = array();
				$row[] = $student->userID;
				$row[] = $student->firstName;
				$row[] = $student->lastName;
				$row[] = $student->grade;
				$row[] = $student->section;
				$row[] = $student->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="/grading/firstq.php'."".$student->userID."".'" title="Payment"><i class="glyphicon glyphicon-check"></i> Input Grades</a>
				';
			
				$data[] = $row;
			}
		}
		if ($this->session->userdata('role') == 'registrar' || $this->session->userdata('role') == 'asstreg') {
			foreach ($list as $student) {
				$no++;
				$row = array();
				// $row[] = $student->id;
				$row[] = $student->userID;
				$row[] = $student->firstName;
				$row[] = $student->lastName;
				$row[] = $student->grade;
				$row[] = $student->section;
				$row[] = $student->status;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary crud" href="./studentView/'."".$student->userID."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				<a class="btn btn-sm btn-primary crud" href="./prints/'."".$student->userID."".'" title="Edit"><i class="glyphicon glyphicon-print"></i> Print</a>';
			
				$data[] = $row;
			}
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->student->count_all(),
						"recordsFiltered" => $this->student->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->student->get_by_id($id);
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
		$insert = $this->student->save($data);
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
		$this->student->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delstudent',$id);
		$this->student->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

