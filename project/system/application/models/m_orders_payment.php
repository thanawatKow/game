<?php
class M_orders_payment extends Model {

public $orders_pay_id;
public $orders_id;
public $bank_id;
public $cust_id;
public $orders_payment_date;
public $orders_payment_name;
public $orders_payment_email;
public $orders_payment_tel;
public $orders_payment_remark;



	function M_orders_payment() {
	
		parent::Model();
		
	}
	
	function showIDOrdersPayment($orders_id) {
		$sql='SELECT * FROM `orders_payment` WHERE `orders_id` = ?';
		return $this->db->query($sql, array($orders_id));
	
	}
	function insertOrdersPayment() {
		$sql = 'INSERT INTO `it51630480`.`orders_payment` (`orders_id`, `bank_id`, `cust_id`, 
		`orders_payment_date`, `orders_payment_name`, `orders_payment_email`, `orders_payment_tel`, 
		`orders_payment_remark`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?);'; 
		return $this->db->query($sql, array($this->orders_id, $this->bank_id, $this->cust_id, date('Y-m-d H:i:s'), $this->orders_payment_name, $this->orders_payment_email, $this->orders_payment_tel, $this->orders_payment_remark));
	}
}
?>
