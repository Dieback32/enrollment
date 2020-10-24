<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GradeLevel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gradeLevelModel','gradeLevel');
	}

	public function ajax_list()
	{
		$list = $this->gradeLevel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $gradeLevel) {
			$no++;
			$row = array();
			// $row[] = $gradeLevel->id;
			// $row[] = $gradeLevel->id;
			// $row[] = $gradeLevel->password;
			$row[] = $gradeLevel->grade;
			//add html for action
			$str = '<a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_gradeLevel('."'".$gradeLevel->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
			if($this->session->userdata('role') != 'asstreg'){
				$str . '<a class="btn btn-sm btn-danger crud" href="javascript:void()" title="Hapus" onclick="delete_gradeLevel('."'".$gradeLevel->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';	
			}
			$row[] = $str;
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->gradeLevel->count_all(),
						"recordsFiltered" => $this->gradeLevel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->gradeLevel->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'grade' => $this->input->post('grade'),				
			);
		$insert = $this->gradeLevel->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'grade' => $this->input->post('grade'),
			);
		$this->gradeLevel->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delgradeLevel',$id);
		$this->gradeLevel->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

