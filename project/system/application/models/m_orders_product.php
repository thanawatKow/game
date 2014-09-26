<?php
class M_orders_product extends Model {

public $orders_pro_id;
public $orders_id;
public $pro_code;
public $orders_pro_sell;
public $orders_pro_qty;
public $orders_pro_toSell;


	function M_orders_product () {
	
		parent::Model();
		
	}
	
	function ShowOrdersPro($orders_id){
		$sql = 'SELECT * FROM orders_product
					INNER JOIN product ON orders_product.pro_code = product.pro_code
					WHERE orders_product.orders_id =?';
		
		return $this->db->query($sql, array($orders_id));	
	}
	
	function GetOneShippOrdersPro($pro_order_id){
	
		$sql = 'SELECT * FROM orders_product
					INNER JOIN orders ON orders.orders_id = orders.orders_id
					INNER JOIN product ON orders_product.pro_code = product.pro_code
					INNER JOIN orders_status ON orders.orders_sta_id = orders_status.orders_sta_id 
					INNER JOIN orders_shipping ON orders.orders_shipp_id   = orders_shipping.orders_shipp_id   
					WHERE orders_product.orders_id = ?
					GROUP BY orders_product.orders_id'; 
		return $this->db->query($sql, array($pro_order_id));	
		
	}
	
	function insertOrdersPro($pro_code,$discount,$qty,$sum){
	
		$sql = 'INSERT INTO orders_product (`orders_id` ,`pro_code` ,`orders_pro_sell` ,`orders_pro_qty` ,`orders_pro_toSell` )
		VALUES (?, ?, ?, ?, ?);'; 
		
		$this->db->query($sql, array($this->orders_id, $pro_code, $discount, $qty, $sum));
		
		$sql1='SELECT * FROM product WHERE pro_code = ?';
		$query=$this->db->query($sql1, array($pro_code));
		$row = $query->row();
		$quantity=$row->pro_quantity;
		$qty1=$quantity-$qty;
		$sql2='UPDATE product SET pro_quantity=? WHERE pro_code = ? ';
		$this->db->query($sql2,array($qty1,$pro_code));
		//echo $this->db->last_query();
		
	}
	
}
?>
