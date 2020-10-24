<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logsView extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('logsViewModel','logsView');
	}

	public function ajax_list()
	{
		$list = $this->logsView->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $logsView) {
			$no++;
			$row = array();
			$row[] = $logsView->username;
			$row[] = $logsView->log;
			$row[] = $logsView->time;
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->logsView->count_all(),
						"recordsFiltered" => $this->logsView->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->logsView->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'auth_id' => $this->input->post('auth_id'),
				'name' => $this->input->post('name'),
				
			);
		$insert = $this->logsView->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'auth_id' => $this->input->post('auth_id'),
				'name' => $this->input->post('name'),
			);
		$this->logsView->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('dellogsView',$id);
		$this->logsView->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

