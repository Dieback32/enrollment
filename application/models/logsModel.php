<?php
defined('BASEPATH') or exit('no direct script access allowed');

class LogsModel extends Ci_Model {

    function __construct() {
        parent::__construct();

    }
    public function login(){
        $data = array(
            'username' => $this->session->userdata('id'),
            'log' => 'User Login',
            'time' => date('F j, Y g:i:a  '),
            );
        $query = $this->db->insert('logs', $data);
        return $query;
    }
    public function logout(){
        $data = array(
            'username' => $this->session->userdata('id'),
            'log' => 'User Logout',
            'time' => date('F j, Y g:i:a  '),
            );
        $query = $this->db->insert('logs', $data);
        return $query;
    }
    public function logout1(){
        $this->db->where('id',$this->session->userdata('id'));
        $up = array('status1' => '0');
        $query1 = $this->db->update('accounts', $up);
        return $query1;
    }
    public function addAccount(){
        $data = array(
            'username' => $this->session->userdata('id'),
            'log' => 'Add Account '.$this->input->post('role'),
            'time' => date('F j, Y g:i:a  '),
            );
        $query = $this->db->insert('logs', $data);
        return $query;
    }
    public function addPage(){
        $data = array(
            'username' => $this->session->userdata('id'),
            'log' => 'Add Page '.$this->input->post('title'),
            'time' => date('F j, Y g:i:a  '),
            );
        $query = $this->db->insert('logs', $data);
        return $query;
    }
    public function addMenu(){
        $data = array(
            'username' => $this->session->userdata('id'),
            'log' => 'Add menu '.$this->input->post('title'),
            'time' => date('F j, Y g:i:a  '),
            );
        $query = $this->db->insert('logs', $data);
        return $query;
    }
    
}

