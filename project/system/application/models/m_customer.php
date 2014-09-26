<?php
class M_customer extends Model {

public $CustID;
public $CustLogin;
public $CustPassword;
public $CustName;
public $CustLname;
public $CustSex;
public $CustAddress;
public $CustTumbol;
public $CustAmphor;
public $CustProvince;
public $CustPostcode;
public $CustEmail;
public $CustTel;
public $CustPhone;
public $CustIncome;
public $CustJob;
public $CustEducation;
public $CustSta_mar;
public $CustStatus;
public $CustQuestion;
public $CustAnswer;
public $CustChaPass;
public $CustChaPass2;

	function M_customer() {
	
		parent::Model();
		
	}

	function checkLoginCust(){
	
		$sql = 'SELECT * FROM customer WHERE cust_login = ? AND cust_password = ? AND cust_sta_id=1';
		return $this->db->query($sql, array($this->CustLogin, $this->CustPassword));
		//echo $this->db->last_query();
		
	}	
	
	function Notarma1() {
	$sql='SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoPro FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE month( orders.orders_date ) BETWEEN 01 AND 03  AND year(orders.orders_date)=1111  AND orders.orders_sta_id=5
					GROUP BY orders.orders_sta_id';
			return $this->db->query($sql);
	}
	
	function tarma1() {
	$sql='SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoPro FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE month( orders.orders_date ) BETWEEN 01 AND 03  AND year(orders.orders_date)=2010  AND orders.orders_sta_id=5
					GROUP BY orders.cust_id';
			return $this->db->query($sql);
	}
	
	function tarma2() {
	$sql='SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoPro FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE month( orders.orders_date ) BETWEEN 04 AND 06  AND year(orders.orders_date)=2010  AND orders.orders_sta_id=5 GROUP BY orders.cust_id';
			return $this->db->query($sql);
	}
	
	function tarma3() {
	$sql='SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoPro FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE month( orders.orders_date ) BETWEEN 07 AND 09  AND year(orders.orders_date)=2010  AND orders.orders_sta_id=5 GROUP BY orders.cust_id';
			return $this->db->query($sql);
	}
	
		function tarma4() {
	$sql='SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell , sum(orders_product.orders_pro_qty) AS sumtoPro FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE month( orders.orders_date ) BETWEEN 10 AND 12  AND year(orders.orders_date)=2010  AND orders.orders_sta_id=5 GROUP BY orders.cust_id';
			return $this->db->query($sql);
	}
	
	function ShowEmailCust(){
			$sql = 'SELECT * FROM customer WHERE cust_email = ? AND cust_quest_id = ? AND cust_answer = ?';
		return $this->db->query($sql, array($this->cust_email, $this->cust_quest_id, $this->cust_answer));
	}
	
	
	 function checkEmailCust() {
		$this->db->where('cust_email', $_POST['cust_email']);
		$this->db->from('customer');
		$ckEmail = $this->db->count_all_results();  //นับว่ามีกี่แถวที่ query ออกมาแล้วเก็บไว้ใน ct แล้วส่งกลับไปที่ $num ใน cutomer/doadd
		return $ckEmail;
		
	 }
	
