<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracks extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	function edit($id)
	{
		$data = array(
			'track_name' => $_POST['track_name'],
			'category' => $this->input->post('category')
		);
		$this->db->where('id', $id);
		$this->db->update('tracks', $data);

		echo json_encode(array(
			'results' => 'success',
		));
	}

	function delete($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('tracks');

		echo json_encode(array(
			'results' => 'success',
		));
	}


	function add()
	{
		$data = array(
			'track_name' => $this->input->post("track_name"),
			'category' => $this->input->post('category')
		);
		$query = $this->db->insert('tracks', $data);
		redirect('DashBoard/addTracks');
	}

}
