<?php
class M_forum extends Model {




	function M_forum() {
		parent::Model();
	}


	function showAll(){
		$sql = 'SELECT * FROM forum';
		return $this->db->query($sql);
	}
	function show(){
		$sql = 'SELECT * FROM forum WHERE forum_answer=""';
		return $this->db->query($sql);
	}
	
	function showAnswerforum(){
		$sql = 'SELECT * FROM forum WHERE forum_answer<>""';
		return $this->db->query($sql);
	}
	
	function getOne($forum_id){
		$sql = 'SELECT * FROM forum INNER JOIN customer ON customer.cust_id = forum.cust_id WHERE forum_id= ?';
		return $this->db->query($sql, array($forum_id));
	}
	
	function insert(){
		$sql = 'INSERT INTO forum (`forum_title`, `forum_description`, `cust_id`, `forum_add_date`) VALUES (?, ?, ?, ?);'; 
		$this->db->query($sql, array($this->title, $this->description, $this->cust_id, date('Y-m-d H:i:s')));
	}
	
	function updateAnswer(){
	$sql = 'UPDATE forum SET forum_answer = ? WHERE forum_id = ?;'; 
	$this->db->query($sql, array($this->answer, $this->forum_id));
	}
	
	function countForumNew($today) {
			$sql='SELECT count( `forum_id` ) AS countForumNew FROM `forum` WHERE date( `forum_add_date` ) = ?';
		return $this->db->query($sql, array($today));
	}
	function countForum() {
			$sql='SELECT count( `forum_id` ) AS countForum FROM `forum`';
		return $this->db->query($sql);
	}
}
?>
