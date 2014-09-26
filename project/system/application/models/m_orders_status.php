<?php
class M_orders_status extends Model {

public $orders_sta_id;
public $orders_sta_list;


	function M_orders_status() {
	
		parent::Model();
		
	}
	
	function ShowOrdersStatus(){
	
			$sql = 'SELECT * FROM `orders_status`';
			return $this->db->query($sql);
			
	}
	
	function getAllStatus(){
	
		$sql = 'select * from orders_status order by orders_sta_list ';
		return $this->db->query($sql);
		
	}
	
	function get_options_status($optional = 'y'){
	
		$qry = $this->getAllStatus();
		
		if($optional=='y') $opt[''] = '----เลือก----';
		foreach($qry->result() as $row){
			$opt[$row->orders_sta_id] = $row->orders_sta_list;
		}
		
		return $opt;
		
	}
}
?>
