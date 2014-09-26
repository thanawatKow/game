<?php
class M_pro_sub_type extends Model {

public $pro_sub_id;
public $pro_sub_list;

	function M_pro_sub_type() {
		parent::Model();
	}
	
	function showGetOneProSubType($pro_sub_type_id){
	
		$sql = 'SELECT * FROM `pro_sub_type` WHERE pro_sub_type_id=?';
		return $this->db->query($sql,array($pro_sub_type_id));
		
	}
	
	function showListProSubType($pro_sub_type_id){
	
		$sql = 'SELECT * FROM pro_sub_type inner join pro_type on pro_sub_type.pro_type_id = pro_type.pro_type_id
				WHERE pro_sub_type_id=?';
		return $this->db->query($sql,array($pro_sub_type_id));
	
	}
	
	function showTypeProSubType($pro_type_id){
	
		$sql = 'SELECT * FROM `pro_sub_type` WHERE pro_type_id=?';
		return $this->db->query($sql, array($pro_type_id));
		
	}
	
	
	
	function InsertProSubType() {
	
		$sql = 'INSERT INTO pro_sub_type (pro_sta_id, pro_type_id, pro_sub_type_list) VALUES (?, ?, ?)'; 
		return $this->db->query($sql, array($this->pro_status_id, $this->pro_type_id, $this->pro_sub_type_list)); 
	

	}
	
	function UpdateProSubType(){
	
		$sql = 'UPDATE pro_sub_type SET pro_sub_type_list =?,  pro_sta_id = ?, pro_type_id = ? 
				WHERE  pro_sub_type_id = ?';
		return $this->db->query($sql, array($this->pro_sub_type_list, $this->pro_status_id, 
		$this->pro_type_id, $this->pro_sub_type_id)); 
		
	}
	
	function delProSubType($pro_sub_type_id){
	
		$sql = "DELETE FROM pro_sub_type WHERE pro_sub_type_id=?";
		$this->db->query($sql, array($pro_sub_type_id));	
		
	}
	
	function CheckNumProType($pro_type_id){
	
		$sql = 'SELECT pro_sub_type.pro_sub_type_id, pro_sub_type.pro_sub_type_list, 
				count( product.pro_sub_type_id ) AS num_type, pro_sub_type.pro_sta_id FROM pro_sub_type
				LEFT JOIN product ON pro_sub_type.pro_sub_type_id = product.pro_sub_type_id
				WHERE pro_sub_type.pro_type_id =?
				GROUP BY pro_sub_type.pro_sub_type_list 
				ORDER BY `pro_sub_type_id` ASC';
		return $this->db->query($sql,array($pro_type_id));
		
	}
	
	function getAllProSubType(){
		$sql = 'SELECT * 
				FROM pro_sub_type
				ORDER BY pro_sub_type_id';
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function get_options_pro_sub_type($optional = 'y'){
		$qry = $this->getAllProSubType();
		if($optional=='y') $opt[''] = '----เลือก----';
		foreach($qry->result() as $row){
			$opt[$row->pro_sub_type_id] = $row->pro_sub_type_list;
		}
		return $opt;
	}
}
?>
