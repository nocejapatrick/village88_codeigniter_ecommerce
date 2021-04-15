<?php
class Product extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();    
    }

    public function get(){
        return $this->db->get('products')->result();
    }

    public function find($id){
        return $this->db->get_where('products',["id"=>$id])->row();
    }

}