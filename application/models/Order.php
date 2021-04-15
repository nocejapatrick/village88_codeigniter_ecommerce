<?php
class Order extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get(){
        return $this->db->get('orders')->result();
    }

    public function get_order_product(){
        $this->db->select('orders.id AS order_id, orders.quantity as quantity, products.*');
        $this->db->from('orders');
        $this->db->join('products', 'products.id = orders.product_id');
          return $this->db->get()->result();
    }

    public function find_product_by_id($id){
        return $this->db->get_where('orders',['product_id'=>$id])->row();
    }

    public function delete($id){
        $this->db->delete('orders',['id'=>$id]);
    }
    public function update_order_quantity($order,$user_order){
        $order->quantity = intval($order->quantity) +$user_order["quantity"];
        $order->updated_at =date("Y-m-d H:i:s");
        $this->db->replace('orders',$order);
    }

    public function insert($arr,$user_id){
        $orders= [];

        foreach($arr as $ar){
            $orders[] = array(
                "product_id"=>$ar->id,
                "user_id"=>$user_id,
                "quantity"=>$ar->quantity
            );
        }


        $this->db->insert_batch('orders',$orders);
    }

}