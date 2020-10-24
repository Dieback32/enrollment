<?php

class UploadLogo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function file_view()
	{
		$this->load->view('file_view', array('error' => ' '));
	}

	function uploadReq1()
	{

		$config = array(
			'upload_path' => "./uploads/requirements/",
			'allowed_types' => "jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "5000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "0",
			'max_width' => "0",
			'encrypt_name' => TRUE,
		);

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('req1')) {
			$data = array('upload_data' => $this->upload->data());
			$file = $this->upload->data();


			$this->db->where('studentId', $this->input->post('studentId'));
			$row = $this->db->get('student_requirement')->result_array();
			if (count($row) > 0) {

				$this->db->where('studentId', $this->input->post('studentId'));
				$row = $this->db->get('student_requirement');

				$data = array(
					'req1' => $file['file_name']
				);
				$this->db->update('student_requirement', $data);
			} else {
				$data = array(
					'studentId' => $this->input->post('studentId'),
					'req1' => $file['file_name'],
				);
				$this->db->insert('student_requirement', $data);
			}

			$this->session->set_flashdata('success', 'Successfuly Upload data!');
			redirect('frontPage/myAccount');
//			redirect('Dashboard/uploadRequirements/'.$this->input->post('studentId'));
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Error Upload data!');
			redirect('frontPage/myAccount');
		}
	}

	function uploadReq2()
	{

		$config = array(
			'upload_path' => "./uploads/requirements/",
			'allowed_types' => "jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "5000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "0",
			'max_width' => "0",
			'encrypt_name' => TRUE,
		);

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('req2')) {
			$data = array('upload_data' => $this->upload->data());
			$file = $this->upload->data();


			$this->db->where('studentId', $this->input->post('studentId'));
			$row = $this->db->get('student_requirement')->result_array();
			if (count($row) > 0) {

				$this->db->where('studentId', $this->input->post('studentId'));
				$row = $this->db->get('student_requirement');

				$data = array(
					'req2' => $file['file_name']
				);
				$this->db->update('student_requirement', $data);
			} else {
				$data = array(
					'studentId' => $this->input->post('studentId'),
					'req2' => $file['file_name'],
				);
				$this->db->insert('student_requirement', $data);
			}

			$this->session->set_flashdata('success', 'Successfuly Upload data!');
			redirect('frontPage/myAccount');
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Error Upload data!');
			redirect('frontPage/myAccount');
		}
	}

	function uploadReq3()
	{

		$config = array(
			'upload_path' => "./uploads/requirements/",
			'allowed_types' => "jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "5000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "0",
			'max_width' => "0",
			'encrypt_name' => TRUE,
		);

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('req3')) {
			$data = array('upload_data' => $this->upload->data());
			$file = $this->upload->data();


			$this->db->where('studentId', $this->input->post('studentId'));
			$row = $this->db->get('student_requirement')->result_array();
			if (count($row) > 0) {

				$this->db->where('studentId', $this->input->post('studentId'));
				$row = $this->db->get('student_requirement');

				$data = array(
					'req3' => $file['file_name']
				);
				$this->db->update('student_requirement', $data);
			} else {
				$data = array(
					'studentId' => $this->input->post('studentId'),
					'req3' => $file['file_name'],
				);
				$this->db->insert('student_requirement', $data);
			}

			$this->session->set_flashdata('success', 'Successfuly Upload data!');
			redirect('frontPage/myAccount');
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Error Upload data!');
			redirect('frontPage/myAccount');
		}
	}

	function uploadReq4()
	{

		$config = array(
			'upload_path' => "./uploads/requirements/",
			'allowed_types' => "jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "5000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "0",
			'max_width' => "0",
			'encrypt_name' => TRUE,
		);

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('req4')) {
			$data = array('upload_data' => $this->upload->data());
			$file = $this->upload->data();


			$this->db->where('studentId', $this->input->post('studentId'));
			$row = $this->db->get('student_requirement')->result_array();
			if (count($row) > 0) {

				$this->db->where('studentId', $this->input->post('studentId'));
				$row = $this->db->get('student_requirement');

				$data = array(
					'req4' => $file['file_name']
				);
				$this->db->update('student_requirement', $data);
			} else {
				$data = array(
					'studentId' => $this->input->post('studentId'),
					'req4' => $file['file_name'],
				);
				$this->db->insert('student_requirement', $data);
			}

			$this->session->set_flashdata('success', 'Successfuly Upload data!');
			redirect('frontPage/myAccount');
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Error Upload data!');
			redirect('frontPage/myAccount');
		}
	}

	public function do_upload()
	{
		$config = array(
			'upload_path' => "./uploads/home/",
			'allowed_types' => "jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "5000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "0",
			'max_width' => "0",
			'encrypt_name' => TRUE,
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload()) {
			$data = array('upload_data' => $this->upload->data());
			$file = $this->upload->data();
			$data = array(
				'file' => $file['file_name'],
				'type' => 'logo',
			);
			$logo = $this->db->get_where('homeimage', array('type' => 'logo'));
			if ($logo->num_rows() > 0) {
				$this->db->where('type', 'logo');
				$this->db->update('homeimage', $data);
			} else {
				$this->db->insert('homeimage', $data);
			}
			$this->session->set_flashdata('success', 'Successfuly Upload data!');
			redirect('Dashboard/staticPage');
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Error Upload data!');
			redirect('Dashboard/staticPage');
		}
	}
}
