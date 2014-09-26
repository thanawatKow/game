<?php
class M_orders extends Model {

public $orders_id;
public $cust_id;
public $orders_shipp_id;
public $cust_pay_name;
public $cust_pay_lname;
public $cust_pay_address;
public $cust_pay_district;
public $cust_pay_canton;
public $cust_pay_postcode;
public $cust_pay_province;
public $cust_shipp_name;
public $cust_shipp_lname;
public $cust_shipp_address;
public $cust_shipp_district;
public $cust_shipp_conton;
public $cust_shipp_proviince;
public $cust_shipp_postcode;
public $cust_tel;
public $cust_phone;
public $payment_method;
public $orders_date;
public $orders_sta_id;

	function M_orders() {
	
		parent::Model();
		
	}
	
	function updateOrdersStatus() {
	
		$sql = 'UPDATE orders SET orders_sta_id = ? WHERE CONVERT(`orders`.`orders_id` USING utf8) = ?'; 
		return $this->db->query($sql, array($this->orders_sta_id, $this->orders_id));
	
	}
	
	function updateOrdersPayment() {
	
		$sql = 'UPDATE orders SET payment_method  = ? WHERE orders_id  = ?'; 
		return $this->db->query($sql, array($this->payment_method, $this->orders_id));
	
	}
	function tarma1() {
	
		$sql = 'SELECT month(orders.orders_date) AS showMon, sum( orders_product.orders_pro_toSell ) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoQry FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE month( orders.orders_date ) BETWEEN 01 AND 03  and year(orders.orders_date) = 2010 AND orders.orders_sta_id=5
					GROUP BY month( orders.orders_sta_id)'; 
		return $this->db->query($sql, array($this->payment_method, $this->orders_id));
	
	}
	function tarma2() {
	
		$sql = 'SELECT month(orders.orders_date) AS showMon, sum( orders_product.orders_pro_toSell ) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoQry FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE month( orders.orders_date ) BETWEEN 04 AND 06  and year(orders.orders_date) = 2010 AND orders.orders_sta_id=5
					GROUP BY month( orders.orders_sta_id)'; 
		return $this->db->query($sql, array($this->payment_method, $this->orders_id));
	
	}
	function tarma3() {
	
		$sql = 'SELECT month(orders.orders_date) AS showMon, sum( orders_product.orders_pro_toSell ) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoQry FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE month( orders.orders_date ) BETWEEN 07 AND 09  and year(orders.orders_date) = 2010 AND orders.orders_sta_id=5
					GROUP BY month( orders.orders_sta_id)'; 
		return $this->db->query($sql, array($this->payment_method, $this->orders_id));
	
	}
	function tarma4() {
	
		$sql = 'SELECT month(orders.orders_date) AS showMon, sum( orders_product.orders_pro_toSell ) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoQry FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE month( orders.orders_date ) BETWEEN 10 AND 12  and year(orders.orders_date) = 2010 AND orders.orders_sta_id=5
					GROUP BY month( orders.orders_sta_id)'; 
		return $this->db->query($sql, array($this->payment_method, $this->orders_id));
	
	}
	function Notarma1() {
		$sql = 'SELECT month(orders.orders_date) AS showMon, sum( orders_product.orders_pro_toSell ) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoQry FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE month( orders.orders_date ) BETWEEN 10 AND 12  and year(orders.orders_date) = 1111 AND orders.orders_sta_id=5
					GROUP BY month( orders.orders_sta_id)'; 
		return $this->db->query($sql, array($this->payment_method, $this->orders_id));
	}
	function showOrders($cust_id){
		$sql = 'SELECT * FROM orders
					INNER JOIN customer ON orders.cust_id = customer.cust_id
					INNER JOIN orders_status ON orders.orders_sta_id = orders_status.orders_sta_id
		 			INNER JOIN orders_total ON orders.orders_id = orders_total.orders_id 
		 			WHERE orders_total.orders_total_title="Total:" and orders.cust_id = ? 
		 			GROUP BY orders.orders_id'; 
		return $this->db->query($sql, array($cust_id));
		//echo $this->db->last_query();
	}
	

	
		function showSellBetweenYear() {
		$sql = 'SELECT year( orders.orders_date ) AS showYear , sum( orders_product.orders_pro_toSell ) AS sell, sum(orders_product.orders_pro_qty) AS qry FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
        			WHERE year( orders.orders_date ) BETWEEN ? AND ?  AND orders.orders_sta_id=5
        			 GROUP BY year( orders.orders_date )'; 
		return $this->db->query($sql, array($this->year1-543, $this->year2-543));
		//echo $this->db->last_query();
	}
	
	function showSellMonthYear() {
		$sql = 'SELECT month(orders.orders_date) AS showMon, sum( orders_product.orders_pro_toSell ) AS sell , sum(orders_product.orders_pro_qty) AS qry FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE month( orders.orders_date ) BETWEEN 01 AND 12  and year(orders.orders_date) = ? AND orders.orders_sta_id=5
					GROUP BY month( orders.orders_date )'; 
		return $this->db->query($sql, array($this->year-543));
		//echo $this->db->last_query();
		
	}
	
