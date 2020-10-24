<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tuition extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('tuitionModel','tuition');
	}

	public function ajax_list()
	{
		$list = $this->tuition->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $tuition) {
			$no++;
			$row = array();
			// $row[] = $tuition->id;
			// $row[] = $tuition->id;
			// $row[] = $tuition->password;
			$row[] = $tuition->for;
			$row[] = $tuition->amount;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_tuition('."'".$tuition->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			<a class="btn btn-sm btn-danger crud" href="javascript:void()" title="Hapus" onclick="delete_tuition('."'".$tuition->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->tuition->count_all(),
						"recordsFiltered" => $this->tuition->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->tuition->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'for' => $this->input->post('for'),
				'amount' => $this->input->post('amount'),
							
			);
		$insert = $this->tuition->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'for' => $this->input->post('for'),
				'amount' => $this->input->post('amount'),	
			);
		$this->tuition->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('deltuition',$id);
		$this->tuition->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

