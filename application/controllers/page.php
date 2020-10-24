<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pageModel','page');
	}

	public function ajax_list()
	{
		$list = $this->page->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $page) {
			$no++;
			$row = array();
			$row[] = $page->title;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary crud" href="./updatePage/'."".$page->id."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger crud" href="javascript:void()" title="Hapus" onclick="delete_page('."'".$page->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->page->count_all(),
						"recordsFiltered" => $this->page->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->page->get_by_id($id);
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
		$insert = $this->page->save($data);
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
		$this->page->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delpage',$id);
		$this->page->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
}