	function showSellBetweenMonth() {
		$sql = 'SELECT month(orders.orders_date) AS showMon, sum( orders_product.orders_pro_toSell ) AS sell, sum(orders_product.orders_pro_qty) AS qry FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE month( orders.orders_date ) BETWEEN ? AND ?  AND year(orders.orders_date)=? AND orders.orders_sta_id=5
					GROUP BY month( orders.orders_date )'; 
		return $this->db->query($sql, array($this->mon1, $this->mon2, $this->year1-543));
		//echo $this->db->last_query();
		
	}
	
	
	
	function showSellBetweenDay() {
		$sql = 'SELECT date(orders.orders_date) AS orders_date, sum( orders_product.orders_pro_toSell ) AS sell, sum(orders_product.orders_pro_qty) AS qry FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id  
					WHERE date(orders.orders_date) BETWEEN ? AND  ? AND orders.orders_sta_id=5
					GROUP BY date(orders.orders_date)'; 
		return $this->db->query($sql, array($this->day1, $this->day2));
		//echo $this->db->last_query();
		
	}
	
	
	function showSellYear() {
		$sql = 'SELECT year( orders.orders_date ) AS showYear , sum( orders_product.orders_pro_toSell ) AS sell FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
        			WHERE year( orders.orders_date ) = 2010  AND orders.orders_sta_id=5
        			 GROUP BY year( orders.orders_date )'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function NoshowSellYear() {
		$sql = 'SELECT year( orders.orders_date ) AS showYear , sum( orders_product.orders_pro_toSell ) AS sell FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
        			WHERE year( orders.orders_date ) =2553 AND orders.orders_sta_id=5
        			 GROUP BY year( orders.orders_date )'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function showSellMonth() {
		$sql = 'SELECT month(orders.orders_date) AS showMon, sum( orders_product.orders_pro_toSell ) AS sell FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE month( orders.orders_date ) BETWEEN 01 AND 12  and year(orders.orders_date)=2010 AND orders.orders_sta_id=5
					GROUP BY month( orders.orders_date )'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function NoshowSellMonth() {
		$sql = 'SELECT month(orders.orders_date) AS showMon, sum( orders_product.orders_pro_toSell ) AS sell FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE month( orders.orders_date ) BETWEEN 13 AND 13  and year(orders.orders_date)=2010 AND orders.orders_sta_id=5
					GROUP BY month( orders.orders_date )'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
		
	}
	
	function showSellDay() {
		$sql = 'SELECT orders.orders_date, sum( orders_product.orders_pro_toSell ) AS sell FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE day(orders.orders_date)  BETWEEN 01 AND  31 and year(orders.orders_date)=2010 AND orders.orders_sta_id=5
					GROUP BY day(orders.orders_date)'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function NoshowSellDay() {
		$sql = 'SELECT orders.orders_date, sum( orders_product.orders_pro_toSell ) AS sell FROM orders  
					INNER JOIN orders_product ON orders_product.orders_id = orders.orders_id 
					WHERE day(orders.orders_date)  BETWEEN 32 AND  33 and year(orders.orders_date)=2010 AND orders.orders_sta_id=5
					GROUP BY day(orders.orders_date)'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
		
	}
	
	function showstaOrders($orders_id){
		$sql = 'SELECT * FROM orders
					INNER JOIN customer ON orders.cust_id = customer.cust_id
					INNER JOIN orders_status ON orders.orders_sta_id = orders_status.orders_sta_id
		 			INNER JOIN orders_total ON orders.orders_id = orders_total.orders_id 
		 			WHERE orders_total.orders_total_title="Total:" and orders.orders_id = ? and 
					(orders.orders_sta_id<=2 or orders.orders_sta_id=6)
		 			GROUP BY orders.orders_id'; 
		return $this->db->query($sql, array($orders_id));
		//echo $this->db->last_query();
	}
	
	
	function showAllstaOrders() {
		$sql = 'SELECT * FROM orders
					INNER JOIN customer ON orders.cust_id = customer.cust_id
					INNER JOIN orders_history ON orders.orders_id = orders_history.orders_id
					INNER JOIN orders_shipping ON orders.orders_shipp_id = orders.orders_shipp_id
					INNER JOIN orders_status ON orders.orders_sta_id = orders_status.orders_sta_id
		 			INNER JOIN orders_total ON orders.orders_id = orders_total.orders_id 
					INNER JOIN orders_payment ON orders.orders_id = orders_payment.orders_id
					INNER JOIN bank ON bank.bank_id = orders_payment.bank_id
		 			WHERE orders_total.orders_total_title="Total:" AND orders.orders_sta_id= ? GROUP BY orders.orders_id'; 
		return $this->db->query($sql, array($this->orders_sta_id));
	
	}
	function showAllStaPayOrders() {
		$sql = 'SELECT * FROM orders
					INNER JOIN customer ON orders.cust_id = customer.cust_id
					INNER JOIN orders_history ON orders.orders_id = orders_history.orders_id
					INNER JOIN orders_shipping ON orders.orders_shipp_id = orders.orders_shipp_id
					INNER JOIN orders_status ON orders.orders_sta_id = orders_status.orders_sta_id
		 			INNER JOIN orders_total ON orders.orders_id = orders_total.orders_id 
		 			WHERE orders_total.orders_total_title="Total:" AND (orders.orders_sta_id= ? OR  orders.orders_sta_id=6 ) 
					GROUP BY orders.orders_id'; 
		return $this->db->query($sql, array($this->orders_sta_id));
	
	}
	function showAllOrders() {
		$sql = 'SELECT * FROM orders
					INNER JOIN customer ON orders.cust_id = customer.cust_id
					INNER JOIN orders_history ON orders.orders_id = orders_history.orders_id
					INNER JOIN orders_shipping ON orders.orders_shipp_id = orders.orders_shipp_id
					INNER JOIN orders_status ON orders.orders_sta_id = orders_status.orders_sta_id
		 			INNER JOIN orders_total ON orders.orders_id = orders_total.orders_id 
		 			WHERE orders_total.orders_total_title="Total:" GROUP BY orders.orders_id'; 
		return $this->db->query($sql);
	
	}
	
