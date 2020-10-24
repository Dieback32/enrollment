<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trackModel extends CI_Model {

	
	function getTrackName($id){
		return $this->db->get_where('tracks',array('id' => $id))->row('track_name');
	}

	public function showTracks(){
		$query = $this->db->query("Select * from tracks");
		return $query->result();
	}

}
