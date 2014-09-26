<?php
class M_orders_supply extends Model {

public $orders_supply_id;
public $orders_id;
public $orders_supply_date;

	function M_orders_supply() {
	
		parent::Model();
		
	}
	
	function insertSupply() {
		$sql = 'INSERT INTO orders_supply (orders_id, orders_supply_date, orders_supply_remark) VALUES (?, ?, ?);'; 
		$this->db->query($sql, array($this->orders_id, date('Y-m-d H:i:s'), $this->orders_supply_remark));
	
	}
	
}
?>