	function showAllIDOrders($orders_id) {
		$sql = 'SELECT * FROM orders
					INNER JOIN customer ON orders.cust_id = customer.cust_id
					INNER JOIN orders_history ON orders.orders_id = orders_history.orders_id
					INNER JOIN orders_shipping ON orders.orders_shipp_id = orders.orders_shipp_id
					INNER JOIN orders_status ON orders.orders_sta_id = orders_status.orders_sta_id
		 			INNER JOIN orders_total ON orders.orders_id = orders_total.orders_id 
		 			WHERE orders_total.orders_total_title="Total:" and orders.orders_id = ? 
		 			GROUP BY orders.orders_id'; 
		return $this->db->query($sql, array($orders_id));
	
	}
	
	function updateStaOrders($orders_id) {
	
		$sql='UPDATE orders SET `orders_sta_id` = ? WHERE orders_id = ?';
		return $this->db->query($sql, array($this->orders_sta_id, $orders_id));
		
	}
	
	function getCodeOrders(){
	
		$sql = 'SELECT MAX(orders_id) as nextcode FROM orders ';
		$query = $this->db->query($sql);
		$row = $query->row();
		$orders_id=substr($row->nextcode,1)+1;
		return "B".substr(("00000".$orders_id),-4);
		
	}
	
	function insertOrder(){
	
		$sql = 'INSERT INTO orders (`orders_id` ,`cust_id` ,`orders_shipp_id` ,`cust_pay_name` ,`cust_pay_lname` ,
					`cust_pay_address` ,`cust_pay_district` ,`cust_pay_canton` ,`cust_pay_province` ,`cust_pay_postcode`,
					`cust_shipp_name` ,`cust_shipp_lname` ,`cust_shipp_address` ,`cust_shipp_district` ,`cust_shipp_canton` ,
					`cust_shipp_province` ,`cust_shipp_postcode` ,`cust_tel` ,`cust_phone` ,`payment_method` ,`orders_date` )
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) '; 
		$this->db->query($sql, 
		 array($this->orders_id, $this->CustID, $this->shipping_id, $this->PayCustName, $this->PayCustLname, 
					$this->PayCustAddress, $this->PayCustDistrict, $this->PayCustCanton, $this->PayCustPrv, $this->PayCustPostCode, 
					$this->ShippCustName, $this->ShippCustLname, $this->ShippCustAddress, $this->ShippCustDistrict, $this->ShippCustCanton, 
					$this->ShippCustPrv, $this->ShippCustPostCode, $this->CustTel, $this->CustPhone, $this->payment_method, date('Y-m-d H:i:s')));
	}
	function countOrderStaOne() {
			$sql='SELECT count(`orders_id`) AS countOrderStaOne FROM `orders` WHERE `orders_sta_id`=1';
		return $this->db->query($sql);
	}
	function countOrderStaTwo() {
			$sql='SELECT count(`orders_id`) AS countOrderStaTwo FROM `orders` WHERE `orders_sta_id`=2';
		return $this->db->query($sql);
	}
	function countOrderStaThree() {
			$sql='SELECT count(`orders_id`) AS countOrderStaThree FROM `orders` WHERE `orders_sta_id`=3';
		return $this->db->query($sql);
	}
	function countOrderStaFour() {
			$sql='SELECT count(`orders_id`) AS countOrderStaFour FROM `orders` WHERE `orders_sta_id`=4';
		return $this->db->query($sql);
	}
	function countOrderStaFive() {
			$sql='SELECT count(`orders_id`) AS countOrderStaFive FROM `orders` WHERE `orders_sta_id`=5';
		return $this->db->query($sql);
	}function countOrderStaSix() {
			$sql='SELECT count(`orders_id`) AS countOrderStaSix FROM `orders` WHERE `orders_sta_id`=6';
		return $this->db->query($sql);
	}function countOrderStaSeven() {
			$sql='SELECT count(`orders_id`) AS countOrderStaSeven FROM `orders` WHERE `orders_sta_id`=7';
		return $this->db->query($sql);
	}
}
?>
