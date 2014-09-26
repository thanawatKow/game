<?php
class M_orders_total extends Model {

public $orders_total_id;
public $orders_id;
public $orders_total_title;
public $orders_total_value;


	function M_orders_total() {
	
		parent::Model();
		
	}
	//ShowOrdersHistory
	function ShowOrdersTotal($orders_id){
	
		$sql = 'SELECT * FROM orders_total WHERE orders_total.orders_id=?';
		return $this->db->query($sql, array($orders_id));
		
	}	
	
	function insertOrderstotal() {
	
		$sql = 'INSERT INTO orders_total (`orders_id`, `orders_total_title`, `orders_total_value`) 
		VALUES (?, ?, ?);'; 
		$this->db->query($sql, array($this->orders_id, "Sub-Total:", $this->total));
		
		$sql2 = 'INSERT INTO orders_total (`orders_id`, `orders_total_title`, `orders_total_value`) 
		VALUES (?, ?, ?);'; 
		$this->db->query($sql2, array($this->orders_id, "Shipping:", $this->shipping_method));
		
		$sql3 = 'INSERT INTO orders_total (`orders_id`, `orders_total_title`, `orders_total_value`) 
		VALUES (?, ?, ?);'; 
		$this->db->query($sql3, array($this->orders_id, "Total:", $this->SumTotal));
		
	}
}
?>
