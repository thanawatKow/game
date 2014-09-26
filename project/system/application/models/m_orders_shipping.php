<?php
class M_orders_shipping extends Model {

public $orders_shipp_id;
public $orders_shipp_value;

	function M_orders_shipping() {
	
		parent::Model();
		
	}
	
	function getNextCodeShipping(){
	
		$sql = 'SELECT MAX(orders_shipp_id) as nextcode FROM orders_shipping';
		$query = $this->db->query($sql);
		$row = $query->row();
		$orders_shipp=substr($row->nextcode,1)+1;
		return "S".substr(("00000".$orders_shipp),-4);
	
	}
	
	function insertOrdersShipp(){
	
		$sql = 'INSERT INTO orders_shipping (orders_shipp_id, orders_shipp_value)
				VALUES (?, ?);'; 
		$this->db->query($sql, array($this->orders_shipp_id, $this->orders_shipp_value));
		
	}
	
}
?>