	function showCustBetweenYear() {
		$sql = 'SELECT customer.cust_id, customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM customer INNER JOIN orders on customer.cust_id = orders.cust_id INNER JOIN orders_product on orders_product.orders_id = orders.orders_id WHERE year( orders.orders_date ) BETWEEN ? AND ? AND orders.orders_sta_id=5 GROUP BY orders.cust_id 
 '; 
		return $this->db->query($sql, array($this->year1-543, $this->year2-543));
		//echo $this->db->last_query();
	}
	function showCustYear() {
		$sql = 'SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE year( orders.orders_date ) BETWEEN 2010 AND 2010 AND orders.orders_sta_id=5  GROUP BY orders.cust_id '; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function NoshowCustYear() {
		$sql = 'SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE year( orders.orders_date ) BETWEEN 1111 AND 1111 AND orders.orders_sta_id=5 GROUP BY orders.cust_id '; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function showCustBetweenMonth() {
		$sql = 'SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE month( orders.orders_date ) BETWEEN ? AND ?  AND year(orders.orders_date)=2010  AND orders.orders_sta_id=5
					GROUP BY orders.cust_id'; 
		return $this->db->query($sql, array($this->mon1, $this->mon2));
		//echo $this->db->last_query();
	}
	
	function showCustMonth() {
		$sql = 'SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE month( orders.orders_date ) BETWEEN 01 AND 12  AND year(orders.orders_date)=2010  AND orders.orders_sta_id=5
					GROUP BY orders.cust_id'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function NoshowCustMonth() {
		$sql = 'SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE month( orders.orders_date ) BETWEEN 13 AND 13  AND year(orders.orders_date)=2010  AND orders.orders_sta_id=5
					GROUP BY orders.cust_id'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function showCustBetweenDay() {
		$sql = 'SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE orders.orders_date BETWEEN ? AND ? AND orders.orders_sta_id=5 GROUP BY orders.cust_id '; 
		return $this->db->query($sql, array($this->day1, $this->day2));
		//echo $this->db->last_query();
	}
	
	function showCustDay() {
		$sql = 'SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE orders.orders_date BETWEEN 2010-01-01 AND 2010-12-31 AND orders.orders_sta_id=5 GROUP BY orders.cust_id '; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function NoshowCustDay() {
		$sql = 'SELECT customer.cust_name, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM customer
					 INNER JOIN orders on customer.cust_id = orders.cust_id 
					  INNER JOIN orders_product on orders_product.orders_id = orders.orders_id  
					WHERE orders.orders_date BETWEEN 1111-01-01 AND 1111-12-31 AND orders.orders_sta_id=5 GROUP BY orders.cust_id '; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function checkLoginNumCust(){
		$this->db->where('cust_login', $_POST['cust_login']);
		$this->db->from('customer');
		$cklogin = $this->db->count_all_results();  //นับว่ามีกี่แถวที่ query ออกมาแล้วเก็บไว้ใน ct แล้วส่งกลับไปที่ $num ใน cutomer/doadd
		return $cklogin;
 	}
	
	
	function checkForgetCust() {
	
		$sql = 'SELECT * FROM customer INNER JOIN cust_question ON customer.cust_quest_id = cust_question.cust_quest_id 
		        WHERE customer.cust_login = ? AND cust_question.cust_quest_id = ? AND customer.cust_answer = ?';
		return $this->db->query($sql, array($this->CustLogin, $this->CustQuestion, $this->CustAnswer));
		
	}
	
	
	function addoneCust($cust_id) {
	
		$sql = 'SELECT * FROM customer WHERE cust_id = ?';
		return $this->db->query($sql, array($cust_id));
		
	}
	
	
	function delCust($cust_id) {
	
		$sql = "DELETE FROM customer WHERE cust_id=?";
		$this->db->query($sql, array($cust_id));
			
	}
	
	
	function reportCust() {
			$sql='SELECT customer.cust_id,customer.cust_name,sum(orders_total.orders_total_value) AS total FROM orders
		INNER JOIN customer ON orders.cust_id = customer.cust_id
		INNER JOIN orders_status ON orders.orders_sta_id = orders_status.orders_sta_id
		INNER JOIN orders_total ON orders.orders_id = orders_total.orders_id 
		WHERE orders_total.orders_total_title="Total:" AND orders.orders_sta_id=5 GROUP BY customer.cust_id';
		return $this->db->query($sql);
	}
	
	
	function insertCust() {
	
		$sql ='INSERT INTO `customer` (`cust_login` ,`cust_password` ,`cust_name` ,`cust_lname` ,`cust_sex` ,`cust_email` ,
					`cust_tel` ,`cust_phone` , `cust_inc_id` ,`cust_job_id` ,`cust_edu_id` ,`cust_sta_mar_id` ,
					`cust_code_activate` ,`cust_quest_id` ,`cust_answer` ,`cust_regist_date`) 
					VALUES (?,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);'; 
			   
		$this->db->query($sql, array($this->CustLogin, $this->CustPassword, $this->CustName, $this->CustLname, $this->CustSex,$this->Email, 
		$this->CustTel, $this->CustPhone, $this->CustIncome, $this->CustJob, $this->CustEducation, $this->CustSta_mar,
		$this->ActivateCode, $this->CustQuestion, $this->CustAnswer, date('Y-m-d H:i:s')));
		
		$sql1 = 'SELECT * FROM customer WHERE cust_login = ? AND cust_password = ?';
		return $this->db->query($sql1, array($this->CustLogin, $this->CustPassword));
		
	}
	
	
	function activateCust($code) {
	
		$sql = "UPDATE customer SET cust_sta_id=1 WHERE cust_code_activate='$code' ";
		$this->db->query($sql);
		
	}
	
	
	function getShowPassCust() {
	
		$login = $this->session->userdata('login');
		$sql = 'SELECT cust_password FROM customer WHERE cust_login=?';
		return $this->db->query($sql, array($login));
		//echo $this->db->last_query();
		
	}
	
	
	function checkPasswordCust(){
	
			$sql = 'SELECT * FROM customer WHERE cust_password = ? ';
			return $this->db->query($sql, array($this->CurrentPass));
		
	}
	
	
	function updatePasswordCust() {
		$sql = 'UPDATE `it51630480`.`customer` SET `cust_password` = ? WHERE `customer`.`cust_id` = ?';
		$this->db->query($sql, array( $this->NewPass, $this->CustID));
	}
	
	
	function getOneCust($cust_id) {
		$sql = 'SELECT *FROM customer    
				 INNER JOIN cust_education ON customer.cust_edu_id = cust_education.cust_edu_id 
				  INNER JOIN cust_income ON customer.cust_inc_id = cust_income.cust_inc_id 
				  INNER JOIN cust_question ON customer.cust_quest_id = cust_question.cust_quest_id 
				  INNER JOIN cust_status ON customer.cust_sta_id = cust_status.cust_sta_id 
				  INNER JOIN cust_sta_mar ON customer.cust_sta_mar_id = cust_sta_mar.cust_sta_mar_id 
				  INNER JOIN cust_job ON customer.cust_job_id = cust_job.cust_job_id
				WHERE cust_id=?';
		return $this->db->query($sql, array($cust_id));
		
	}
	
		
	function getShowOneCust() {
	
		$login = $this->session->userdata('login');
		$sql = 'SELECT customer.cust_id , customer.cust_login , customer.cust_password , 		
				customer.cust_name , customer.cust_lname , customer.cust_sex,
				customer.cust_addr_shipp_id, customer.cust_addr_pay_id, customer.cust_email 
				, customer.cust_tel , customer.cust_phone , cust_income.cust_inc_id , cust_job.cust_job_id , 
				cust_education.cust_edu_id , cust_sta_mar.cust_sta_mar_id , cust_status.cust_sta_id , customer.cust_code_activate , 
				cust_question.cust_quest_id , customer.cust_answer , customer.cust_regist_date 
				FROM customer    
							 INNER JOIN cust_education ON customer.cust_edu_id = cust_education.cust_edu_id 
		 					  INNER JOIN cust_income ON customer.cust_inc_id = cust_income.cust_inc_id 
		 					  INNER JOIN cust_question ON customer.cust_quest_id = cust_question.cust_quest_id 
		 				      INNER JOIN cust_status ON customer.cust_sta_id = cust_status.cust_sta_id 
							  INNER JOIN cust_sta_mar ON customer.cust_sta_mar_id = cust_sta_mar.cust_sta_mar_id 
							  INNER JOIN cust_job ON customer.cust_job_id = cust_job.cust_job_id
				WHERE cust_login=?';
		return $this->db->query($sql, array($login));
		
	}
	
	
	function getAllCust() {
	
		$sql = 'SELECT * FROM customer    
				INNER JOIN cust_education ON customer.cust_edu_id = cust_education.cust_edu_id 
		 		INNER JOIN cust_income ON customer.cust_inc_id = cust_income.cust_inc_id 
		 		INNER JOIN cust_question ON customer.cust_quest_id = cust_question.cust_quest_id 
				INNER JOIN cust_status ON customer.cust_sta_id = cust_status.cust_sta_id 
				INNER JOIN cust_sta_mar ON customer.cust_sta_mar_id = cust_sta_mar.cust_sta_mar_id 
				INNER JOIN cust_job ON customer.cust_job_id = cust_job.cust_job_id';
				return $this->db->query($sql);
				
	}
	
	
	function getAddrPay($cust_id) {
	
	 $sql =  'SELECT * FROM  cust_address_pay  INNER JOIN cust_province ON
	 		 cust_address_pay.cust_prv_id = cust_province.cust_prv_id WHERE cust_address_pay.cust_id=?';
	 	return $this->db->query($sql, array($cust_id));
		
	}
	
	
	function updateAccountCust() {
		$sql = 'UPDATE customer SET cust_name = ?, cust_lname = ?, cust_tel = ?, cust_phone = ? WHERE cust_id = ?';
		$this->db->query($sql, array($this->CustName, $this->CustLname, $this->CustTel, $this->CustPhone, $this->CustID));
	}


	function updateCust() {
	
		$sql = 'UPDATE customer SET 
				cust_login = ?,
				cust_password = ?,
				cust_name = ?,
				cust_lname = ?,
				cust_sex = ?,
				cust_email = ?,
				cust_tel = ?,
				cust_phone = ?,
				cust_inc_id = ?,
				cust_job_id = ?,
				cust_edu_id = ?,
				cust_sta_mar_id = ?,
				cust_sta_id = ?,
				cust_quest_id = ?,
				cust_answer = ?
				WHERE cust_id= ?';
		$this->db->query($sql, array($this->CustLogin, $this->CustPassword, $this->CustName, 
		$this->CustLname, $this->CustSex, $this->CustEmail, $this->CustTel, $this->CustPhone, $this->CustIncome, 
		$this->CustJob, $this->CustEducation, $this->CustSta_mar, $this->StaID, $this->CustQuestion, $this->CustAnswer,  $this->CustID));
		//echo $this->db->last_query();
		
	}


	function updatePassCust() {
	
		$sql = 'UPDATE customer SET 
				cust_password = ?, 
				WHERE cust_login = ? ';
		$this->db->query($sql, array($this->CustChaPass, $this->CustLogin));
		//echo $this->db->last_query();
		
	}
	
	
	function updateAddCust($cust_id1,$cust_addr_pay_id,$cust_addr_shipp_id){
	
		$sql = 'UPDATE customer SET cust_addr_shipp_id = ?, cust_addr_pay_id = ? WHERE cust_id =?'; 
		$this->db->query($sql, array($cust_addr_shipp_id, $cust_addr_pay_id, $cust_id1));
	
	}
	
	
	function searchCust($txt) {
	
		$sql = "SELECT * FROM customer    
				INNER JOIN cust_address_shipp ON customer.cust_addr_shipp_id = cust_address_shipp.cust_addr_shipp_id
				INNER JOIN cust_address_pay  ON customer.cust_addr_pay_id = cust_address_pay.cust_addr_pay_id
				INNER JOIN cust_education ON customer.cust_edu_id = cust_education.cust_edu_id 
		 		INNER JOIN cust_income ON customer.cust_inc_id = cust_income.cust_inc_id 
		 		INNER JOIN cust_question ON customer.cust_quest_id = cust_question.cust_quest_id 
		 		INNER JOIN cust_status ON customer.cust_sta_id = cust_status.cust_sta_id 
				INNER JOIN cust_sta_mar ON customer.cust_sta_mar_id = cust_sta_mar.cust_sta_mar_id 
				INNER JOIN cust_job ON customer.cust_job_id = cust_job.cust_job_id
				WHERE customer.cust_name LIKE '%$txt%'";
		return $this->db->query($sql);
		
	}
	
	function getOneCustShowPro($cust_id, $year1, $year2) {
		$sql = 'SELECT * FROM customer
					INNER JOIN orders ON customer.cust_id = orders.cust_id
					INNER JOIN orders_product ON orders.orders_id = orders_product.orders_id
					INNER JOIN product ON orders_product.pro_code = product.pro_code
					WHERE orders.cust_id=? AND year( orders.orders_date ) BETWEEN ? AND ?';
		return $this->db->query($sql, array($cust_id, $year1-543, $year2-543));
		}
		
	function countCustNew($today) {
			$sql='SELECT count(`cust_login`) AS countCustNew FROM `customer` WHERE date(cust_regist_date) = ?';
		return $this->db->query($sql, array($today));
	}
	
	function countCust() {
			$sql='SELECT count(`cust_login`) AS countCust FROM customer';
		return $this->db->query($sql);
	}
	function CustBetweenDay_admin_cust($txt) {
		$sql = "SELECT * , sum(orders_product.orders_pro_toSell) AS sumtoSell,date(orders.orders_date) AS ordersDate FROM customer 
			INNER JOIN orders on customer.cust_id = orders.cust_id 
			INNER JOIN orders_product on orders_product.orders_id = orders.orders_id 
			WHERE orders.orders_date BETWEEN ? AND ?
			AND orders.orders_sta_id=5 
			AND customer.cust_name LIKE '%$txt%' 
			GROUP BY orders.orders_date "; 
		return $this->db->query($sql, array($this->day1,$this->day2));
		}
		function NoCustBetweenDay_admin_cust() {
		$sql = "SELECT customer.cust_name, customer.cust_lname, sum(orders_product.orders_pro_toSell) AS sumtoSell,date(orders.orders_date) AS ordersDate,orders.orders_id, orders_product.orders_pro_qty  FROM customer INNER JOIN orders on customer.cust_id = orders.cust_id INNER JOIN orders_product on orders_product.orders_id = orders.orders_id WHERE orders.orders_date BETWEEN ? AND ? AND orders.orders_sta_id=5 GROUP BY orders.orders_date"; 
		return $this->db->query($sql, array($this->day1,$this->day2));
		}
}
?>
