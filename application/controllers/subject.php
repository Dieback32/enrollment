<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('subjectModel', 'subject');
	}

	public function ajax_list()
	{
		$list = $this->subject->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $subject) {
			$this->db->where('userID', $subject->instructorId);
			$inst = $this->db->get('userinfo')->result_array();
			$instructor = count($inst) > 0 ? $inst[0]['firstName'] . ' ' . $inst[0]['lastName'] : '';
			$no++;
			$row = array();
			// $row[] = $subject->password;
			$row[] = $subject->subject;
			$row[] = $subject->category;
			$row[] = $subject->type == '1' ? 'Lab' : 'Gen';
			$row[] = $subject->grade_level;
			$row[] = $instructor;
			$row[] = $this->trackModel->getTrackName($subject->track);
			$row[] = $subject->semester;
			$row[] = $subject->written_work;
			$row[] = $subject->performance_task;
			$row[] = $subject->quarterly_assesment;
			//add html for action

			if ($this->session->userdata('role') != 'asstreg') {
				$str = '<a class="btn btn-sm btn-primary crud"  title="Edit" onclick="edit_subject(' . $subject->id . ')">
                <i class="glyphicon glyphicon-pencil">
                </i>
                Edit
            </a>' . '<a class="btn btn-sm btn-danger crud" title="Hapus" onclick="delete_subject(' . $subject->id . ')">
                <i class="glyphicon glyphicon-trash">
                </i>
                Delete
            </a>';
			} else {
				$str = '<a class="btn btn-sm btn-primary crud"  title="Edit" onclick="edit_subject(' . $subject->id . ')">
                <i class="glyphicon glyphicon-pencil">
                </i>
                Edit
            </a>';
			}

			$row[] = $str;

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->subject->count_all(),
			"recordsFiltered" => $this->subject->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->subject->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'subject' => $this->input->post('subject'),
			'grade_level' => $this->input->post('grade_level'),
			'instructorId' => $this->input->post('instructorId'),
			'track' => $this->input->post('track'),
			'written_work' => $this->input->post('written_work'),
			'performance_task' => $this->input->post('performance_task'),
			'quarterly_assesment' => $this->input->post('quarterly_assesment'),
			'semester' => $this->input->post('semesters'),
			'category' => $this->input->post('category'),
			'type' => $this->input->post('type'),
		);
		$insert = $this->subject->save($data);
		echo json_encode(array("status" => true));
	}

	public function ajax_update()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'subject' => $this->input->post('subject'),
			'grade_level' => $this->input->post('grade_level'),

			'instructorId' => $this->input->post('instructorId'),
			'track' => $this->input->post('track'),

			'written_work' => $this->input->post('written_work'),
			'performance_task' => $this->input->post('performance_task'),
			'quarterly_assesment' => $this->input->post('quarterly_assesment'),
			'category' => $this->input->post('category'),
			'type' => $this->input->post('type'),
		);
		$this->subject->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => true));
	}

	public function ajax_delete($id)
	{
		$this->session->set_userdata('delsubject', $id);
		$this->subject->delete_by_id($id);
		echo json_encode(array("status" => true));
	}

}
