<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
        parent::__construct();

    }
    public function logout(){
    	$this->logsModel->logout();
    	$this->logsModel->logout1();
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
	public function login(){
		/*$check = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			);
		$query = $this->db->get_where('accounts',$check);
		$row = $query->row();
		if ($row->status1 == 0) {
			$check = $this->authenticate->check_credentials();
			$addProfile = $this->profileModel->thisProfile();
			if ($check) {
				if ($addProfile) {
					redirect('FrontPage/setProfile');
				}
				$check = $this->authenticate->check_credentials1();
				$this->logsModel->login();
				redirect('DashBoard');
			}
			else{
				$this->session->set_flashdata('error', 'Invalid username/password!');
				redirect('FrontPage/loginPage');
			}
		}else{
			$this->session->set_flashdata('error', 'Dual Login is Prohibited!');
			redirect('FrontPage/loginPage');
		}*/
		$check = $this->authenticate->check_credentials();
		$addProfile = $this->profileModel->thisProfile();
		if ($check) {
			if ($addProfile) {
				redirect('FrontPage/setProfile');
			}
			$this->logsModel->login();
			redirect('DashBoard');
		}
		else{
			$this->session->set_flashdata('error', 'Invalid username/password!');
			redirect('FrontPage/loginPage');
		}
	}
	public function forgot(){
		$data = array(
				'header' => 'FrontPage/header',
				'content' => 'FrontPage/forgot',
				'footer' => 'FrontPage/footer',
                'page' => $this->pageModel->getParentMenu(),
				'childPage' => $this->pageModel->getChildMenu(),
				'links' => $this->pageModel->getPageLink(),
				'logo' => $this->homeModel->getLogo(),
                'banner' => $this->homeModel->getBanner(),
                'getAbout' => $this->homeModel->getAbout(),
                'getCaption' => $this->homeModel->getCaption(),
                'getMission' => $this->homeModel->getMission(),
                'getVision' => $this->homeModel->getVision(),
                'getContact' => $this->homeModel->getContact(),
			);
		$this->load->view('FrontPage/template', $data);
	}
	public function changePass(){
		$data = array(
				'header' => 'FrontPage/header',
				'content' => 'FrontPage/changePass',
				'footer' => 'FrontPage/footer',				
                'page' => $this->pageModel->getParentMenu(),
				'childPage' => $this->pageModel->getChildMenu(),
				'links' => $this->pageModel->getPageLink(),
				'logo' => $this->homeModel->getLogo(),
                'banner' => $this->homeModel->getBanner(),
                'getAbout' => $this->homeModel->getAbout(),
                'getCaption' => $this->homeModel->getCaption(),
                'getMission' => $this->homeModel->getMission(),
                'getVision' => $this->homeModel->getVision(),
                'getContact' => $this->homeModel->getContact(),
			);
		$this->load->view('FrontPage/template', $data);
	}
	public function forgotPass(){
		$check = $this->accountModel->checkInfo();
		if ($check) {
			$this->session->set_userdata('my-email', $this->input->post('email'));
			$this->session->set_flashdata('success', 'Create your new password!');
            redirect('Authentication/changePass');
		}else{
			$this->session->set_flashdata('error', 'Invalid User Information!');
            redirect($this->agent->referrer());
		}
	}
	public function changePassword(){
		$this->accountModel->changePass();
		$this->session->set_flashdata('success', 'Password has change!');
        redirect('');
	}
}

