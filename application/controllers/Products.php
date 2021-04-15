<?php

class Products extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url'));
        $this->load->model('Product');
        $this->load->model('Order');
        
    }

    public function index(){
        $ordersSession = ($this->session->userdata('products')) ? $this->session->userdata('products') : [];
        $ordersCount = 0;
        foreach($ordersSession as $order){
            $ordersCount += $order->quantity;
        }
        $this->load->view('_partials/header');
        $this->load->view('layouts/products/index',array('products'=>$this->Product->get(),'orders_count'=>$ordersCount,'orders'=>$ordersSession));
        $this->load->view('_partials/header');
    }
}