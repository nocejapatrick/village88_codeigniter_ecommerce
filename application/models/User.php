<?php
class User extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['form_validation']);
    }

    public function insert($arr){
        $this->db->insert('users',$arr);
        return $this->db->insert_id();
    }
}