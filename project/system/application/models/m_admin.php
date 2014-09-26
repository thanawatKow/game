<?php
class M_admin extends Model {

public $admin_id;
public $admin_name;
public $admin_email;
public $admin_pass;
public $admin_level;


	function M_admin() {
	
		parent::Model();
		
	}


	function checkLoginAdmin(){
	
		$sql = 'SELECT * FROM admin WHERE admin_name = ? AND admin_pass = ?';
		return $this->db->query($sql, array($this->admin_name, $this->admin_pass));
		//echo $this->db->last_query();
		
	}
	
	function checkEmailAdmin(){
	
		$sql = 'SELECT * FROM admin WHERE admin_email = ?';
		return $this->db->query($sql, array($this->Email));
		
	}
	
	function getAllAdmin(){
	
		$sql = 'select * from admin order by admin_id ';
		return $this->db->query($sql);
		
	}

	function getOneAdmin(){
		$sql = 'SELECT * FROM admin WHERE admin_id = ?';
		return $this->db->query($sql, array($this->admin_id));
		
	}
	
	function  editAdmin(){
	
		$sql = 'UPDATE admin SET admin_name = ?, admin_email = ?, admin_sta_id=? WHERE  admin_id =?';
		return $this->db->query($sql, array($this->admin_name,$this->admin_email,$this->admin_sta_id,$this->admin_id));
		echo $this->db->last_query();
		
		
	}
	function  EditePassAdmin(){
	
		$sql = 'UPDATE admin SET admin_pass = ? WHERE  admin_id =?';
		return $this->db->query($sql, array($this->admin_pass,$this->admin_id));
		
	}
	function delAdmin($admin_id){
	
		$sql = "DELETE FROM admin WHERE admin_id=?";
		$this->db->query($sql, array($admin_id));	
	
	}
	
	function insertAdmin(){
	
		$sql = 'INSERT INTO admin (admin_name ,admin_email ,admin_pass,admin_sta_id) VALUES (?, ?, ?, ?)';
		return $this->db->query($sql, array($this->admin_name,$this->admin_email,$this->admin_pass,$this->admin_sta_id));
	
	}
	function countAdmin() {
			$sql='SELECT count(`admin_id`) AS countAdmin FROM admin';
		return $this->db->query($sql);
	}

}
?>
