<?php 
class M_product extends Model {

public $pro_id;
public $pro_code;
public $pro_name;
public $pro_type_id;
public $pro_sub_type_id;
public $pro_brands_id;
public $pro_color_id;
public $pro_detail;
public $pro_date;
public $pro_price;
public $pro_sell;
public $pro_quantity;
public $pro_dis_id;
public $pro_status_id;
public $pro_type_list;
public $pro_sub_type_list;
public $pro_brands_list;
public $pro_color_list;
public $pro_dis_list;
public $pro_status_list;
public $pro_image_id;
public $pro_picture;


	function M_product() {
	
		parent::Model();
		
	}
	
	
	function getShowPro(){
	
	$sql = 'SELECT * FROM product 
			INNER JOIN pro_type on product.pro_type_id = pro_type.pro_type_id 
			INNER JOIN pro_image on product.pro_code = pro_image.pro_code
			INNER JOIN pro_status on product.pro_sta_id = pro_status.pro_sta_id
			WHERE product.pro_sta_id =1
			group by pro_type.pro_type_list
			ORDER BY pro_type.pro_type_list ASC ';
	return $this->db->query($sql);
	//echo $this->db->last_query();
	}
	
	function NewDatePro(){
		$sql='SELECT * FROM `product` 
			INNER JOIN pro_type on product.pro_type_id = pro_type.pro_type_id 
			INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
			INNER JOIN pro_image on product.pro_code = pro_image.pro_code
			INNER JOIN pro_discounts on product.pro_dis_id = pro_discounts.pro_dis_id
			INNER JOIN pro_status on product.pro_sta_id = pro_status.pro_sta_id 
			ORDER BY `product`.`pro_date` DESC';
		return $this->db->query($sql);
	}
	function num_rows($pro_sub_type_id){
	
		$sql = 'SELECT pro_code FROM product WHERE pro_sub_type_id=?';
		$query =  $this->db->query($sql, array($pro_sub_type_id));
		return $query->num_rows();
		
	}
	
	function showProductBetweenYear() {
		$sql = 'SELECT pro_type.pro_type_list, orders_product.pro_code,pro_sub_type.pro_sub_type_list, pro_name, 
		sum( orders_product.orders_pro_qty ) AS qry, 
		sum( orders_product.orders_pro_toSell ) AS sumtoSell, product.pro_sell FROM product
		INNER JOIN orders_product ON product.pro_code = orders_product.pro_code
		INNER JOIN orders ON orders_product.orders_id = orders.orders_id
		INNER JOIN pro_sub_type ON product.pro_sub_type_id = pro_sub_type.pro_sub_type_id
		INNER JOIN pro_type ON product.pro_type_id = pro_type.pro_type_id
		WHERE year( orders.orders_date ) 
		BETWEEN ? AND ? GROUP BY orders_product.pro_code
		ORDER BY `qry` DESC '; 
		return $this->db->query($sql, array($this->year1-543, $this->year2-543));
		//echo $this->db->last_query();
	}
	
	function showNoProductBetweenYear2() {
		$sql = 'SELECT * FROM product
		INNER JOIN orders_product ON product.pro_code = orders_product.pro_code
		INNER JOIN orders ON orders_product.orders_id = orders.orders_id
		INNER JOIN pro_sub_type ON product.pro_sub_type_id = pro_sub_type.pro_sub_type_id
		INNER JOIN pro_type ON product.pro_type_id = pro_type.pro_type_id'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function showNoProductBetweenYear() {
		$sql = 'SELECT * FROM product
		INNER JOIN pro_sub_type ON product.pro_sub_type_id = pro_sub_type.pro_sub_type_id
		INNER JOIN pro_type ON product.pro_type_id = pro_type.pro_type_id
		WHERE year( product.pro_date ) BETWEEN ? AND ? ORDER BY `pro_quantity` DESC '; 
		return $this->db->query($sql, array($this->year1-543, $this->year2-543));
		//echo $this->db->last_query();
	}
	
