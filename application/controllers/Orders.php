<?php

class Orders extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('Product');
        $this->load->model('Order');
        $this->load->model('User');
        
    }

    public function index(){
        $ordersSession = ($this->session->userdata('products')) ? $this->session->userdata('products') : [];
        $this->load->view('_partials/header');
        $this->load->view('layouts/orders/index',array('orders'=> $ordersSession));
        $this->load->view('_partials/header');
    }

    public function remove(){
        $this->Order->delete($this->input->post('order_id'));
        redirect(base_url().'/orders');
    }

    public function add(){
        // $order = $this->Order->find_product_by_id($this->input->post('product_id'));
        // if( $order == null){
        //     $this->Order->insert($this->input->post());
        // }else{
        //     $this->Order->update_order_quantity($order,$this->input->post());
        // }
        // $this->session->unset_userdata('products');
        $ordersSession = ($this->session->userdata('products')) ? $this->session->userdata('products') : [];
        $order = $this->Product->find($this->input->post('product_id',true));
        $order->quantity = intval($this->input->post('quantity',true));
        $ordersSession[$order->id] = $order;
        $this->session->set_userdata('products',$ordersSession);
        redirect(base_url());
    }

    public function insert(){
        $orders = $this->session->userdata('products');
        $user_id = $this->User->insert($this->input->post(null,true));
        $this->Order->insert($orders,$user_id);
        $this->session->unset_userdata('products');
        $this->session->set_flashdata('success','Successfully Ordered');
        redirect(base_url());
    }
}