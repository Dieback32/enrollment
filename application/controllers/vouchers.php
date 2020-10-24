<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouchers extends CI_Controller {

	function index(){
		$data = array(
            'header'   => 'DashBoard/header',
            'content'  => 'Vouchers/index',
            'userInfo' => $this->profileModel->getProfile(),
            'vouchers' => $this->db->get('vouchers')->result()
		);
		$this->load->view('dashboard/template', $data);
	}

	function remove(){
		$this->db->where('id',$this->input->post('id'));
		$this->db->delete('vouchers');
		echo json_encode(array('results' => 'success'));
	}

	function add(){
		$toReturn = $this->save('add');
		echo json_encode($toReturn);
	}

	function edit(){
		$toReturn = $this->save('edit');
		echo json_encode($toReturn);
	}

	function save($process){
		$data = array(
			'label' => $this->input->post('label'),
			'amount' => $this->input->post('amount'),
		);

		if($process == 'add'){
			$this->db->insert('vouchers', $data);

		}else if($process == 'edit'){
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('vouchers', $data);
		}

		return array(
			'results' => 'success',
			'data' => $data,
		);
	}
}
