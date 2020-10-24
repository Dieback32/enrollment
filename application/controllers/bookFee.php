<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookFee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bookFeeModel','bookFee');
	}

	public function ajax_list()
	{
		$list = $this->bookFee->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $bookFee) {
			$no++;
			$row = array();
			// $row[] = $bookFee->id;
			// $row[] = $bookFee->id;
			// $row[] = $bookFee->password;
			$row[] = $bookFee->grade;
			$row[] = $bookFee->amount;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_bookFee('."'".$bookFee->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			<a class="btn btn-sm btn-danger crud" href="javascript:void()" title="Hapus" onclick="delete_bookFee('."'".$bookFee->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->bookFee->count_all(),
						"recordsFiltered" => $this->bookFee->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->bookFee->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'grade' => $this->input->post('grade'),
				'amount' => $this->input->post('amount'),
							
			);
		$insert = $this->bookFee->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'grade' => $this->input->post('grade'),
				'amount' => $this->input->post('amount'),
								
			);
		$this->bookFee->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delbookFee',$id);
		$this->bookFee->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

