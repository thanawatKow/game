<?php
class M_cust_address_shipp extends Model {

public $cust_shipp_addr_id;
public $cust_shipp_name;
public $cust_shipp_lname;
public $cust_shipp_address;
public $cust_shipp_district;
public $cust_shipp_canton;
public $cust_shipp_prv_id;
public $cust_shipp_postcode;
public $cust_id;

	function M_cust_address_shipp() {
	
		parent::Model();
		
	}


	function getAddressShipp($cust_id) {
	
		$sql = 'SELECT * FROM cust_address_shipp 
				INNER JOIN cust_province ON cust_province.cust_prv_id = cust_address_shipp.cust_shipp_prv_id 
				WHERE cust_address_shipp.cust_id =?';
		return $this->db->query($sql, array($cust_id));
		//echo $this->db->last_query();
		
	}
	
	
	function deleteShipp($cust_addr_shipp_id) {
	
		$sql = 'DELETE FROM cust_address_shipp WHERE cust_addr_shipp_id= ?';
		$this->db->query($sql, array($cust_addr_shipp_id));
		
	}
	
	
	function insertAddressShipp() {
	
		$sql ='INSERT INTO cust_address_shipp (
			  `cust_shipp_name` ,
			  `cust_shipp_lname` ,
			  `cust_shipp_address` ,
			  `cust_shipp_district` ,
			  `cust_shipp_canton` ,
			  `cust_shipp_prv_id` ,
			  `cust_shipp_postcode` ,
			  `cust_id` )
				VALUES (?, ?, ?, ?, ?, ?, ?, ?);'; 
			  
		$this->db->query($sql, array( $this->CustName, $this->CustLname, $this->CustAddress, $this->CustTumbol, $this->CustAmphor, 
		$this->CustProvince, $this->CustPostcode, $this->CustID));
		
		$sql2 ='INSERT INTO cust_address_pay (
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
				
		$this->db->query($sql2, array( $this->CustName, $this->CustLname, $this->CustAddress, $this->CustTumbol, $this->CustAmphor, 
		$this->CustProvince, $this->CustPostcode, $this->CustID));
		
		$sql1='SELECT * FROM cust_address_shipp WHERE cust_shipp_name=? AND cust_shipp_lname=? AND cust_shipp_address=? AND 
			  cust_shipp_district=? AND cust_shipp_canton=? AND cust_shipp_prv_id=? AND cust_shipp_postcode=? AND cust_id=?';
			  
		 return	$this->db->query($sql1, array( $this->CustName, $this->CustLname, $this->CustAddress, $this->CustTumbol, 
		 $this->CustAmphor, $this->CustProvince, $this->CustPostcode,  $this->CustID));
		
	}

	
	function checkAddrShipp($cust_id,$cust_addr_shipp_id) {
	
		$sql = 'SELECT * FROM cust_address_shipp 
		       INNER JOIN cust_province ON cust_province.cust_prv_id = cust_address_shipp.cust_shipp_prv_id 
		       WHERE cust_address_shipp.cust_id =? AND cust_address_shipp.cust_addr_shipp_id =?';
		return $this->db->query($sql, array($cust_id, $cust_addr_shipp_id));
		//echo $this->db->last_query();
	}
	
	
	function ShowAddressShipp($cust_addr_shipp_id){
		$sql = 'SELECT * FROM cust_address_shipp
					INNER JOIN cust_province ON cust_address_shipp.cust_shipp_prv_id = cust_province.cust_prv_id 
					WHERE cust_addr_shipp_id=?';
		return $this->db->query($sql, array($cust_addr_shipp_id));
	
	}
	
	
	function getAddrShipp($cust_id){
	
	 $sql =  'SELECT * FROM  cust_address_shipp  INNER JOIN cust_province ON
	 				cust_address_shipp.cust_shipp_prv_id = cust_province.cust_prv_id WHERE cust_address_shipp.cust_id=?';
	 	return $this->db->query($sql, array($cust_id));
		
	}
		
}
?>
