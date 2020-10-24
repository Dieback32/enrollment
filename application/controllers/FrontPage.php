<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontPage extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

	}

	function is_admin()
	{
		$check = $this->db->get_where('accounts', array('role' => 'admin'));
		if ($check->num_rows() == 0) {
			redirect('FrontPage/adminReg');
		}
	}

	public function index()
	{
		$check = $this->db->get_where('accounts', array('role' => 'admin'));
		if ($check->num_rows() == 0) {
			redirect('FrontPage/adminReg');
		}
		$data = array(
			'header' => 'FrontPage/header',
			'content' => 'FrontPage/home',
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

	function page($slug = NULL)
	{
		$sdata['page'] = $this->pageModel->getAllPage($slug);

		if (empty($sdata['page'])) {
			show_404();
		}
		$data = array(
			'header' => 'FrontPage/header',
			'content' => 'FrontPage/page',
			'footer' => 'FrontPage/footer',
			'page' => $this->pageModel->getParentMenu(),
			'childPage' => $this->pageModel->getChildMenu(),
			'links' => $this->pageModel->getPageLink(),
			'thisPage' => $this->pageModel->getAllPage($slug),
			'logo' => $this->homeModel->getLogo(),
			'getContact' => $this->homeModel->getContact(),
		);
		$this->load->view('FrontPage/template', $data);
	}

	public function setProfile()
	{
		$data = array(
			'header' => 'FrontPage/header',
			'content' => 'FrontPage/setProfile',
			'footer' => 'FrontPage/footer',
			'page' => $this->pageModel->getParentMenu(),
			'childPage' => $this->pageModel->getChildMenu(),
			'links' => $this->pageModel->getPageLink(),
			'logo' => $this->homeModel->getLogo(),
			'getContact' => $this->homeModel->getContact(),
		);
		$this->load->view('FrontPage/template', $data);
	}

	public function loginPage()
	{
		$data = array(
			'header' => 'FrontPage/header',
			'content' => 'FrontPage/login',
			'footer' => 'FrontPage/footer',
			'page' => $this->pageModel->getParentMenu(),
			'childPage' => $this->pageModel->getChildMenu(),
			'links' => $this->pageModel->getPageLink(),
			'logo' => $this->homeModel->getLogo(),
			'getContact' => $this->homeModel->getContact(),
		);
		$this->load->view('FrontPage/template', $data);
	}

	public function setAccount()
	{
		$set = $this->accountModel->saveAccount();
		if ($set) {
			redirect('');
		} else {
			redirect('FrontPage/adminReg');
		}
	}

	public function adminReg()
	{
		$data = array(
			'header' => 'FrontPage/header',
			'content' => 'FrontPage/adminReg',
			'footer' => 'FrontPage/footer',
			'page' => $this->pageModel->getParentMenu(),
			'childPage' => $this->pageModel->getChildMenu(),
			'links' => $this->pageModel->getPageLink(),
			'logo' => $this->homeModel->getLogo(),
			'getContact' => $this->homeModel->getContact(),
		);
		$this->load->view('FrontPage/template', $data);
	}

	public function regStudent()
	{
		$data = array(
			'header' => 'FrontPage/header',
			'content' => 'FrontPage/registration',
			'footer' => 'FrontPage/footer',
			'tracks' => $this->trackModel->showTracks(),
			'page' => $this->pageModel->getParentMenu(),
			'childPage' => $this->pageModel->getChildMenu(),
			'links' => $this->pageModel->getPageLink(),
			'logo' => $this->homeModel->getLogo(),
			'getContact' => $this->homeModel->getContact(),
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'check' => $this->pageModel->checkEnrollment(),
			// 'viewtrack' => $this->trackModel->showTracks()
		);
		$this->load->view('FrontPage/template', $data);
	}

	public function setStudent()
	{

		$set = $this->accountModel->reserve();
		if ($set) {
			$this->session->set_flashdata('success', 'Registration Success!');
			redirect('');
		} else {
			$this->session->set_flashdata('error', 'Error');
			redirect($this->agent->referrer());
		}


	}

	public function myAccount()
	{
		$id = $this->session->userdata('id');
		$data = array(
			'header' => 'FrontPage/header',
			'content' => 'FrontPage/myAccount',
			'footer' => 'FrontPage/footer',
			'page' => $this->pageModel->getParentMenu(),
			'childPage' => $this->pageModel->getChildMenu(),
			'links' => $this->pageModel->getPageLink(),
			'logo' => $this->homeModel->getLogo(),
			'getContact' => $this->homeModel->getContact(),
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'account' => $this->studentModel->studentAccount($id),
			'info' => $this->studentModel->studentInfo($id),
			'details' => $this->studentModel->studentDetails($id),
			'check' => $this->pageModel->checkEnrollment(),
			'myrecord' => $this->tuitionModel->myRecord(),
			'requirements' => $this->db->get_where('student_requirement', array('studentId' => $_SESSION['id']))->result_array(),
		);
		$this->load->view('FrontPage/template', $data);
	}

	public function myPayments($sy)
	{
		$id = $this->session->userdata('id');
		$data = array(
			'header' => 'FrontPage/header',
			'content' => 'FrontPage/myPayments',
			'footer' => 'FrontPage/footer',
			'page' => $this->pageModel->getParentMenu(),
			'childPage' => $this->pageModel->getChildMenu(),
			'links' => $this->pageModel->getPageLink(),
			'logo' => $this->homeModel->getLogo(),
			'getContact' => $this->homeModel->getContact(),
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'check' => $this->pageModel->checkEnrollment(),
			'myrecord' => $this->tuitionModel->myRecord(),
			'payment' => $this->tuitionModel->myPayment($sy),
		);
		$this->load->view('FrontPage/template', $data);
	}

	public function changePassword()
	{
		$check = $this->profileModel->checkPass();
		if ($check) {
			$this->profileModel->changePass();
			$this->session->set_flashdata('success', 'Password Has Change!');
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', 'Invalid Old Password!');
			redirect($this->agent->referrer());
		}
	}

	public function reservation($id)
	{

		$this->tuitionModel->reservation($id);
		$this->session->set_flashdata('success', 'Reservation Sent!');
		redirect($this->agent->referrer());

	}


}