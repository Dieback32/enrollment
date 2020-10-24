<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pageModel extends CI_Model {

	var $table = 'page';
	var $column = array('id','title','content');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return;
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	// =-----------------

	public function openEnrollment(){
		$data = array(
			'sy' => $this->input->post('sy'),
			'status' => 1,
			'end' => 1,
			'id' => 1,
			);
		$check = $this->db->get_where('enrollment', array('id' => 1));
		if ($check->num_rows() > 0) {
			$this->db->where('id', 1);
			$query = $this->db->update('enrollment', $data);
		}else{
			$query = $this->db->insert('enrollment', $data);
		}
		return $query;

	}
	public function checkSy(){
		$this->db->where('sy', $this->input->post('sy'));
		$query = $this->db->get('sy');
		if ($query->num_rows() > 0) {
			return true;
		}
	}
	public function saveSy(){
		$data = array(
			'sy' => $this->input->post('sy'),
			'semesters' => $this->input->post('semesters'),
			);
		$query = $this->db->insert('sy', $data);
		if($query){
			return array('results' => 'success');
		}
	}
	public function closeEnrollment(){
		$data = array(
			'status' => 0,
			);
		$check = $this->db->get_where('enrollment', array('id' => 1));
		if ($check->num_rows() > 0) {
			$this->db->where('id', 1);
			$query = $this->db->update('enrollment', $data);
		}
	}
	public function end(){
		$data = array(
			'end' => 0,
			);
		$check = $this->db->get_where('enrollment', array('id' => 1));
		if ($check->num_rows() > 0) {
			$this->db->where('id', 1);
			$query = $this->db->update('enrollment', $data);
		}
	}
	public function endSy(){
		$data = array(
			'status' => 'not-enrolled',
			'section' => 0,
			);
		
			$query = $this->db->update('student_info', $data);
			return $query;
	}
	public function checkEnrollment(){
		$query = $this->db->get_where('enrollment', array('id' => 1));
		return $query->row();
	}

	public function addThisPage(){
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'content' => $this->input->post('content'),
			// 'parent_id' => $this->input->post('parent'),
			);
		$query = $this->db->insert('page', $data);
		return $query;
	}
	public function updateThisPage(){
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'content' => $this->input->post('content'),
			// 'parent_id' => $this->input->post('parent'),
			);
		$this->db->where('id', $this->input->post('id'));
		$query = $this->db->update('page', $data);
		return $query;
	}
	public function getPage($id){
		$query = $this->db->get_where('page', array('id' => $id));
		return $query->row();
	}
	public function getAllPage($slug = FALSE){
		if ($slug === FALSE) {
			$query = $this->db->get('page');
			return $query->result();
		}
		$this->db->order_by("id", "desc");
		$query = $this->db->get_where('page', array('slug' => $slug));       
		return $query->row();
	}
	public function getChild(){
		$query = $this->db->get_where('page', array('parent_id >' => 0));
		return $query->result();
	}
	public function getParent(){
		$query = $this->db->get_where('page', array('parent_id' => 0));
		return $query->result();
	}
	public function checkPageExist(){
		$query = $this->db->get_where('page', array('title' => $this->input->post('title')));
		if ($query->num_rows() > 0) {
			return true;
		}
	}

	public function getPages(){
		$this->db->where('link', 0);
		$query = $this->db->get('page');
		return $query->result();
	}
	public function getMenus(){
		$query = $this->db->get('menu');
		return $query->result();
	}
	public function getMenuParent(){
		$this->db->where('parent_id', 0);
		$query = $this->db->get('menu');
		return $query->result();
	}
	public function getMenuChild(){
		$this->db->where('parent_id !=', 0);
		$query = $this->db->get('menu');
		return $query->result();
	}
	public function setMenu(){
		if ($this->input->post('menu_id') == 0) {
			$type = 1;
		}else{
			$type = 0;
		}
		$data = array(
			'title' => $this->input->post('title'),
			'page_id' => $this->input->post('page_id'),
			'parent_id' => $this->input->post('menu_id'),
			'type' => $type,
			);
		$query = $this->db->insert('menu', $data);
		return $query;
	}
	public function setLink(){
		
		$data = array(
			'link' => 0,
			);
		$where = array('id' => $this->input->post('page_id'));
		$query = $this->db->update('page', $data, $where);
		return $query;
	}
	public function delMenu($id){
		$this->db->where('id', $id);
		$this->db->delete('menu'); 

		$data = array(
			'link' => 0,
			);
		$where = array('id' => $id);
		$query = $this->db->update('page', $data, $where);
		return $query;

	}
	public function checkChild($id){
		$this->db->where('parent_id ', $id);
		$query = $this->db->get('menu');
		if ($query->num_rows() > 0) {
			return true;
		}
	}
	public function getParentMenu(){
		$this->db->where('parent_id', 0);
		$query = $this->db->get('menu');
		return $query->result();
	}
	public function getChildMenu(){
		$this->db->where('type', 0);
		$query = $this->db->get('menu');
		return $query->result();
	}
	public function getPageLink(){
		$query = $this->db->get('page');
		return $query->result();
	}
	public function checkMenu(){
		$this->db->where('title', $this->input->post('title'));
		$this->db->where('id !=', $this->input->post('my_id'));
		$query = $this->db->get('menu');
		if ($query->num_rows() > 0) {
			return true;
		}
	}
	public function updateMenu(){
		if ($this->input->post('menu_id') == 0) {
			$type = 1;
		}else{
			$type = 0;
		}
		$data = array(
			'title' => $this->input->post('title'),
			'page_id' => $this->input->post('page_id'),
			'parent_id' => $this->input->post('menu_id'),
			'type' => $type,
			);
		$where = array('id' => $this->input->post('my_id'));
		$query = $this->db->update('menu', $data, $where);
		return $query;
	}
	public function setGrade(){
		$data = array(
			'grade' => $this->input->post('grade'),
			'section' => 0,
			);
		$where = array('user_id' => $this->input->post('my_id'));
		$query = $this->db->update('student_info', $data, $where);
		return $query;
	}

}
