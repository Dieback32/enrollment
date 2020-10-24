<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('reservationModel','reservation');
	}

	function getTrackName($id){
		return $this->db->get_where('tracks',array('id' => $id))->row('track_name');
	}

	public function ajax_list()
	{
		$list = $this->reservation->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $reservation) {
			$no++;
			$row = array();
			// $row[] = $reservation->id;
			// $row[] = $reservation->id;
			$row[] = $reservation->last_name;
			$row[] = $reservation->first_name;
			$row[] = $reservation->grade;
			$row[] = $this->getTrackName($reservation->track);
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary crud" href="./accept/'.$reservation->id.'" ><i class="glyphicon glyphicon-check"></i> Accept</a>
			<a class="btn btn-sm btn-danger crud" href="javascript:void()" title="Hapus" onclick="delete_reservation('."'".$reservation->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->reservation->count_all(),
						"recordsFiltered" => $this->reservation->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->reservation->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'grade' => $this->input->post('grade'),
				'amount' => $this->input->post('amount'),
							
			);
		$insert = $this->reservation->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'grade' => $this->input->post('grade'),
				'amount' => $this->input->post('amount'),
								
			);
		$this->reservation->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delreservation',$id);
		$this->reservation->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}

