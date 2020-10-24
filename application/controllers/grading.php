<?php

class Grading extends CI_Controller {

	public function index($id){
		$this->db->where('id',$id);
		$subj = $this->db->get('subject')->result();
		// print_r($this->db->get_where('student_info',array('track' => $subj[0]->track))->result());

		$learners = array();
		$students = $this->db->get_where('student_info',array('track' => $subj[0]->track))->result();
		foreach($students as $learner){
			$this->db->where('userID', $learner->user_id);
			$user = $this->db->get('userinfo')->result();
			$learner->fname = $user[0]->firstName. ' '. $user[0]->lastName;
			array_push($learners, $learner);
		}

		$subjects = $this->db->get_where('subject', array('id' => $id))->result();
		$data = array(
    		'subject' => $subjects,
    		'learners' => $learners,
    		'id' => $id,
		);
		$this->load->view('Grading/index', $data);
	}

	function saveGrade(){
		$formData = $_POST['formData'];

		$this->db->where('subjectId', $formData['subjectId']);
		$this->db->where('quarter', $formData['quarter']);
		$row = $this->db->get('subject_hps')->result();
		$data = array(
			'subjectId' => $formData['subjectId'],
			'w1' => $formData['hpsww'][0],
			'w2' => $formData['hpsww'][1],
			'w3' => $formData['hpsww'][2],
			'w4' => $formData['hpsww'][3],
			'w5' => $formData['hpsww'][4],
			'w6' => $formData['hpsww'][5],
			'w7' => $formData['hpsww'][6],
			'w8' => $formData['hpsww'][7],
			'w9' => $formData['hpsww'][8],
			'w10' => $formData['hpsww'][9],
			'p1' => $formData['hpspt'][0],
			'p2' => $formData['hpspt'][1],
			'p3' => $formData['hpspt'][2],
			'p4' => $formData['hpspt'][3],
			'p5' => $formData['hpspt'][4],
			'p6' => $formData['hpspt'][5],
			'p7' => $formData['hpspt'][6],
			'p8' => $formData['hpspt'][7],
			'p9' => $formData['hpspt'][9],
			'p10' => $formData['hpspt'][9],
			'q1' => $formData['hpsqa'][0],
			'wtotal' => $formData['hpswwTotal'],
			'ptotal' => $formData['hpsptTotal'],
			'quarter' => $formData['quarter'],
			'sy' => $this->db->get_where('enrollment',array('status' => 1))->row('sy'),
		);
		if(COUNT($row) > 0){
			$this->db->where('subjectId', $formData['subjectId']);
			$this->db->where('quarter', $formData['quarter']);
			$this->db->where('sy', $formData['sy']);
			$this->db->update('subject_hps',$data);
		}else{
			$this->db->insert('subject_hps', $data);
			
		}
	}

	function insertGrade(){
		$sy = $this->db->get_where('enrollment',array('status' => 1))->row('sy');
		$formData = $_POST['formData'];
		$this->db->where('subjectId', $formData['subjectId']);
		$this->db->where('studentId', $formData['studentId']);
		$this->db->where('quarter', $formData['quarter']);
		$this->db->where('syId', $sy);
		$row = $this->db->get('grades')->result();

		$data  = array(
			'w1' => $formData['wwScore'][0],
			'w2' => $formData['wwScore'][1],
			'w3' => $formData['wwScore'][2],
			'w4' => $formData['wwScore'][3],
			'w5' => $formData['wwScore'][4],
			'w6' => $formData['wwScore'][5],
			'w7' => $formData['wwScore'][6],
			'w8' => $formData['wwScore'][7],
			'w9' => $formData['wwScore'][8],
			'w10' => $formData['wwScore'][9],
			'p1' => $formData['ptScore'][0],
			'p2' => $formData['ptScore'][1],
			'p3' => $formData['ptScore'][2],
			'p4' => $formData['ptScore'][3],
			'p5' => $formData['ptScore'][4],
			'p6' => $formData['ptScore'][5],
			'p7' => $formData['ptScore'][6],
			'p8' => $formData['ptScore'][7],
			'p9' => $formData['ptScore'][9],
			'p10' => $formData['ptScore'][9],
			'q1' => $formData['qaScore'][0],
			'wwws' => $formData['wwws'],
			'ptws' => $formData['ptws'],
			'wwps' => $formData['wwps'],
			'ptps' => $formData['ptps'],
			'qaws' => $formData['qaws'],
			'qaps' => $formData['qaps'],
			'qg' => $formData['qg'],
			'subjectId' => $formData['subjectId'],
			'quarter' => $formData['quarter'],
			'studentId' => $formData['studentId'],
			'wTotal' => $formData['wTotal'],
			'pTotal' => $formData['pTotal'],
			'initialGrade' => $formData['initialGrade'],
			'syId' => $this->db->get_where('enrollment',array('status' => 1))->row('sy'),
		);
		if(COUNT($row) > 0){
			$this->db->where('subjectId', $formData['subjectId']);
			$this->db->where('studentId', $formData['studentId']);
			$this->db->where('quarter', $formData['quarter']);
			$this->db->where('syId', $data['syId']);

			$this->db->update('grades',$data);
		}else{
			$this->db->insert('grades', $data);
			
		}
	}

	function viewGrades(){

		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/viewGrade',
			'userInfo' => $this->profileModel->getProfile(),

		);
		$this->load->view('DashBoard/template', $data);
	}
}