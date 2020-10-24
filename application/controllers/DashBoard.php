<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashBoard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();

	}

	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true || $this->session->userdata('role') == 'student') {
			redirect('');
			die();
		}
	}


	function saveBehavior()
	{

		$this->db->where('end', 1);
		$sy = $this->db->get('enrollment')->result_array();
		$this->db->where('sy', $sy[0]['sy']);
		$syId = $this->db->get('sy')->result_array();
		$data = $_POST;
		$data['sy'] = $syId[0]['sy'];

		$this->db->where('sy', $data['sy']);
		$this->db->where('studentId', $_POST['studentId']);
		$this->db->where('q', $_POST['q']);


		if (count($this->db->get('behavior')->result_array()) > 0) {

			$this->db->where('sy', $data['sy']);
			$this->db->where('studentId', $_POST['studentId']);
			$this->db->where('q', $_POST['q']);
			$this->db->update('behavior', $data);
		} else {

			$this->db->insert('behavior', $data);
		}

		redirect('Dashboard/classAdviser');
	}

	function setBehavior($studentId)
	{
		$studentID = $this->db->get_where('student_info', array('id' => $studentId))->row('user_id');
		$this->db->where('studentId', $studentId);
		$this->db->where('q', $_GET['q']);
		$behavior = $this->db->get('behavior')->result_array();
		$data = array(
			'header' => 'DashBoard/header',
			'studentId' => $studentId,
			'behavior' => $behavior,
			'q' => $_GET['q'],
			'student' => $this->db->get_where('userinfo', array('userID' => $studentID))->result_array(),
			'content' => 'DashBoard/setBehavior',
			'userInfo' => $this->profileModel->getProfile(),
			'subjects1' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 1))->result(),
			'subjects2' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 2))->result(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	function saveAttendance()
	{
		$attendance = $this->db->get_Where('attendance', array(
			'syId' => $this->input->post('syId'),
			'studentId' => $this->input->post('studentId'),
		))->result_array();

		$data = array(
			'syId' => $this->input->post('syId'),
			'studentId' => $this->input->post('studentId'),
			'juneS' => $this->input->post('noOfSchoolDays')['juneS'],
			'julyS' => $this->input->post('noOfSchoolDays')['julyS'],
			'augustS' => $this->input->post('noOfSchoolDays')['augustS'],
			'septemberS' => $this->input->post('noOfSchoolDays')['septemberS'],
			'octoberS' => $this->input->post('noOfSchoolDays')['octoberS'],
			'novemberS' => $this->input->post('noOfSchoolDays')['novemberS'],
			'decemberS' => $this->input->post('noOfSchoolDays')['decemberS'],
			'januaryS' => $this->input->post('noOfSchoolDays')['januaryS'],
			'februaryS' => $this->input->post('noOfSchoolDays')['februaryS'],
			'marchS' => $this->input->post('noOfSchoolDays')['marchS'],
			'juneP' => $this->input->post('noOfPresentDays')['juneP'],
			'julyP' => $this->input->post('noOfPresentDays')['julyP'],
			'augustP' => $this->input->post('noOfPresentDays')['augustP'],
			'septemberP' => $this->input->post('noOfPresentDays')['septemberP'],
			'octoberP' => $this->input->post('noOfPresentDays')['octoberP'],
			'novemberP' => $this->input->post('noOfPresentDays')['novemberP'],
			'decemberP' => $this->input->post('noOfPresentDays')['decemberP'],
			'januaryP' => $this->input->post('noOfPresentDays')['januaryP'],
			'februaryP' => $this->input->post('noOfPresentDays')['februaryP'],
			'marchP' => $this->input->post('noOfPresentDays')['marchP'],
			'juneA' => $this->input->post('noOfAbsenttDays')['juneA'],
			'julyA' => $this->input->post('noOfAbsenttDays')['julyA'],
			'augustA' => $this->input->post('noOfAbsenttDays')['augustA'],
			'septemberA' => $this->input->post('noOfAbsenttDays')['septemberA'],
			'octoberA' => $this->input->post('noOfAbsenttDays')['octoberA'],
			'novemberA' => $this->input->post('noOfAbsenttDays')['novemberA'],
			'decemberA' => $this->input->post('noOfAbsenttDays')['decemberA'],
			'januaryA' => $this->input->post('noOfAbsenttDays')['januaryA'],
			'februaryA' => $this->input->post('noOfAbsenttDays')['februaryA'],
			'marchA' => $this->input->post('noOfAbsenttDays')['marchA'],
		);

		if (count($attendance) > 0) {
			$this->db->where('syId', $this->input->post('syId'));
			$this->db->where('studentId', $this->input->post('studentId'));
			$this->db->update('attendance', $data);
		} else {
			$this->db->insert('attendance', $data);
		}

		echo json_encode(array('result' => 'success'));
	}

	function setAttendance($studenId)
	{

		$attendance = $this->db->get_Where('attendance', array(
			'syId' => $this->input->get('sy'),
			'studentId' => $studenId,
		))->result_array();

		$data = array(
			'attendance' => $attendance,
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/setAttendance',
			'studentId' => $studenId,
			'syId' => $this->input->get('sy'),
			'userInfo' => $this->profileModel->getProfile(),
			'subjects1' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 1))->result(),
			'subjects2' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 2))->result(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	function viewClass($id)
	{
		$this->db->where('id', $id);
		$section = $this->db->get('grade_section')->result_array()[0];

		$this->db->where('section', $section['section']);
		$students = $this->db->get('student_info')->result_array();

		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/viewClass',
			'students' => $students,
			'userInfo' => $this->profileModel->getProfile(),
			'subjects1' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 1))->result(),
			'subjects2' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 2))->result(),
		);
		$this->load->view('DashBoard/template', $data);

	}

	function classAdviser()
	{

		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/classAdviser',
			'userInfo' => $this->profileModel->getProfile(),
			'subjects1' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 1))->result(),
			'subjects2' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 2))->result(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	function removeSummerEnroll()
	{
		$id = $_POST['id'];
		$this->db->where('studentId', $id);
		$this->db->where('summerId', $_POST['summerId']);
		$this->db->delete('summer_enrollee');

//		redirect('Dashboard/viewSummer/'. $_POST['summerId']);
	}

	function summerEnroll()
	{
		$id = $_POST['id'];
		$data = array(
			'studentId' => $id,
			'summerId' => $_POST['summerId']
		);
		$this->db->insert('summer_enrollee', $data);

//		redirect('Dashboard/viewSummer/'. $_POST['summerId']);
	}

	function viewSummer($id)
	{
		$studentSubject = null;
		$subjects = null;
		$studentInfo = null;
		if (isset($_POST['studentId'])) {
			$this->db->where('user_id', $_POST['studentId']);
			$studentInfo = $this->db->get('student_info')->result_array();
			if ($studentInfo) {
				$this->db->where('track', $studentInfo[0]['track']);
				$subjects = $this->db->get('subject')->result_array();
			}
		}

		$this->db->where('summerId', $id);
		$summerEnrollee = $this->db->get('summer_enrollee')->result_array();
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/summerView',
			'id' => $id,
			'summerEnrollee' => $summerEnrollee,
			'userInfo' => $this->profileModel->getProfile(),
			'subjects' => $subjects,
			'studentInfo' => $studentInfo,
		);
		$this->load->view('DashBoard/template', $data);
	}

	function ViewFailedSubject($studentId)
	{
		$studentID = $this->db->get_where('student_info', array('id' => $studentId))->row('user_id');
//		echo $studentId;
		$sy = $this->db->get_where('enrollment', array(
			'status' => 1,
			'end' => 1
		))->result_array();

		$grades = $this->db->get_where('grades', array(
			'studentId' => $studentId,
			'syId' => $sy[0]['id'],
		))->result_array();

		$data = array(
			'syId' => $sy[0]['id'],
			'header' => 'DashBoard/header',
			'studentId' => $studentId,
			'content' => 'DashBoard/ViewFailedSubject',
			'student' => $this->db->get_where('userinfo', array('userID' => $studentID))->result_array(),
			'userInfo' => $this->profileModel->getProfile(),
			'grades' => $grades,
		);
		$this->load->view('DashBoard/template', $data);
	}

	function addSummerClass()
	{
		$data = array(
			'name' => $this->input->post('summer'),
			'sy' => $this->input->post('sy')
		);
		$this->db->insert('summer', $data);
		redirect('Dashboard/summer');
	}

	function addPresident()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addPresident',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	function setPresident()
	{
		$checkid = $this->profileModel->checkID();
		if ($checkid) {
			$this->session->set_flashdata('error', 'ID is not Available!');
			$this->addAccount();
		} else {
			$email = $this->profileModel->checkEmail();
			if ($email) {
				$this->accountModel->saveUserinfo();
				$this->session->set_flashdata('error', 'Email is not Available!');
				$this->addRegistrar();
			} else {
				$set = $this->accountModel->saveAccount();
				if ($set) {
					$this->logsModel->addAccount();
					$this->accountModel->saveUserinfo();
					$this->session->set_flashdata('success', 'Add Success!');
					redirect('DashBoard/accountList');
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect('DashBoard/addRegistrar');
				}
			}
		}
	}

	function summer()
	{

		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/summer',
			'userInfo' => $this->profileModel->getProfile(),
			'summerclasses' => $this->db->get('summer')->result_array()
		);
		$this->load->view('DashBoard/template', $data);
	}

	function viewStudentReport()
	{

		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/viewStudentReport',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	function viewStudentReportByGrade($grade)
	{

		$data = array(
			'header' => 'DashBoard/header',
			'grade' => $grade,
			'sections' => $this->db->get_where('grade_section', array('grade_level' => $grade))->result_array(),
			'content' => 'DashBoard/viewStudentReportByGrade',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	function viewStudentReportBySection($section)
	{
		$data = array(
			'students' => $this->db->get_where('student_account', array('section' => $section))->result_array(),
			'section' => $section,
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/viewStudentReportBySection',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	function gradeView($id)
	{
		$this->load->library('pdf.php');
		$pdf = new Pdf('L', 'mm', 'LEGAL', true, 'UTF-8', false);
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->SetTitle('Grade');

		$pdf->SetFont('', '', 8);
		$pdf->SetHeaderMargin(5);
		$pdf->SetTopMargin(5);
		$pdf->setFooterMargin(5);
		$pdf->SetAuthor('Author');
		$pdf->AddPage('L', 'A4');
		$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

		$sy = $_GET['sy'];
		$this->db->where('sy', $sy);
		$syId = $this->db->get('sy')->result()[0]->sy;
		// echo $id;
		$this->db->where('user_id', $id);
		$student = $this->db->get('student_info')->result_array()[0];

		$this->db->where('track', $student['track']);
		$this->db->where('semester', $_GET['sem']);
		$subjects = $this->db->get('subject')->result_array();

		$subjectLayout = '';
		$ga = 0;
		$counter = 0;


		$attendance = $this->db->get_where('attendance', array(
			'syId' => $syId,
			'studentId' => $student['id'],
		))->result_array()[0];

		$core = false;
		$applied = false;
		$specialize = false;

		foreach ($subjects as $subj) {
			$counter++;

			if ($_GET['sem'] == 1) {
				$quarter1 = '1';
				$quarter2 = '2';

				$studentId = $this->db->get_where('student_info', array('user_id' => $id))->row('id');
				$q1 = $this->db->get_where('grades', array('subjectId' => $subj['id'], 'quarter' => $quarter1, 'studentId' => $studentId))->row("qg");
				$q2 = $this->db->get_where('grades', array('subjectId' => $subj['id'], 'quarter' => $quarter2, 'studentId' => $studentId))->row("qg");

			} elseif ($_GET['sem'] == 2) {
				$quarter1 = '3';
				$quarter2 = '4';

				$studentId = $this->db->get_where('student_info', array('user_id' => $id))->row('id');
				$q1 = $this->db->get_where('grades', array('subjectId' => $subj['id'], 'quarter' => $quarter1, 'studentId' => $studentId))->row("qg");
				$q2 = $this->db->get_where('grades', array('subjectId' => $subj['id'], 'quarter' => $quarter2, 'studentId' => $studentId))->row("qg");

			}

			$q1 = $q1 > 0 ? $q1 : 65;
			$q2 = $q2 > 0 ? $q2 : 65;

			$ave = round(($q1 + $q2) / 2);
			$ga += $ave;
			$passed = $ave > 75 ? 'Passed' : 'Failed';
			if ($subj['category'] == 'Core' && $core == false) {
				$subjectLayout = $subjectLayout . '<tr bgcolor="#888">
	                <td colspan="5" border="1">&nbsp;&nbsp;&nbsp;Core Curriculum</td>
	            </tr>';
				$core = true;
			} else if ($subj['category'] == 'Applied' && $applied == false) {
				$subjectLayout = $subjectLayout . '<tr bgcolor="#888">
	                <td colspan="5" border="1">&nbsp;&nbsp;&nbsp;Applied</td>
	            </tr>';
				$applied = true;
			} else if ($subj['category'] == 'Specialized' && $specialize == false) {
				$subjectLayout = $subjectLayout . '<tr bgcolor="#888">
	                <td colspan="5" border="1">&nbsp;&nbsp;&nbsp;Specialized</td>
	            </tr>';
				$specialize = true;
			}

			$subjectLayout = $subjectLayout . '<tr>
                <td border="1"  width="100">&nbsp;&nbsp;&nbsp;' . $subj['subject'] . '</td>
                <td border="1"  style="text-align:center">' . $q1
				. '</td>
                <td border="1" style="text-align:center">' . $q2
				. '</td>
                <td border="1" style="text-align:center">' . $ave . '</td>
                <td border="1" style="text-align:center">' . $passed . '</td>
            </tr>';
			// $this->db->where('subjectId',$sub['subjectId']);
		}

		// echo $subjectLayout;

		$studentName = $this->db->get_where('userInfo', array('userID' => $id))->result_array()[0];
		$studentInfo = $this->db->get_where('student_info', array('user_id' => $id))->result_array()[0];
		@$adviserId= $this->db->get_where('grade_section', array('section' => $studentInfo['section']))->row('adviser_id');
		$thisAdviser = $this->db->get_where('userinfo', array('userID' => $adviserId))->result_array()[0];
		$adviser = $thisAdviser['lastName'].', '.$thisAdviser['firstName'];
		$tracks = $this->db->get_where('tracks', array('id' => $studentInfo['track']))->result_array();

		$this->db->where('studentId', $studentId);
		$this->db->where('sy', $syId);
		$this->db->where('q', 1);
		$q1Behavior = $this->db->get('behavior')->result_array();

		$this->db->where('studentId', $studentId);
		$this->db->where('sy', $syId);
		$this->db->where('q', 2);
		$q2Behavior = $this->db->get('behavior')->result_array();

		$this->db->where('studentId', $studentId);
		$this->db->where('sy', $syId);
		$this->db->where('q', 3);
		$q3Behavior = $this->db->get('behavior')->result_array();

		$this->db->where('studentId', $studentId);
		$this->db->where('sy', $syId);
		$this->db->where('q', 4);
		$q4Behavior = $this->db->get('behavior')->result_array();

		function stringToFloat($integer)
									{
										return number_format((float)$integer, 2, '.', '');
									}

		$layout =

			'
			<style>
				body{

				}
				h2{
					text-align:center;
					color: darkblue;
					font-family:cooper black;
					font-size: 16px;
					line-height: 0.0;
				}h3{
					text-align:center;
					color: black;
					font-family:cooper black;
					font-size: 14px;
					line-height: 0.0;
				}h4{
					text-align:center;
					color: black;
					font-family:times new Roman;
					font-size: 10px;
					line-height: 0.0;
				}
				p{
					text-align:center;
				}p.small {
				    line-height: 0.0;
				    font-family:times new Roman;
				    font-size: 12px;
				}td{
					
				}	


			</style>
			<br><br><br>
			<table>
				<thead>
					<tr>
						<td colspan="4" Style="margin-top:20px"></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="100px" style="margin-top:30px"><img src="uploads/home/logo2.jpg" alt="LOGO" style="width:75px; height:75px;"></td>				
						<td width="600px">
							 <p class="small"><h2>COMPUTER ARTS AND TECHNOLOGICAL COLLEGE, INC.</h2></p><br>
							 <p class="small"><h3>Computer-Oriented High School</h3></p>
		                    <p><h4>Balintawak Street, Albay District, Legazpi City</h4></p>
		                    <p class="small"><b>STUDENTS REPORT CARD</b></p><br><br>
						</td>
						<td></td>
						<td></td>						
					</tr>
				</tbody>
			</table>
                
                <table>
                
                <thead>
                    <tr>
                        <th width="50%">Name: <b>' . $studentName['lastName'] . ' ' . $studentName['firstName'] . ' </b></th>
                        <td colspan="2">Grade:<b> ' . $studentInfo['grade'] . '</b></td>

                    </tr>
                    <tr>
                        <th>Track: <b>Academic</b></th>                       
                        <th>Strand: '.$tracks[0]['track_name'].'</th>
                        <th>LRN: ' . $studentInfo['lrn'] . '</th>
                    </tr>
                    <tr><td colspan="2"></td></tr>
                    <tr>
                        <th><b>REPORT ON LEARNING</b></th>
                        <th colspan="2"><b>REPORT ON LEARNERS OBSERVED VALUES</b></th>
                    </tr>
                    <tr><td colspan="2"></td></tr>
                </thead>
				</table>
                
                <table class="table" >
                <tbody>
                    <tr>
                        <td>
                            <table class="table table-hover">
                                <thead>
                                    <tr style="text-align:center">
                                        <th border="1" rowspan="2" width="100">Subjects</th>
                                        <th border="1" colspan="2" width="120">Quarter</th>
                                        <th border="1" rowspan="2" width="50">Final Grade</th>
                                        <th border="1" rowspan="2" width="50">Remarks</th>
                                        
                                    </tr>
                                    <tr style="text-align:center">
                                        <th border="1" >1</th>
                                        <th border="1" >2</th>
                                    </tr>
                                </thead>
                                <tbody>' . $subjectLayout . '


						            <tr>
						            	<td border="1" style="text-align:center">General Ave.</td>
						            	<td border="1" colspan="2" style="text-align:center"> </td>
						            	<td border="1" style="text-align:center">' . stringToFloat($ga /$counter) . '</td>
						            	<td border="1"></td>
						            </tr>
						            <tr>
						            	<td colspan="4"></td>
						            </tr>
						            
						            <tr>
						            	<td colspan="4"></td>
						            </tr>
						            
						            <tr>
						            	<td colspan="4"></td>
						            </tr>
						            <tr>
                                    	<td colspan = "4"><br><br><br><br><br><br>
                                    		<p><b>Parent Signature over Printed Name:</b>____________________________</p>
                        					<p><b>Contact No:</b>________________________________________________</p>
                                    	</td>
                                    </tr>
						           
                                </tbody>

                            </table>                           
                        </td>
                        <td>
                        <table class="table table-hover" cellpadding="2" >
                            <thead >
                                <tr align="center">
                                    <th  border="1"  rowspan="2" width="70">Core Values</th>
                                    <th  border="1" rowspan="2" width="200">Behavior Statement</th>
                                    <th  border="1" colspan="4" width="130">Quarter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td border="1" style="text-align:center">Q1</td>
                                    <td border="1" style="text-align:center">Q2</td>
                                     <td border="1" style="text-align:center">Q3</td>
                                    <td border="1" style="text-align:center">Q4</td>
								                                    
                                </tr>
                                <tr>
                                    <td  border="1" rowspan="2" width="70" text-align="center">1. Maka Diyos</td>
                                    <td  border="1" width="200">Expresses ones spiritual belief while repsecting the spiritual belief of others.</td>
                                    
                                    <td border="1" style="text-align:center">' . @$q1Behavior[0]['d1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q2Behavior[0]['d1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q3Behavior[0]['d1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q4Behavior[0]['d1'] . '</td>
                                    
                                    </tr>


                                    <tr>
                                    <td  border="1" width="200">Shows adherence to ethical principles by upholding the truth in all undertaking.</td>
                                    
                                    <td border="1" style="text-align:center">' . @$q1Behavior[0]['d2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q2Behavior[0]['d2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q3Behavior[0]['d2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q4Behavior[0]['d2'] . '</td>
                                    
                                    </tr>

                                    <tr>
                                    <td  border="1" rowspan="2" width="70" text-align="center">2. Maka Tao</td>
                                    <td  border="1" width="200">Is sensitive to individual to individual, social and cultural differences: resists stereotyping people</td>
                                    
                                    <td border="1" style="text-align:center">' . @$q1Behavior[0]['t1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q2Behavior[0]['t1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q3Behavior[0]['t1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q4Behavior[0]['t1'] . '</td>
                                    
                                    </tr>

                                    <tr>
                                    <td border="1"  width="200">Demonstrate contributions towards solidarity</td>
                                    <td border="1" style="text-align:center">' . @$q1Behavior[0]['t2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q2Behavior[0]['t2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q3Behavior[0]['t2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q4Behavior[0]['t2'] . '</td>' . '
                                    </tr>

                                    <tr>
                                    <td  border="1" rowspan="2" width="70" text-align="center">3. Maka Kalikasan</td>
                                    <td  border="1" width="200">Cares for the Environment and utilized resources wisely. judisciousely, and economically</td>
                                    
                                    <td border="1" style="text-align:center">' . @$q1Behavior[0]['k1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q2Behavior[0]['k1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q3Behavior[0]['k1'] . '</td>
                                    <td border="1"style="text-align:center" >' . @$q4Behavior[0]['k1'] . '</td>
                                    </tr>

                                    <tr>
                                    <td border="1"  width="200">Demonstrate pride in being filipino, exercise the rights and responsibility of a filipino citizen</td>
                                    
                                    <td border="1" style="text-align:center">' . @$q1Behavior[0]['k2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q2Behavior[0]['k2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q3Behavior[0]['k2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q4Behavior[0]['k2'] . '</td>
                                    </tr>

                                    <tr>
                                    <td border="1"  rowspan="2" width="70" text-align="center">4. Maka Bansa</td>
                                    <td border="1"  width="200">Demonstrate pride in being filipino, exercise the rights and responsibility of a filipino citizen</td>
                                    
                                    <td border="1" style="text-align:center">' . @$q1Behavior[0]['b1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q2Behavior[0]['b1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q3Behavior[0]['b1'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q4Behavior[0]['b1'] . '</td>
                                    </tr>

                                    <tr>
                                    <td border="1"  width="200">Demonstrate appropriate Behaviourin carryingout activities in the school, community & country</td>
                                    
                                    <td border="1" style="text-align:center">' . @$q1Behavior[0]['b2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q2Behavior[0]['b2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q3Behavior[0]['b2'] . '</td>
                                    <td border="1" style="text-align:center">' . @$q4Behavior[0]['b2'] . '</td>
                                    </tr>
                                    <br><br>
                                    <table>
                                    	<thead>                                    		
                                    		<tr>
                                    			<td style="font-size:8px; line-height: 10px" width="95px"><b>Descriptions</b><hr width="100px"></td>
                                    			<td style="font-size:8px; line-height: 10px" width="85px"><b>Grading Scale</b><hr width="85px"></td>
                                    			<td style="font-size:8px; line-height: 10px" width="60px"><b>Marking</b><hr width="60px"></td>
                                    			<td style="font-size:8px; line-height: 10px" width="60px"><b>Remarks</b><hr width="60px"></td>
                                    			<td style="font-size:8px; line-height: 10px" width="95px"><b>Non-Numerical Rating</b><hr width="85px"></td>                                    			
                                    		</tr>                                    		
                                    	</thead>                                    	
                                    	<tbody>
                                    		<tr>
	                                    		<td>Outstanding</td>
	                                    		<td>90-100</td>
	                                    		<td>Passed</td>
	                                    		<td>AO</td>
	                                    		<td>Always Observed</td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td>Very Satisfactory</td>
	                                    		<td>85-89</td>
	                                    		<td>Passed</td>
	                                    		<td>SO</td>
	                                    		<td>Sometimes Observed</td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td>Satisfactory</td>
	                                    		<td>80-84</td>
	                                    		<td>Passed</td>
	                                    		<td>RO</td>
	                                    		<td>Rarely Observed</td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td>Fairly Observed</td>
	                                    		<td>75-79</td>
	                                    		<td>Passed</td>
	                                    		<td>NO</td>
	                                    		<td>Not Observed</td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td>Did not Meet Expectation</td>
	                                    		<td>Below 75</td>
	                                    		<td>Failed</td>
	                                    		<td></td>
	                                    		<td></td>
	                                    	</tr><br>
	                                    	<tr>
	                                    		<td></td>
	                                    		<td></td>
	                                    		<td></td>
	                                    		<td width="30%" style="font-size:8px; align="center" line-height: 50px"><p  style="border-bottom: 1px solid #111">'.$adviser.'</p></td>
	                                    		<td></td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td></td>
	                                    		<td></td>
	                                    		<td></td>
	                                    		<td width="30%" align="center">Adviser</td>
	                                    		<td></td>
	                                    	</tr>
                                    	</tbody>
                                    </table> 

                            </tbody>                                                         
                        </table>                                          
                        </td>                         
                    </tr>                    
                </tbody>
                </table>
                           ';

		$totalS = 0;
		$totalA = 0;
		$totalP = 0;
		foreach($attendance as $att => $val){
			if(substr($att, -1) == 'S'){
				$totalS += $val;
			}elseif(substr($att, -1) == 'P'){
				$totalP += $val;
			}elseif(substr($att, -1) == 'A'){
				$totalA += $val;
			}
		}

		$tracks = $this->db->get_where('tracks', array('id' => $studentInfo['track']))->result_array();
		@$principalId = $this->db->get_where('accounts', array('role' => 'principal'))->row('id');
		$thisData = $this->db->get_where('userinfo', array('userID' => $principalId))->result_array()[0];
		$principal = $thisData['lastName'].', '.$thisData['firstName'];


		@$adviserId= $this->db->get_where('grade_section', array('section' => $studentInfo['section']))->row('adviser_id');
		$thisAdviser = $this->db->get_where('userinfo', array('userID' => $adviserId))->result_array()[0];
		$adviser = $thisAdviser['lastName'].', '.$thisAdviser['firstName'];

		$layout1 = '<table>
	<tr>
	<td width="50%">
	
		<br><br>
		<table align="center">
			<thead>
				<tr>
					<td colspan=12><b>REPORT ON ATTENDANCE</b></td>
				</tr>
			</thead>
			<tr>
                <td border="1" width="100">Days</td>
                <td border="1" width="24">Jun</td>
                <td border="1" width="24">Jul</td>
                <td border="1" width="24">Aug</td>
                <td border="1" width="24">Sept</td>
                <td border="1" width="24">Oct</td>
                <td border="1" width="24">Nov</td>
                <td border="1" width="24">Dec</td>
                <td border="1" width="24">Jan</td>
                <td border="1" width="24">Feb</td>
                <td border="1" width="24">Mar</td>
                <td border="1" width="24">Total</td>
            </tr>
            <tr>
                <td border="1" width="100">No. of school days</td>
                <td border="1" width="24">' . $attendance["juneS"] . '</td>
				<td border="1" width="24">' . $attendance["julyS"] . '</td>
				<td border="1" width="24">' . $attendance["augustS"] . '</td>
				<td border="1" width="24">' . $attendance["septemberS"] . '</td>
				<td border="1" width="24">' . $attendance["octoberS"] . '</td>
				<td border="1" width="24">' . $attendance["novemberS"] . '</td>
				<td border="1" width="24">' . $attendance["decemberS"] . '</td>
				<td border="1" width="24">' . $attendance["januaryS"] . '</td>
				<td border="1" width="24">' . $attendance["februaryS"] . '</td>
				<td border="1" width="24">' . $attendance["marchS"] . '</td>
				<td border="1" width="24">' . $totalS. '</td> 
            </tr>
            <tr>                 		
                <td border="1" width="100">No. of days present</td>
                <td border="1" width="24">' . $attendance["juneP"] . '</td>
				<td border="1" width="24">' . $attendance["julyP"] . '</td>
				<td border="1" width="24">' . $attendance["augustP"] . '</td>
				<td border="1" width="24">' . $attendance["septemberP"] . '</td>
				<td border="1" width="24">' . $attendance["octoberP"] . '</td>
				<td border="1" width="24">' . $attendance["novemberP"] . '</td>
				<td border="1" width="24">' . $attendance["decemberP"] . '</td>
				<td border="1" width="24">' . $attendance["januaryP"] . '</td>
				<td border="1" width="24">' . $attendance["februaryP"] . '</td>
				<td border="1" width="24">' . $attendance["marchP"] . '</td>
				<td border="1" width="24">' . $totalP . '</td>
            </tr>
            <tr>                 		
                <td border="1" width="100">No. of days Absent</td>
                <td border="1" width="24">' . $attendance["juneA"] . '</td>
				<td border="1" width="24">' . $attendance["julyA"] . '</td>
				<td border="1" width="24">' . $attendance["augustA"] . '</td>
				<td border="1" width="24">' . $attendance["septemberA"] . '</td>
				<td border="1" width="24">' . $attendance["octoberA"] . '</td>
				<td border="1" width="24">' . $attendance["novemberA"] . '</td>
				<td border="1" width="24">' . $attendance["decemberA"] . '</td>
				<td border="1" width="24">' . $attendance["januaryA"] . '</td>
				<td border="1" width="24">' . $attendance["februaryA"] . '</td>
				<td border="1" width="24">' . $attendance["marchA"] . '</td>
				<td border="1" width="24">' . $totalA. '</td> 
            </tr>
		</table>
		<br><br>
		<table width="93%" cellpadding="4" style="font-size: 10px">
			<tr align="center">
				<td colspan="2"><h3>PARENTS/GUARDIAN PRINTED NAME AND SIGNATURE<br></h3></td>
			</tr>
			<tr>
				<td width="27%"><p>First Grading</p></td>
				<td width="73%"><p style="border-bottom: 1px solid #111"></p></td>
			</tr>
			<tr>
				<td width="27%"><p>Second Grading</p></td>
				<td width="73%"><p style="border-bottom: 1px solid #111"></p></td>
			</tr>
			<tr>
				<td width="27%"><p>Third Grading</p></td>
				<td width="73%"><p style="border-bottom: 1px solid #111"></p></td>
			</tr>
			<tr>
				<td width="27%"><p>Fourth Grading</p></td>
				<td width="73%"><p style="border-bottom: 1px solid #111"></p></td>
			</tr>
		</table> 
		<br><br>
		<table width="94%" cellpadding="0" style="font-size: 10px">
			<tr align="center">
				<td><h3>CERTIFICATE OF ELIGIBLITY<br></h3></td>
			</tr>
			<tr>
				<td><p>Elibility for transfer and admission to __________________________________</p></td>
			</tr>
			<tr>
				<td><p>Has advance unit in _______________________________________________</p></td>
			</tr>
			<tr>
				<td><p>Lack unit in ______________________________________________________</p></td>
			</tr>
			<tr>
				<td><p>Date ________________________________</p></td>
			</tr>
		</table>       
		<br><br>
		<br><br>
			
		<table cellpadding="0" style="font-size: 10px">
		<tr>
			<td></td>
			<td width="40%" align="center">
				<p style="border-bottom: 1px solid #111">'.$principal.'</p>
			</td>   
		</tr>
		<tr>
			<td></td>
			<td width="40%" align="center">
				<p>Principal</p>
			</td>   
		</tr>
		</table>       
		<br>
		<table width="94%" cellpadding="0" style="font-size: 10px">
			<tr align="center">
				<td><h3>CERTIFICATE OF TRANSFER<br></h3></td>
			</tr>
			<tr>
				<td><p>Admitted to ______________________________________________________</p></td>
			</tr>
			<tr>
				<td><p>Elegibility for admission to __________________________________________</p></td>
			</tr>
			<tr>
				<td><p>Date ________________________________</p></td>
			</tr>
		</table>       
		<br><br>
		<br>
		<table cellpadding="0" style="font-size: 10px">
		<tr>
			<td></td>
			<td width="40%" align="center">
				<p style="border-bottom: 1px solid #111">'.$principal.'</h3>
			</td>   
		</tr>
		<tr>
			<td></td>
			<td width="40%" align="center">
				<p>Principal</p>
			</td>   
		</tr>
		</table>
	</td>
<td>
<style>
				h2{
					text-align:center;
					color: darkblue;
					font-family:cooper black;
					font-size: 12px;

				}h4{
					text-align:center;
					color: black;
					font-family:cooper black;
					font-size: 10px;
				}

</style>
	<table align="center" style="font-size: 10px">
		<thead>
			<tr>
				<td style="text-align:left; font-size:8px">Form 138-A</td>
			</tr>
		</thead>
		<tr>
			<td>Republic of the Philippines</td>
		</tr>
		<tr>
			<td><b>DEPARTMENT OF EDUCATION</b></td>
		</tr>
		<tr>
			<td>Region V</td>
		</tr>
		<tr>
			<td>Division of Legazpi City
			<br>
			</td>
		</tr>
		<tr>
			<td>
				<img src="uploads/home/logo2.jpg" alt="LOGO" style="width:90px; height:90px;">		
		</td>
		</tr>
		<tr>
			<td><h2>COMPUTER ARTS AND TECHNOLOGICAL COLLEGE<br>LEGAZPI CAMPUS, Inc</h3></td>
		</tr>
		<tr>
			<td><h4><b>COMPUTER-ORIENTED HIGH SCHOOL</b></h4></td>
		</tr>
		<tr>
			<td>Balintwak Street, Albay District Legazpi City</td>
		</tr>
	</table>
	<br><br>
	
	<table style="font-size: 9px">
		<tr>
			<td width="10%">Name</td>
			<td width="40%" colspan="3"><p style="border-bottom: 1px solid #111; text-transform:capitalize">'.$studentName['lastName'].', '.$studentName['firstName'].' '.$studentName['Mi'].'</p></td>
		</tr>
		<tr>
			<td width="10%">Age</td>
			<td width="40%"><p style="border-bottom: 1px solid #111">'.$studentInfo['age'].'</p></td>
			<td width="10%" align="center">Sex</td>
			<td width="40%"><p style="border-bottom: 1px solid #111">'.$studentInfo['gender'].'</p></td>
		</tr>
		<tr>
			<td width="10%">Grade</td>
			<td width="40%"><p style="border-bottom: 1px solid #111">'.$studentInfo['grade'].'</p></td>
			<td width="10%" align="center">Section</td>
			<td width="40%"><p style="border-bottom: 1px solid #111">'.$studentInfo['section'].'</p></td>
		</tr>
		<tr>
			<td width="10%">LRN</td>
			<td width="40%"><p style="border-bottom: 1px solid #111">'.$studentInfo['lrn'].'</p></td>
			<td width="10%" align="center">S.Y</td>
			<td width="40%"><p style="border-bottom: 1px solid #111">'.$syId.'</p></td>
		</tr>
		<tr>
			<td width="10%">Track</td>
			<td width="40%" colspan="3"><p style="border-bottom: 1px solid #111">'.$tracks[0]['category'].'</p></td>
		</tr>
		<tr>
			<td width="10%">Strand</td>
			<td width="40%" colspan="2"><p style="border-bottom: 1px solid #111">'.$tracks[0]['track_name'].'</p></td>
		</tr>
	</table>
	
	<br><br>
	<table style="font-size: 10px">
		<tr>
			<td>Dear Parents/Guardians,<br></td>
		</tr>
		<tr>
			<td style="text-indent:20px">This Report Card shows the ability of your son/daughter in the different learning areas, given by the respected
			subjects teachers. This is also reveals your childs rating. Should you desire to know more about the progress of your child
			please feel free to contact the teachers concerned.
	<br>
	<br></td>
		</tr>
	</table>
	<table style="font-size: 10px">
	<tr>
		<td width="10%"><p></p></td>
		<td width="30%" align="center"><p  style="border-bottom: 1px solid #111">'.$principal.'</p></td>
		<td width="20%"></td>
		<td width="30%" align="center"><p  style="border-bottom: 1px solid #111" >'.$adviser.'</p></td>
	</tr>
	<tr>
		<td width="10%"><p></p></td>
		<td width="30%" align="center"><b>Principal</b></td>
		<td width="20%"><p></p></td>
		<td width="30%" align="center"><b>Adiviser</b></td>
	</tr>
	</table>
</td>
</tr>
</table>';
		$pdf->writeHTML($layout, true, false, true, false, '');
		$pdf->AddPage();
		$pdf->writeHTML($layout1, true, false, true, false, '');
		ob_clean();
		$pdf->Output('student_grade.pdf', 'I');

	}

	function summerList()
	{

		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/summerList',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	function enrollSummerStudent($id)
	{
		$this->db->where('studentId', $id);
		$this->db->update('summer_enrollee', array('status' => 1));


		redirect('Dashboard/summerList');
	}

	function summerSearch()
	{
		$studentID = $this->input->post('studentId');

		$this->db->where('user_id', $studentID);
		$student = $this->db->get('student_info')->result_array();
		$sy = $this->db->get_where('enrollment', array(
			'status' => 1,
			'end' => 1
		))->result_array();
		if (count($student) > 0) {
			$data = array(
				'header' => 'DashBoard/header',
				'content' => 'DashBoard/summerList',
				'student' => $this->db->get_where('userinfo', array('userID' => $studentID))->result_array()[0],
				'subjects' => $this->db->get_where('grades', array(
					'syId' => $sy[0]['sy'],
					'studentId' => $student[0]['id']
				))->result_array(),
				'studentInfo' => $student,
				'userInfo' => $this->profileModel->getProfile(),
			);
			$this->load->view('DashBoard/template', $data);
		} else {
			echo 'Student ID NOT Found! or Not Enrolled on Summer Classes';
		}
	}

	function studentGrades()
	{

		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/gradeReports',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function index()
	{
		$addProfile = $this->profileModel->thisProfile();
		if ($addProfile) {
			redirect('FrontPage/setProfile');
		}
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/index',
			'check' => $this->pageModel->checkEnrollment(),
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'subjects1' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 1))->result(),
			'subjects2' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 2))->result(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function accountList()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/accountList',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function studentWithBackAccount()
	{

		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/backaccount',
			'students' => $this->db->get_where('student_account', array('back_account >=' > '0'))->result_array(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function studentList()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/student',

			'userInfo' => $this->profileModel->getProfile(),
			'getGrade' => $this->gradeLevelModel->getGrade(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function viewByGrade()
	{
		$this->session->set_userdata(array(
			'sGrade' => $this->input->post('grade'),
		));
		redirect('DashBoard/studentListGrade');
	}

	/* public function viewBySection(){
	$this->session->set_userdata(array(
	'sSection' => $this->input->post('section'),
	));
	redirect('DashBoard/studentListSection');
	}*/
	public function studentListGrade()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/studentGrade',
			'userInfo' => $this->profileModel->getProfile(),
			'getGrade' => $this->gradeLevelModel->getGrade(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	/* public function studentListSection(){
	$data = array(
	'header' => 'DashBoard/header',
	'content' => 'DashBoard/addGrade',
	'userInfo' => $this->profileModel->getProfile(),
	'getGrade' => $this->gradeLevelModel->getGrade(),
	'getSection' => $this->gradeModel->getSection(),
	);
	$this->load->view('DashBoard/template', $data);
	}*/
	public function notEnrolled()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/notEnrolled',
			'userInfo' => $this->profileModel->getProfile(),
			'getGrade' => $this->gradeLevelModel->getGrade(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function viewNE()
	{
		$this->session->set_userdata(array(
			'nGrade' => $this->input->post('grade'),
		));
		redirect('DashBoard/notEnrolledGrade');
	}

	public function notEnrolledGrade()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/notEnrolledGrade',
			'userInfo' => $this->profileModel->getProfile(),
			'getGrade' => $this->gradeLevelModel->getGrade(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function addAccount()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addAccount',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function account($id)
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/account',
			'account' => $this->accountModel->getAccount($id),
			'info' => $this->accountModel->getInfo($id),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function updateAccount()
	{
		$check = $this->accountModel->checkEmail();
		if ($check) {
			$this->session->set_flashdata('error', 'Email Already use!');
			redirect($this->agent->referrer());
		} else {
			$set = $this->accountModel->updateAccount();
			if ($set) {
				$this->logsModel->addAccount();
				$this->accountModel->updateInfo();
				$this->session->set_flashdata('success', 'Account Updated!');
				redirect($this->agent->referrer());
			} else {
				$this->session->set_flashdata('error', 'Somethings Error!');
				redirect($this->agent->referrer());
			}
		}

	}

	public function setAccount()
	{
		$checkid = $this->profileModel->checkID();
		if ($checkid) {
			$this->session->set_flashdata('error', 'ID is not Available!');
			$this->addAccount();
		} else {
			$email = $this->profileModel->checkEmail();
			if ($email) {
				$this->session->set_flashdata('error', 'Email is not Available!');
				$this->addAccount();
			} else {
				$set = $this->accountModel->saveAccount();
				if ($set) {
					$this->logsModel->addAccount();
					$this->accountModel->saveUserinfo();
					$this->session->set_flashdata('success', 'Add Success!');
					redirect('DashBoard/accountList');
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect('DashBoard/addAccount');
				}
			}
		}

	}

	public function addRegistrar()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addRegistrar',
			'countRegistrar' => $this->db->get_where('accounts', array('role' => 'registrar'))->num_rows(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function setRegistrar()
	{
		$checkid = $this->profileModel->checkID();
		if ($checkid) {
			$this->session->set_flashdata('error', 'ID is not Available!');
			$this->addAccount();
		} else {
			$email = $this->profileModel->checkEmail();
			if ($email) {
				$this->accountModel->saveUserinfo();
				$this->session->set_flashdata('error', 'Email is not Available!');
				$this->addRegistrar();
			} else {
				$set = $this->accountModel->saveAccount();
				if ($set) {
					$this->logsModel->addAccount();
					$this->accountModel->saveUserinfo();
					$this->session->set_flashdata('success', 'Add Success!');
					redirect('DashBoard/accountList');
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect('DashBoard/addRegistrar');
				}
			}
		}

	}

	public function addTreasurer()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addTreasurer',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function setTreasurer()
	{
		$checkid = $this->profileModel->checkID();
		if ($checkid) {
			$this->session->set_flashdata('error', 'ID is not Available!');
			$this->addAccount();
		} else {
			$email = $this->profileModel->checkEmail();
			if ($email) {
				$this->accountModel->saveUserinfo();
				$this->session->set_flashdata('error', 'Email is not Available!');
				$this->addTreasurer();
			} else {
				$set = $this->accountModel->saveAccount();
				if ($set) {
					$this->logsModel->addAccount();
					$this->accountModel->saveUserinfo();
					$this->session->set_flashdata('success', 'Add Success!');
					redirect('DashBoard/accountList');
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect('DashBoard/addTreasurer');
				}
			}
		}

	}

	public function addFaculty()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addFaculty',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function addPrincipal()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addPrincipal',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function setFaculty()
	{
		$checkid = $this->profileModel->checkID();
		if ($checkid) {
			$this->session->set_flashdata('error', 'ID is not Available!');
			$this->addAccount();
		} else {
			$email = $this->profileModel->checkEmail();
			if ($email) {
				$this->accountModel->saveUserinfo();
				$this->session->set_flashdata('error', 'Email is not Available!');
				$this->addFaculty();
			} else {
				$set = $this->accountModel->saveAccount();
				if ($set) {
					$this->logsModel->addAccount();
					$this->accountModel->saveUserinfo();
					$this->session->set_flashdata('success', 'Add Success!');
					redirect('DashBoard/accountList');
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect('DashBoard/addFaculty');
				}
			}
		}

	}

	public function setPrincipal()
	{
		$checkid = $this->profileModel->checkID();
		if ($checkid) {
			$this->session->set_flashdata('error', 'ID is not Available!');
			$this->addAccount();
		} else {
			$email = $this->profileModel->checkEmail();
			if ($email) {
				$this->accountModel->saveUserinfo();
				$this->session->set_flashdata('error', 'Email is not Available!');
				$this->addPrincipal();
			} else {
				$set = $this->accountModel->saveAccount();
				if ($set) {
					$this->logsModel->addAccount();
					$this->accountModel->saveUserinfo();
					$this->session->set_flashdata('success', 'Add Success!');
					redirect('DashBoard/accountList');
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect('DashBoard/addPrincipal');
				}
			}
		}

	}

	public function addStudent()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addStudent',
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'getSection' => $this->gradeLevelModel->getSection(),
			'userInfo' => $this->profileModel->getProfile(),
			'tracks' => $this->trackModel->showTracks(),
			'vouchers' => $this->db->get('vouchers')->result(),
//            'gradelvl' => $this->studentModel->studentGradeLevel(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function setStudent()
	{
		$checkid = $this->profileModel->checkID();
		if ($checkid) {
			$this->session->set_flashdata('error', 'ID is not Available!');
			$this->addStudent();
		} else {
			$email = $this->profileModel->checkEmail();
			if ($email) {
				$this->session->set_flashdata('error', 'Email is not Available!');
				$this->addStudent();
			} else {
				$set = $this->accountModel->saveAccount();
				if ($set) {
					$this->logsModel->addAccount();
					$this->accountModel->saveUserinfo();
					$this->accountModel->saveStudinfo();
					$this->accountModel->deleteRes();
					$this->session->set_flashdata('success', 'Registration Success!');
					redirect('DashBoard/studentView/' . $this->input->post('id'));
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect($this->agent->referrer());
				}
			}
		}

	}

	public function addAsstreg()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addAsstreg',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function setAsstreg()
	{
		$checkid = $this->profileModel->checkID();
		if ($checkid) {
			$this->session->set_flashdata('error', 'ID is not Available!');
			$this->addAccount();
		} else {
			$email = $this->profileModel->checkEmail();
			if ($email) {
				$this->accountModel->saveUserinfo();
				$this->session->set_flashdata('error', 'Email is not Available!');
				$this->addAsstreg();
			} else {
				$set = $this->accountModel->saveAccount();
				if ($set) {
					$this->logsModel->addAccount();
					$this->accountModel->saveUserinfo();
					$this->session->set_flashdata('success', 'Add Success!');
					redirect('DashBoard/addAsstreg');
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect('DashBoard/addAsstreg');
				}
			}
		}

	}

	public function profile()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/profile',
			// 'subjects' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id')))->result(),
			'subjects1' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 1))->result(),
			'subjects2' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 2))->result(),

			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function myprofile()
	{
		$check = $this->profileModel->addProfile();
		if ($check) {
			redirect('DashBoard/profile');
		} else {
			redirect('DashBoard/profile');
		}
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

	public function page()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/page',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function addPage()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addPage',
			'parent' => $this->pageModel->getParent(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function addNewPage()
	{
		$exist = $this->pageModel->checkPageExist();
		if ($exist) {
			$this->session->set_flashdata('error', 'Page Title Exist!');
			$this->addPage();
		} else {
			$check = $this->pageModel->addThisPage();
			if ($check) {
				$this->logsModel->addPage();
				$this->session->set_flashdata('success', 'Page Save!');
				redirect($this->agent->referrer());
			}
		}
	}

	public function updatePage($id)
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/updatePage',
			'page' => $this->pageModel->getPage($id),
			'parent' => $this->pageModel->getParent(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function updateSavePage()
	{
		$check = $this->pageModel->updateThisPage();
		if ($check) {
			$this->session->set_flashdata('success', 'Page Updated!');
			redirect('DashBoard/updatePage/' . $this->input->post('id'));
		}
	}

	public function staticPage()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/static',
			'logo' => $this->homeModel->getLogo(),
			'banner' => $this->homeModel->getBanner(),
			'getAbout' => $this->homeModel->getAbout(),
			'getCaption' => $this->homeModel->getCaption(),
			'getMission' => $this->homeModel->getMission(),
			'getVision' => $this->homeModel->getVision(),
			'getContact' => $this->homeModel->getContact(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function setAbout()
	{
		$save = $this->homeModel->addAbout();
		if ($save) {
			$this->session->set_flashdata('success', 'Successfuly Save!');
			redirect('DashBoard/staticPage');
		} else {
			$this->session->set_flashdata('error', 'Error saving data!');
			redirect('DashBoard/staticPage');
		}
	}

	public function setCaption()
	{
		$save = $this->homeModel->addBannerCaption();
		if ($save) {
			$this->session->set_flashdata('success', 'Successfuly Save!');
			redirect('DashBoard/staticPage');
		} else {
			$this->session->set_flashdata('error', 'Error saving data!');
			redirect('DashBoard/staticPage');
		}
	}

	public function setMission()
	{
		$save = $this->homeModel->addMission();
		if ($save) {
			$this->session->set_flashdata('success', 'Successfuly Save!');
			redirect('DashBoard/staticPage');
		} else {
			$this->session->set_flashdata('error', 'Error saving data!');
			redirect('DashBoard/staticPage');
		}
	}

	public function setVision()
	{
		$save = $this->homeModel->addVision();
		if ($save) {
			$this->session->set_flashdata('success', 'Successfuly Save!');
			redirect('DashBoard/staticPage');
		} else {
			$this->session->set_flashdata('error', 'Error saving data!');
			redirect('DashBoard/staticPage');
		}
	}

	public function setContact()
	{
		$save = $this->homeModel->addContact();
		if ($save) {
			$this->session->set_flashdata('success', 'Successfuly Save!');
			redirect('DashBoard/staticPage');
		} else {
			$this->session->set_flashdata('error', 'Error saving data!');
			redirect('DashBoard/staticPage');
		}
	}

	public function studentView($id)
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/viewStudent',
			'account' => $this->studentModel->studentAccount($id),
			'info' => $this->studentModel->studentInfo($id),
			'details' => $this->studentModel->studentDetails($id),
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'getSection' => $this->gradeLevelModel->getSection(),
			'userInfo' => $this->profileModel->getProfile(),
			'tracks' => $this->trackModel->showTracks(),
			'vouchers' => $this->db->get('vouchers')->result(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function prints($id)
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/prints',
			'account' => $this->studentModel->studentAccount($id),
			'info' => $this->studentModel->studentInfo($id),
			'details' => $this->studentModel->studentDetails($id),
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'getSection' => $this->gradeLevelModel->getSection(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),
			'check' => $this->pageModel->checkEnrollment(),
			'bal' => $this->tuitionModel->totalBal($id),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function updateStudent()
	{
		// print_r($_POST);
		$this->studentModel->saveUserinfo();
		$this->studentModel->saveStudinfo();
		$this->session->set_flashdata('success', 'Successfuly Updated!');
		redirect($this->agent->referrer());
	}

	public function acceptStudent($id)
	{
		$this->studentModel->acceptStudent($id);
		$this->studentModel->saveStudinfo();
		$this->session->set_flashdata('success', 'Successfuly Updated!');
		redirect($this->agent->referrer());
	}

	public function gradeLevel()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/grade',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function subject()
	{

		$sy = $this->db->get_where('enrollment', array('end' => 1))->row('sy');
		$semester = $this->db->get_where('sy', array('sy' => $sy))->row('semesters');
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/subject',
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'instructors' => $this->accountModel->getFaculty(),
			'tracks' => $this->trackModel->showTracks(),
			'userInfo' => $this->profileModel->getProfile(),
			'semesters' => $semester
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function section()
	{
		$faculties = $this->db->get_where('accounts', array('role' => 'faculty'))->result_array();
		$counter = 0;
		foreach ($faculties as $ins) {
			$this->db->where('userID', $ins['id']);
			$user = $this->db->get('userInfo')->result_array()[0];

			$faculties[$counter]['first_name'] = $user['firstName'];
			$faculties[$counter]['last_name'] = $user['lastName'];
			$counter++;
		}
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/section',
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'userInfo' => $this->profileModel->getProfile(),
			'faculties' => $faculties
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function tuition()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/tuition',
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function bookFee()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/bookFee',
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function gradeFee()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/gradeFee',
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function payment($id)
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/payment',
			'account' => $this->studentModel->studentAccount($id),
			'info' => $this->studentModel->studentInfo($id),
			'details' => $this->studentModel->studentDetails($id),
			'check' => $this->pageModel->checkEnrollment(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function receipt()
	{
		$data = array(
			'content' => 'DashBoard/reciept',
			'check' => $this->pageModel->checkEnrollment(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),
		);
		$this->load->view('DashBoard/receipt', $data);
	}

	public function receipt2()
	{
		$data = array(
			'content' => 'DashBoard/reciept2',
			'check' => $this->pageModel->checkEnrollment(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),
		);
		$this->load->view('DashBoard/receipt2', $data);
	}

	public function setTuition()
	{
		$this->tuitionModel->setTuition();
		redirect($this->agent->referrer());

	}

	public function payTuition()
	{
		$this->tuitionModel->payTuition();
		$this->tuitionModel->enrolled();
		$this->tuitionModel->payReport();
		$this->session->set_userdata('payAmount', $this->input->post('payment'));
		$this->session->set_flashdata('success', 'Successfuly Updated!');
		redirect($this->agent->referrer());

	}

	public function payBalance()
	{
		$this->tuitionModel->payTuition();
		$this->tuitionModel->payReport();
		$this->session->set_flashdata('success', 'Successfuly Updated!');
		$this->session->set_userdata('payBal', $this->input->post('payment'));
		redirect($this->agent->referrer());

	}

	public function setBackAccount()
	{
		$this->tuitionModel->backAccount();
		$this->tuitionModel->balanceZero();
		$this->session->set_flashdata('success', 'Successfuly Updated!');
		redirect($this->agent->referrer());

	}

	public function AddBackAccount()
	{
		$this->tuitionModel->addBackAccount();
		$this->tuitionModel->baNone();
		$this->session->set_flashdata('success', 'Successfuly Updated!');
		redirect($this->agent->referrer());

	}

	public function pageMenu()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/pageMenu',
			'pages' => $this->pageModel->getPages(),
			'menus' => $this->pageModel->getMenus(),
			'parent' => $this->pageModel->getMenuParent(),
			'child' => $this->pageModel->getMenuChild(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function setMenu()
	{
		$title = $this->pageModel->checkMenu();
		if ($title) {
			$this->session->set_flashdata('error', 'Page Menu exist!');
			redirect($this->agent->referrer());
		} else {
			$check = $this->pageModel->setMenu();
			$this->pageModel->setLink();
			if ($check) {
				$this->logsModel->addMenu();
				$this->session->set_flashdata('success', 'Menu Save!');
				redirect($this->agent->referrer());
			} else {
				redirect($this->agent->referrer());
			}
		}

		redirect($this->agent->referrer());
	}

	public function checkMenu()
	{
		$this->db->where('title', $this->input->post('title'));
		$query = $this->db->get('menu');
		if ($query->num_rows() > 0) {
			return true;
		}
	}

	public function updateMenu()
	{
		$title = $this->pageModel->checkMenu();
		if ($title) {
			$this->session->set_flashdata('error', 'Page Menu exist!');
			redirect($this->agent->referrer());
		} else {
			$check = $this->pageModel->updateMenu();
			if ($check) {
				$this->session->set_flashdata('success', 'Menu Save!');
				redirect($this->agent->referrer());
			} else {
				redirect($this->agent->referrer());
			}
		}
		redirect($this->agent->referrer());
	}

	public function deleteMenu($id)
	{
		$check = $this->pageModel->checkChild($id);
		if ($check) {
			$this->session->set_flashdata('error', 'Delete Child First!');
			redirect($this->agent->referrer());
		} else {
			$this->pageModel->delMenu($id);
			$this->session->set_flashdata('success', 'Menu Title Deleted!');
			redirect($this->agent->referrer());
		}
		redirect($this->agent->referrer());
	}

	public function openEnrollment()
	{

		$checkSy = $this->pageModel->checkSy();
		if ($checkSy) {
			$this->session->set_flashdata('error', 'School Year is not valid!');
			redirect($this->agent->referrer());
		} else {
			$save = $this->pageModel->openEnrollment();
			if ($save) {
				$return = $this->pageModel->saveSy();
				$this->session->set_flashdata('success', 'Enrollment is Now Open!');
				// redirect('DashBoard');
				// redirect($this->agent->referrer());
				echo json_encode($return);
			} else {
				$this->session->set_flashdata('error', 'Error on data!');
				redirect($this->agent->referrer());
			}
		}

	}

	public function closeEnrollment()
	{
		$save = $this->pageModel->closeEnrollment();

		$this->session->set_flashdata('success', 'Enrollment is Now Close!');
		redirect($this->agent->referrer());

	}

	public function paymentReport()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/paymentReport',
			'report' => $this->tuitionModel->paymentReport(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),

		);
		$this->load->view('DashBoard/template', $data);

	}

	public function paymentReports()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/paymentReports',
			'report' => $this->tuitionModel->paymentReports(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),

		);
		$this->load->view('DashBoard/template', $data);

	}

	public function paymentDaily()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/payDaily',
			'report' => $this->tuitionModel->paymentDaily(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),

		);
		$this->load->view('DashBoard/template', $data);

	}

	public function paymentMonthly()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/payMonthly',
			'report' => $this->tuitionModel->paymentMonthly(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),

		);
		$this->load->view('DashBoard/template', $data);

	}

	public function getPayMonthly()
	{
		$this->session->set_userdata(array(
			'pyear' => $this->input->post('pyear'),
			'pmonth' => $this->input->post('pmonth'),
		));
		redirect('DashBoard/paymentMonthly');
	}

	public function paySort()
	{
		$this->session->set_userdata(array(
			'year' => $this->input->post('year'),
		));
		redirect('DashBoard/paymentReports');

	}

	public function studentReport()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/studentReport',
			'report' => $this->studentModel->studentReport(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),

		);
		$this->load->view('DashBoard/template', $data);

	}

	public function studentReports()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/studentReports',
			'report' => $this->studentModel->studentReports(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),

		);
		$this->load->view('DashBoard/template', $data);

	}

	public function studentDaily()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/studDaily',
			'report' => $this->studentModel->studDaily(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),

		);
		$this->load->view('DashBoard/template', $data);

	}

	public function studentMonthly()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/srudMonthly',
			'report' => $this->studentModel->studMonthly(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),
		);
		$this->load->view('DashBoard/template', $data);

	}

	public function getStudMonthly()
	{
		$this->session->set_userdata(array(
			'syear' => $this->input->post('pyear'),
			'smonth' => $this->input->post('pmonth'),
		));
		redirect('DashBoard/paymentMonthly');
	}

	public function studSort()
	{
		$this->session->set_userdata(array(
			'years' => $this->input->post('year'),
		));
		redirect('DashBoard/studentReports');

	}

	public function accounts($id)
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/accounts',
			'account' => $this->studentModel->studentAccount($id),
			'info' => $this->studentModel->studentInfo($id),
			'details' => $this->studentModel->studentDetails($id),
			'check' => $this->pageModel->checkEnrollment(),
			'accounts' => $this->tuitionModel->tuitionAccount($id),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function endSY()
	{
		$this->pageModel->endSy();
		$this->pageModel->end();

		$this->session->set_flashdata('success', 'School year has ended!');
		redirect($this->agent->referrer());

	}

	public function reservation()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/reservation',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function accept($id)
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/accept',
			'info' => $this->accountModel->getReserve($id),
			'getGrade' => $this->gradeLevelModel->getGrade(),
			'getSection' => $this->gradeLevelModel->getSection(),
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function deleteLogo($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('homeimage');
		$this->session->set_flashdata('success', 'Logo deleted!');
		redirect($this->agent->referrer());
	}

	public function deleteBanner($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('homeimage');
		$this->session->set_flashdata('success', 'Banner deleted!');
		redirect($this->agent->referrer());
	}

	public function setGrade()
	{
		$this->pageModel->setGrade();
		$this->session->set_flashdata('success', 'Grade is set!');
		redirect($this->agent->referrer());
	}

	public function logs()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/logsView',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$this->load->view('DashBoard/template', $data);
	}

	public function studGradeReport()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/perGrade',
			'report' => $this->studentModel->gradeReport(),
			'userInfo' => $this->profileModel->getProfile(),
			'logo' => $this->homeModel->getLogo(),

		);
		$this->load->view('DashBoard/template', $data);

	}

	function uploadRequirements($studentId)
	{

		$data = array(
			'requirements' => $this->db->get_where('student_requirement', array('studentId' => $studentId))->result_array(),
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/uploadRequirements',
			'userInfo' => $this->profileModel->getProfile(),
			'studentId' => $studentId,
		);
		$result = $this->gradeModel->getGrade();

		$this->load->view('DashBoard/template', $data);
	}

	function viewStudentInSubject($subjectId)
	{

		$data = array(
			'subjectId' => $subjectId,
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/viewStudentInSubject',
			'userInfo' => $this->profileModel->getProfile(),
			'subjects1' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 1))->result(),
			'subjects2' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 2))->result(),
		);
		$result = $this->gradeModel->getGrade();

		$this->load->view('DashBoard/template', $data);
	}

	function summerClass()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/summerClass',
			'userInfo' => $this->profileModel->getProfile(),
			'subjects1' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 1))->result(),
			'subjects2' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id'), 'semester' => 2))->result(),
		);
		$result = $this->gradeModel->getGrade();

		$this->load->view('DashBoard/template', $data);
	}

	function failedStudent()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/failedStudent',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$result = $this->gradeModel->getGrade();

		$this->load->view('DashBoard/template', $data);
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
//			redirect('frontPage/myAccount');
			redirect('Dashboard/uploadRequirements/' . $this->input->post('studentId'));
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Error Upload data!');
//			redirect('frontPage/myAccount');
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
			redirect('Dashboard/uploadRequirements/' . $this->input->post('studentId'));
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Error Upload data!');
			redirect('Dashboard/uploadRequirements/' . $this->input->post('studentId'));
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
			redirect('Dashboard/uploadRequirements/' . $this->input->post('studentId'));
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Error Upload data!');
			redirect('Dashboard/uploadRequirements/' . $this->input->post('studentId'));
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
			redirect('Dashboard/uploadRequirements/' . $this->input->post('studentId'));
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Error Upload data!');
			redirect('Dashboard/uploadRequirements/' . $this->input->post('studentId'));
		}
	}


	public function studReport()
	{
		$this->session->set_userdata(array(
			'gyears' => $this->input->post('year'),
			'ggrade' => $this->input->post('grade'),
		));
		redirect('DashBoard/studGradeReport');
	}

	/*Grading System*/
	public function addGrade()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addGrade',
			'subjects' => $this->db->get_where('subject', array('instructorId' => $this->session->userdata('id')))->result(),
			'userInfo' => $this->profileModel->getProfile(),
			'getGrade' => $this->gradeModel->getGrade(),
			'getSection' => $this->gradeModel->getSection(),
			'showList' => $this->gradeModel->showList(),
		);
		$result = $this->gradeModel->getGrade();

		$this->load->view('DashBoard/template', $data);

	}

	public function firstq()
	{
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/firstq',
			'userInfo' => $this->profileModel->getProfile(),
		);
		$result = $this->gradeModel->getGrade();

		$this->load->view('DashBoard/template', $data);

	}

	public function addTracks()
	{
		$faculties = $this->db->get_where('accounts', array('role' => 'faculty'))->result_array();
		$counter = 0;
		foreach ($faculties as $ins) {
			$this->db->where('userID', $ins['id']);
			$user = $this->db->get('userInfo')->result_array()[0];

			$faculties[$counter]['first_name'] = $user['firstName'];
			$faculties[$counter]['last_name'] = $user['lastName'];
			$counter++;
		}
		$data = array(
			'header' => 'DashBoard/header',
			'content' => 'DashBoard/addTracks',
			'tracks' => $this->trackModel->showTracks(),
			'userInfo' => $this->profileModel->getProfile(),
			'faculties' => $faculties
		);
		$this->load->view('DashBoard/template', $data);
	}

}