	function showProductYear() {
		$sql = 'SELECT pro_sub_type.pro_sub_type_list, pro_name, sum(orders_product.orders_pro_qty) 
					AS qry, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM product
					 INNER JOIN orders_product on product.pro_code = orders_product.pro_code 
					 INNER JOIN orders on orders_product.orders_id = orders.orders_id 
					INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
					WHERE year( orders.orders_date ) BETWEEN 2010 AND 2010 GROUP BY orders_product.pro_code'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function NoshowProductYear() {
		$sql = 'SELECT pro_sub_type.pro_sub_type_list, pro_name, sum(orders_product.orders_pro_qty) 
					AS qry, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM product
					 INNER JOIN orders_product on product.pro_code = orders_product.pro_code 
					 INNER JOIN orders on orders_product.orders_id = orders.orders_id 
					INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
					WHERE year( orders.orders_date ) BETWEEN 1111 AND 1111 GROUP BY orders_product.pro_code'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
		function showProductBetweenMonth() {
		$sql = 'SELECT pro_type.pro_type_list, orders_product.pro_code,pro_sub_type.pro_sub_type_list, pro_name, 
		sum( orders_product.orders_pro_qty ) AS qry, 
		sum( orders_product.orders_pro_toSell ) AS sumtoSell, product.pro_sell FROM product
		INNER JOIN orders_product ON product.pro_code = orders_product.pro_code
		INNER JOIN orders ON orders_product.orders_id = orders.orders_id
		INNER JOIN pro_sub_type ON product.pro_sub_type_id = pro_sub_type.pro_sub_type_id
		INNER JOIN pro_type ON product.pro_type_id = pro_type.pro_type_id
		WHERE month( orders.orders_date ) 
		BETWEEN ? AND ? GROUP BY orders_product.pro_code
		ORDER BY `qry` DESC '; 
		return $this->db->query($sql, array($this->mon1, $this->mon2));
		//echo $this->db->last_query();
	}
	
	function showProductMonth() {
		$sql = 'SELECT pro_sub_type.pro_sub_type_list, pro_name, sum(orders_product.orders_pro_qty) 
					AS qry, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM product
					 INNER JOIN orders_product on product.pro_code = orders_product.pro_code 
					  INNER JOIN orders on orders_product.orders_id = orders.orders_id 
					INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
					WHERE month(orders.orders_date) BETWEEN 01 AND 12 and year(orders.orders_date)=2010 
					GROUP BY orders_product.pro_code'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function NoshowProductMonth() {
		$sql = 'SELECT pro_sub_type.pro_sub_type_list, pro_name, sum(orders_product.orders_pro_qty) 
					AS qry, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM product
					 INNER JOIN orders_product on product.pro_code = orders_product.pro_code 
					  INNER JOIN orders on orders_product.orders_id = orders.orders_id 
					INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
					WHERE month(orders.orders_date) BETWEEN 13 AND 13 and year(orders.orders_date)=2010 
					GROUP BY orders_product.pro_code'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function showProductlBetweenDay() {
		$sql = 'SELECT pro_sub_type.pro_sub_type_list, pro_name, sum(orders_product.orders_pro_qty) 
					AS qry, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM product
					 INNER JOIN orders_product on product.pro_code = orders_product.pro_code 
					  INNER JOIN orders on orders_product.orders_id = orders.orders_id 
					INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
					WHERE orders.orders_date BETWEEN ? AND ? 
					GROUP BY orders_product.pro_code'; 
		return $this->db->query($sql, array($this->day1, $this->day2));
		//echo $this->db->last_query();
	}
	
	function showProductlDay() {
		$sql = 'SELECT pro_sub_type.pro_sub_type_list, pro_name, sum(orders_product.orders_pro_qty) 
					AS qry, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM product
					 INNER JOIN orders_product on product.pro_code = orders_product.pro_code 
					  INNER JOIN orders on orders_product.orders_id = orders.orders_id 
					INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
					WHERE orders.orders_date BETWEEN 2010-01-01 AND 2010-12-31 
					GROUP BY orders_product.pro_code'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function NoshowProductlDay() {
		$sql = 'SELECT pro_sub_type.pro_sub_type_list, pro_name, sum(orders_product.orders_pro_qty) 
					AS qry, sum(orders_product.orders_pro_toSell) AS sumtoSell FROM product
					 INNER JOIN orders_product on product.pro_code = orders_product.pro_code 
					  INNER JOIN orders on orders_product.orders_id = orders.orders_id 
					INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
					WHERE orders.orders_date BETWEEN 1111-01-01 AND 1111-12-31 
					GROUP BY orders_product.pro_code'; 
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}

	function showSellProductlYear() {
		$sql = 'SELECT  pro_sub_type.pro_sub_type_list, product.pro_name, sum(orders_product.orders_pro_qty)  AS qty, 
		sum(orders_product.orders_pro_toSell)   AS orders_pro_toSell FROM product
		 INNER JOIN orders_product on product.pro_code = orders_product.pro_code 
		INNER JOIN orders on orders_product.orders_id = orders.orders_id
		 INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
		 WHERE date(orders.orders_date) = ? AND orders.orders_sta_id=5
		  GROUP BY orders.orders_id'; 
		return $this->db->query($sql, array($this->day1));
		//echo $this->db->last_query();
	}

	function num_rows_type($pro_type_id){
	
		$sql = 'SELECT pro_code FROM product WHERE pro_type_id=?';
		$query =  $this->db->query($sql, array($pro_type_id));
		return $query->num_rows();
	}

	function getAllPro(){
	
		$sql = 'SELECT product.pro_id,
					   product.pro_code,
					   product.pro_name,
					   pro_type.pro_type_list,
					   pro_sub_type.pro_sub_type_list,
					   pro_brands.pro_brands_list,
					   pro_color.pro_color_list,
					   product.pro_detail,
					   product.pro_date,
					   product.pro_price,
					   product.pro_sell,
					   pro_discounts.pro_dis_list,
					   pro_status.pro_sta_list
				FROM product INNER JOIN pro_type on product.pro_type_id = pro_type.pro_type_id 
							 INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
							 INNER JOIN pro_brands on product.pro_brands_id = pro_brands.pro_brands_id 
							 INNER JOIN pro_color on product.pro_color_id = pro_color.pro_color_id
							 INNER JOIN pro_discounts on product.pro_dis_id = pro_discounts.pro_dis_id
							 INNER JOIN pro_status on product.pro_sta_id = pro_status.pro_sta_id'; 
		return $this->db->query($sql);
	
	}

	function getNextCode(){
		
		$sql = 'SELECT max(pro_code) as nextcode FROM product ';
		$query = $this->db->query($sql);
		$row = $query->row();
		$nextcode=substr($row->nextcode,1)+1;
		return "P".substr(("00000".$nextcode),-4);
	
	}

	function insertPro(){
	
		$sql = 'INSERT INTO product (`pro_code` ,`pro_name` ,`pro_type_id` ,`pro_sub_type_id` ,`pro_brands_id` ,
					`pro_color_id` ,`pro_detail` ,`pro_date` ,`pro_price` ,`pro_sell` ,`pro_quantity` ,`pro_dis_id` ,`pro_sta_id` )
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);'; 
		$this->db->query($sql, array($this->ProCdoe, $this->ProName, $this->ProType, $this->ProSubType, $this->ProBrands, 
		$this->ProColor, $this->ProDetail, date('Y-m-d H:i:s'), $this->ProPrice,$this->ProSell, $this->ProQuantity,$this->ProDis, $this->ProStatus));
		//echo $this->db->last_query();
		
	}
	
	function showPro($pro_code){
	
		$sql = 'SELECT * FROM product WHERE pro_code = ?;'; 
		return	$this->db->query($sql, array($pro_code));
	
	}
	
	function getMainShowPro() {
	
		$sql = 'SELECT * FROM product 
				INNER JOIN pro_type on product.pro_type_id = pro_type.pro_type_id 
				INNER JOIN pro_image on product.pro_code = pro_image.pro_code
				INNER JOIN pro_status on product.pro_sta_id = pro_status.pro_sta_id
				WHERE product.pro_sta_id =1
				group by pro_type.pro_type_list
				ORDER BY pro_type.pro_type_list ASC ';
		return $this->db->query($sql);
	
	}
	
	function getProduct($pro_type_id){
	
		$sql = 'SELECT * FROM product INNER JOIN pro_type on product.pro_type_id = pro_type.pro_type_id WHERE product.pro_type_id=?';
		return $this->db->query($sql, array($pro_type_id));
	
	}

	//getShowDetail
	function getShowDetailPro($pro_code) {
	
		$sql = 'SELECT * FROM product INNER JOIN pro_image on product.pro_code = pro_image.pro_code 
									  INNER JOIN pro_discounts on product.pro_dis_id = pro_discounts.pro_dis_id  
				WHERE product.pro_code=?';
		return $this->db->query($sql, array($pro_code));
	
	}
	
	function ckeckPro($pro_sub_type_id){
	
		$sql = 'SELECT * FROM product 
				INNER JOIN pro_status ON product.pro_sta_id = pro_status.pro_sta_id  
				WHERE product.pro_sub_type_id=?';
				
		return $this->db->query($sql,array($pro_sub_type_id));
		
	}
	
	function getOnePro($pro_code) {
	
		$sql = 'SELECT product.pro_code,
					   product.pro_name,
						product.pro_quantity,
					   pro_type.pro_type_id,
					   pro_sub_type.pro_sub_type_id,
					   pro_brands.pro_brands_id,
					   pro_color.pro_color_id,
					   product.pro_detail,
					   pro_image.pro_picture,
					   product.pro_date,
					   product.pro_price,
					   product.pro_sell,
					   pro_discounts.pro_dis_id,
					   pro_status.pro_sta_id
				FROM product INNER JOIN pro_type on product.pro_type_id = pro_type.pro_type_id 
							 INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
							 INNER JOIN  pro_brands on product.pro_brands_id = pro_brands.pro_brands_id 
							 INNER JOIN pro_color on product.pro_color_id = pro_color.pro_color_id 
							 LEFT JOIN	pro_image on product.pro_code = pro_image.pro_code 
							 INNER JOIN pro_discounts on product.pro_dis_id = pro_discounts.pro_dis_id
							 INNER JOIN pro_status on product.pro_sta_id = pro_status.pro_sta_id 
				WHERE product.pro_code=?';
		return $this->db->query($sql, array($pro_code));
	
	}
	
	function productOne($pro_code){
	
		$sql='SELECT * FROM `product` WHERE pro_code=?';
		return $this->db->query($sql, array($pro_code));
		
	}	
	function delPro($pro_code) {
	
		$sql = 'DELETE  FROM product WHERE product.pro_code=?';
		return $this->db->query($sql, array($pro_code));
	
	}
	
	function getSubtype($pro_sub_type_id){
	
		$sql = 'SELECT pro_sub_type.pro_sub_type_id,pro_sub_type.pro_sub_type_list FROM pro_sub_type 
				WHERE pro_sub_type.pro_sub_type_id =?';
		return $this->db->query($sql,array($pro_sub_type_id)); 
		
	
	}
	
	//getShowProType
	function getShowMenuSubTypePro($pro_sub_type_id,$start_record=0,$numrow = 6){
	
		$sql = 'SELECT *
				FROM product RIGHT JOIN pro_type on product.pro_type_id = pro_type.pro_type_id 
							 INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
							 INNER JOIN  pro_brands on product.pro_brands_id = pro_brands.pro_brands_id 
							 INNER JOIN pro_color on product.pro_color_id = pro_color.pro_color_id 
							 LEFT JOIN	pro_image on product.pro_code = pro_image.pro_code 
							 INNER JOIN pro_discounts on product.pro_dis_id = pro_discounts.pro_dis_id
							 INNER JOIN pro_status on product.pro_sta_id = pro_status.pro_sta_id 
				WHERE product.pro_sub_type_id=? 
				AND product.pro_sta_id =1 
				LIMIT '.$start_record.','.$numrow.'';
		return $this->db->query($sql,array($pro_sub_type_id)); 

	}
	
	//getShowProType2
	function getShowMenuTypePro($pro_type_id,$start_record=0,$numrow = 6) {
	
		$sql = 'SELECT *
				FROM product RIGHT JOIN pro_type on product.pro_type_id = pro_type.pro_type_id 
							 INNER JOIN pro_sub_type on product.pro_sub_type_id = pro_sub_type.pro_sub_type_id 
							 INNER JOIN  pro_brands on product.pro_brands_id = pro_brands.pro_brands_id 
							 INNER JOIN pro_color on product.pro_color_id = pro_color.pro_color_id 
							 LEFT JOIN	pro_image on product.pro_code = pro_image.pro_code 
							 INNER JOIN pro_discounts on product.pro_dis_id = pro_discounts.pro_dis_id
							 INNER JOIN pro_status on product.pro_sta_id = pro_status.pro_sta_id 
				WHERE product.pro_type_id= ? 
				AND product.pro_sta_id =1 GROUP BY  product.pro_code
				LIMIT '.$start_record.','.$numrow.'';
		return $this->db->query($sql,array($pro_type_id)); 
		
	}
	
	function getSearchShow($stat_record=0,$numrow = 6){
	
		$sql = 'SELECT *
				RIGHT JOIN pro_type ON product.pro_type_id = pro_type.pro_type_id
				INNER JOIN pro_sub_type ON product.pro_sub_type_id = pro_sub_type.pro_sub_type_id
				INNER JOIN pro_brands ON product.pro_brands_id = pro_brands.pro_brands_id
				INNER JOIN pro_color ON product.pro_color_id = pro_color.pro_color_id
				LEFT JOIN pro_image ON product.pro_code = pro_image.pro_code
				INNER JOIN pro_status ON product.pro_sta_id = pro_status.pro_sta_id
				WHERE pro_type.pro_type_id = ? AND pro_sub_type.pro_sub_type_id = ? AND pro_brands.pro_brands_id = ?
				AND product.pro_color_id = ? AND product.pro_sta_id =1 LIMIT '.$stat_record.','.$numrow.'';
		return $this->db->query($sql, array($this->ProType, $this->ProSubType, $this->ProBrands, $this->ProColor)); 
	
	}

	function updatePro(){
	
		$sql = 'UPDATE product SET 
				pro_name = ?,
				pro_type_id = ?, 
				pro_sub_type_id = ?, 
				pro_brands_id = ?, 
				pro_color_id = ?, 
				pro_detail = ?,
				pro_price = ?,
				pro_sell = ?,
				pro_quantity=?,
				pro_dis_id = ?,
				pro_sta_id = ?
				WHERE pro_code = ? ';
		$this->db->query($sql, array($this->ProName, $this->ProType, $this->ProSubType, $this->ProBrands, 
		$this->ProColor, $this->ProDetail, $this->ProPrice, $this->ProSell, $this->ProQuantity, $this->ProDis, 
		$this->ProStatus, $this->ProCode));
		
	}
	
	function search($txt) {
		$sql = "SELECT * FROM product 
				INNER JOIN pro_type on product.pro_type_id = pro_type.pro_type_id 
				INNER JOIN pro_image on product.pro_code = pro_image.pro_code
				INNER JOIN pro_status on product.pro_sta_id = pro_status.pro_sta_id
				INNER JOIN pro_discounts on product.pro_dis_id = pro_discounts.pro_dis_id
				WHERE product.pro_sta_id =1 and product.pro_name like '%$txt%'";
		return $this->db->query($sql);
	}
	
	function countProNew($today) {
		$sql = "SELECT count( `pro_code` ) AS countProNew FROM `product` WHERE date( pro_date ) = ?";
		return $this->db->query($sql,array($today));  
		}
		
		function countPro() {
		$sql = "SELECT count( `pro_code` ) AS countPro FROM `product`";
		return $this->db->query($sql);  
		}
}
?>
