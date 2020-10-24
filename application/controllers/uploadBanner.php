<?php

class UploadBanner extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }
        public function file_view(){
			$this->load->view('file_view', array('error' => ' ' ));
		}

        public function do_upload(){
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
				if($this->upload->do_upload())
				{
				$data = array('upload_data' => $this->upload->data());
				$file = $this->upload->data();
				$data = array( 
					'file' =>  $file['file_name'],
					'type' => 'banner',
					);
				$logo = $this->db->get_where('homeimage', array('type' => 'banner'));
				if ($logo->num_rows() > 0) {
					$this->db->where('type','banner');
					$this->db->update('homeimage',$data);
				}else{
					$this->db->insert('homeimage',$data);
				}
				$this->session->set_flashdata('success', 'Successfuly Upload data!');
				redirect('Dashboard/staticPage');
				}
				else
				{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', 'Error Upload data!');
				redirect('Dashboard/staticPage');
				}
		}
}
