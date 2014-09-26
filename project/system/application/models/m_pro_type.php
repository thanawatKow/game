<?php
class M_pro_type extends Model {

public $pro_type_id;
public $pro_type_list;

	function M_pro_type() {
		parent::Model();
	}
	
	function showProType() {
	
			$sql = 'SELECT * FROM pro_type';
			return $this->db->query($sql);
	}
	
	function showNumProType(){
		$sql = 'SELECT  pro_type.pro_type_id, pro_type.pro_type_list, count( pro_sub_type.pro_sub_type_id ) AS num_type, 
					pro_type.pro_sta_id 
					FROM pro_type LEFT JOIN pro_sub_type ON pro_type.pro_type_id = pro_sub_type.pro_type_id
					GROUP BY pro_type.pro_type_id';
		return $this->db->query($sql);
		//echo $this->db->last_query();
	}
	
	function showGetOneProType($pro_type_id) {
	
		$sql = 'SELECT * FROM pro_type LEFT JOIN  pro_status on pro_status.pro_sta_id = pro_type.pro_sta_id WHERE pro_type_id=?';
		return $this->db->query($sql,array($pro_type_id));
		
	}
	
	function showSubAndProType() {
	
		$sql = 'SELECT * FROM pro_type LEFT JOIN pro_sub_type on pro_sub_type.pro_type_id = pro_type.pro_type_id';
		return $this->db->query($sql);
		
	}
	
	function delProType($pro_type_id){
		$sql = "DELETE FROM pro_type WHERE pro_type_id=?";
		$this->db->query($sql, array($pro_type_id));	
	}
	
	function InsertProType() {
	
		$sql = 'INSERT INTO pro_type (pro_type_id, pro_type_list, pro_sta_id) VALUES (NULL, ?, ?)'; 
		return $this->db->query($sql, array($this->pro_type_list1, $this->pro_status_id)); 
		
	}
	
	function UpdateProType() {
	
		$sql = 'UPDATE pro_type SET pro_type_list =?,  pro_sta_id = ? WHERE  pro_type_id = ?';
		return $this->db->query($sql, array($this->pro_type_list1, $this->pro_status_id, $this->pro_type_id));
		 
	}
	
	function getAllProType() {
	
		$sql = 'select * from pro_type where 1=1 order by pro_type_id';
		return $this->db->query($sql);
		
	}
	
	function get_options_pro_type($optional='y') {
	
		$qry = $this->getAllProType();
			if($optional == 'y') $opt[''] = '---เลือก---';
				foreach($qry->result() as $row){
					$opt[$row->pro_type_id] = $row->pro_type_list;
				}
		return $opt;
	}
	
}
?>
