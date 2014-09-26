<?php
class M_cust_address_pay extends Model {

public $cust_addr_pay_id;
public $cust_pay_name;
public $cust_pay_lname;
public $cust_pay_address;
public $cust_pay_district;
public $cust_pay_canton;
public $cust_pay_prv_id;
public $cust_pay_postcode;
public $cust_id;

	function M_cust_address_pay() {
	
		parent::Model();
		
	}	
	
	function getAddressCust($cust_id) {
	
		$sql = 'SELECT * FROM cust_address_pay 
				INNER JOIN cust_province ON cust_province.cust_prv_id = cust_address_pay.cust_pay_prv_id 
				WHERE cust_address_pay.cust_id =?';
		return $this->db->query($sql, array($cust_id));
		//echo $this->db->last_query();
		
	}
	
	
	function deletePay($id) {
		$sql = 'DELETE FROM cust_address_pay WHERE cust_addr_pay_id= ?';
		$this->db->query($sql, array($id));	
	}
	
	
	function checkidAddCust($cust_id,$cust_addr_pay_id){
		$sql = 'SELECT * FROM cust_address_pay 
				INNER JOIN cust_province ON cust_province.cust_prv_id = cust_address_pay.cust_pay_prv_id 
				WHERE cust_address_pay.cust_id =? AND cust_address_pay.cust_addr_pay_id =?';
		return $this->db->query($sql, array($cust_id, $cust_addr_pay_id));
		
	}
	
	
	function insertAddressPayCust() {
		
		$sql ='INSERT INTO cust_address_pay (
				`cust_pay_name` ,
				`cust_pay_lname` ,
				`cust_pay_address` ,
				`cust_pay_district` ,
				`cust_pay_canton` ,
				`cust_pay_prv_id` ,
				`cust_pay_postcode` ,
				`cust_id` 
				)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?);'; 
				
		$this->db->query($sql, array( $this->CustName, $this->CustLname, $this->CustAddress, $this->CustTumbol, $this->CustAmphor, 
		$this->CustProvince, $this->CustPostcode, $this->CustID));
		
		$sql1 ='INSERT INTO cust_address_shipp (
			  `cust_shipp_name` ,
			  `cust_shipp_lname` ,
			  `cust_shipp_address` ,
			  `cust_shipp_district` ,
			  `cust_shipp_canton` ,
			  `cust_shipp_prv_id` ,
			  `cust_shipp_postcode` ,
			  `cust_id` )
				VALUES (?, ?, ?, ?, ?, ?, ?, ?);'; 
				
		$this->db->query($sql1, array( $this->CustName, $this->CustLname, $this->CustAddress, $this->CustTumbol, $this->CustAmphor, 
		$this->CustProvince, $this->CustPostcode, $this->CustID));
	
		$sql1='SELECT * FROM cust_address_pay WHERE cust_pay_name=? AND cust_pay_lname=? AND cust_pay_address=? AND 
			  cust_pay_district=? AND cust_pay_canton=? AND cust_pay_prv_id=? AND cust_pay_postcode=? AND cust_id=?';
			  
		 return	$this->db->query($sql1, array( $this->CustName, $this->CustLname, $this->CustAddress, $this->CustTumbol, 
		 $this->CustAmphor, $this->CustProvince, $this->CustPostcode,  $this->CustID));
		
	}
	
	
	function updateAddressPay() {
		$sql ='UPDATE cust_address_pay SET `cust_pay_name` = ?,
					`cust_pay_lname` = ?,
					`cust_pay_address` = ?,
					`cust_pay_district` = ?,
					`cust_pay_canton` = ?,
					`cust_pay_prv_id` = ?,
					`cust_pay_postcode` = ?,
					`cust_id` = ? WHERE `cust_address_pay`.`cust_addr_pay_id` =?'; 
		$this->db->query($sql, array( $this->CustName, $this->CustLname, $this->CustAddress, $this->CustTumbol, $this->CustAmphor, 
		$this->CustProvince, $this->CustPostcode, $this->CustID, $this->CustAddrPayID));
		
			$sql2 ='UPDATE cust_address_shipp SET `cust_shipp_name` = ?,
				`cust_shipp_lname` = ?,
				`cust_shipp_address` = ?,
				`cust_shipp_district` = ?,
				`cust_shipp_canton` = ?,
				`cust_shipp_prv_id` = ?,
				`cust_shipp_postcode` = ?,
				`cust_id` = ? WHERE `cust_address_shipp`.`cust_addr_shipp_id` =?'; 
		$this->db->query($sql2, array( $this->CustName, $this->CustLname, $this->CustAddress, $this->CustTumbol, $this->CustAmphor, 
		$this->CustProvince, $this->CustPostcode, $this->CustID, $this->CustAddrPayID));
	}
		
	
}
?>
