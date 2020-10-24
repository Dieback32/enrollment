<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GradeFee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gradeFeeModel','gradeFee');
	}

	public function ajax_list()
	{
		$list = $this->gradeFee->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $gradeFee) {
			$no++;
			$row = array();
			// $row[] = $gradeFee->id;
			// $row[] = $gradeFee->id;
			// $row[] = $gradeFee->password;
			$row[] = $gradeFee->grade;
			$row[] = $gradeFee->amount;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_gradeFee('."'".$gradeFee->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			<a class="btn btn-sm btn-danger crud" href="javascript:void()" title="Hapus" onclick="delete_gradeFee('."'".$gradeFee->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->gradeFee->count_all(),
						"recordsFiltered" => $this->gradeFee->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->gradeFee->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'grade' => $this->input->post('grade'),
				'amount' => $this->input->post('amount'),
							
			);
		$insert = $this->gradeFee->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'grade' => $this->input->post('grade'),
				'amount' => $this->input->post('amount'),
								
			);
		$this->gradeFee->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delgradeFee',$id);
		$this->gradeFee->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

