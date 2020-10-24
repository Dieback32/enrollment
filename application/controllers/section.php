<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sectionModel','section');
	}

	public function ajax_list()
	{
		$list = $this->section->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $section) {
			$no++;
			$row = array();
			// $row[] = $section->id;
			// $row[] = $section->id;
			// $row[] = $section->password;
			$row[] = $section->section;
			$row[] = $section->grade_level;
			$row[] = $section->max;
			//add html for action
			$str = '<a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_section('."'".$section->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
			if($this->session->userdata('role') != 'asstreg'){
				$str . '<a class="btn btn-sm btn-danger crud" href="javascript:void()" title="Hapus" onclick="delete_section('."'".$section->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			}

			$row[] = $str;
			
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->section->count_all(),
						"recordsFiltered" => $this->section->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->section->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'section' => $this->input->post('section'),
				'grade_level' => $this->input->post('grade_level'),
				'max' => $this->input->post('max'),				
           		'adviser_id' => $this->input->post('adviser')
            
			);
		$insert = $this->section->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'section' => $this->input->post('section'),
				'grade_level' => $this->input->post('grade_level'),
				'max' => $this->input->post('max'),		
				 'adviser_id' => $this->input->post('adviser')
			);
		$this->section->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delsection',$id);
		$this->section->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

