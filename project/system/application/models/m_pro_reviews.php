<?php 
class M_pro_reviews extends Model {

public $pro_reviews_id;
public $pro_code;
public $cust_id;
public $cust_login;
public $pro_reviews_rating;
public $pro_reviews_date_added;
public $pro_reviews_read;
public $pro_reviews_text;
public $pro_reviews_sta_id;

	function M_pro_reviews() {
		parent::Model();
	}
	
	function addProReview() {
	
		$sql ='INSERT INTO pro_reviews (pro_code, cust_id, cust_login, pro_reviews_rating, pro_reviews_date_added, 
		pro_reviews_text, pro_reviews_sta_id) 
					VALUES (?, ?, ?, ?, ?, ?, ?)'; 
			$this->db->query($sql, array($this->ProCode, $this->CustID, $this->CustLogin, $this->ReviewsRating, date('Y-m-d H:i:s'), 
			 $this->text, $this->status));
		//echo $this->db->last_query();
		
	}
	
	function Review($pro_code) {
	
		$sql ='SELECT * FROM `pro_reviews` 
		INNER JOIN product on product.pro_code = pro_reviews.pro_code 
		INNER JOIN pro_image on pro_image.pro_code = pro_reviews.pro_code
		WHERE pro_reviews.pro_reviews_sta_id=1 AND pro_reviews.pro_code= ? GROUP BY pro_reviews.pro_reviews_id';
		return $this->db->query($sql, array($pro_code));
		
	}
	
	function GetReview($pro_reviews_id) {
	
		$sql ='SELECT * FROM `pro_reviews` 
		INNER JOIN product on product.pro_code = pro_reviews.pro_code 
		INNER JOIN pro_image on pro_image.pro_code = pro_reviews.pro_code
		WHERE pro_reviews.pro_reviews_id= ? GROUP BY pro_reviews.pro_reviews_id';
		return $this->db->query($sql, array($pro_reviews_id));
		
	}
	
	function updateReadReview($pro_reviews_id) {
	
		$sql = 'UPDATE pro_reviews SET pro_reviews_read = ? WHERE pro_reviews_id = ?';
		return $this->db->query($sql, array('1', $pro_reviews_id));
		
	}
	
	function updatestaReview($pro_reviews_id) {
		
		$sql = 'UPDATE pro_reviews SET pro_reviews_sta_id = ? WHERE pro_reviews_id = ?';
		return $this->db->query($sql, array($this->pro_reviews_sta_id, $pro_reviews_id));
		
	}
	
	function ShowAllNoReadReview() {
	
		$sql ='SELECT * FROM `pro_reviews` 
		INNER JOIN product on product.pro_code = pro_reviews.pro_code 
		INNER JOIN pro_image on pro_image.pro_code = pro_reviews.pro_code
		WHERE pro_reviews.pro_reviews_read = 0
		GROUP BY pro_reviews.pro_reviews_id';
		return $this->db->query($sql);
		
	}
	
	function ShowAllReadReview() {
	
		$sql ='SELECT * FROM `pro_reviews` 
		INNER JOIN product on product.pro_code = pro_reviews.pro_code 
		INNER JOIN pro_image on pro_image.pro_code = pro_reviews.pro_code
		WHERE pro_reviews.pro_reviews_read = 1
		GROUP BY pro_reviews.pro_reviews_id';
		return $this->db->query($sql);
		
	}
	
	function showReview($pro_code) {
	
		$sql ='SELECT * FROM `pro_reviews` 
				INNER JOIN product 
				INNER JOIN pro_image on product.pro_code = pro_image.pro_code 
				WHERE pro_reviews.sta_reviews_id=1 AND product.pro_code=? 
				GROUP BY pro_reviews.reviews_id';
		return $this->db->query($sql, array($pro_code));
	}
	
	function countReviewsNew($today) {
			$sql='SELECT count( `pro_reviews_id` ) AS countReviewsNew FROM `pro_reviews` WHERE date( `pro_reviews_date_added` ) = ?';
		return $this->db->query($sql, array($today));
	}
	
	function countReviews() {
			$sql='SELECT count( `pro_reviews_id` ) AS countReviews FROM `pro_reviews`';
		return $this->db->query($sql);
	}
}