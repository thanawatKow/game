<?php
class M_orders_history extends Model {

public $orders_history_id;
public $orders_id;
public $orders_history_comments;


	function M_orders_history() {
	
		parent::Model();
		
	}
	
	function ShowOrdersHistory($orders_id){
	$sql = 'SELECT * FROM orders_history 
				INNER JOIN orders ON orders.orders_id = orders_history.orders_id 
				INNER JOIN orders_status ON orders.orders_sta_id = orders_status.orders_sta_id 
				WHERE orders_history.orders_id=?';
		return $this->db->query($sql, array($orders_id));
	}
	
	function inserthistory() {
	
		$sql = 'INSERT INTO orders_history (`orders_id` ,`orders_history_comments` )
		VALUES (?, ?);'; 
		$this->db->query($sql, array($this->orders_id, $this->history));
	}
}
?>
