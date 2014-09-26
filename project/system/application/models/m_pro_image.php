<?php
class M_pro_image extends Model {

public $admin_id;
public $admin_name;
public $admin_email;
public $admin_pass;
public $admin_level;


	function M_pro_image() {
	
		parent::Model();
		
	}
	
	function insertPicPro(){
	
		$sql = 'INSERT INTO pro_image (pro_code,pro_picture) 
				VALUES (?,?);'; 
				$this->db->query($sql, array($this->ProCdoe, $this->ProPicture ));
		//echo $this->db->last_query();
	}
	
	function showPicPro($pro_picture){
	
		$sql = 'SELECT * FROM pro_image WHERE pro_picture = ?'; 
		return $this->db->query($sql, array($pro_picture));
		//echo $this->db->last_query();
	
	}
	
	function delPicPro($pro_picture){
	
		$sql = 'DELETE FROM pro_image WHERE pro_picture = ?;'; 
				$this->db->query($sql, array($pro_picture));
		//echo $this->db->last_query();
	}
	
}
?>
