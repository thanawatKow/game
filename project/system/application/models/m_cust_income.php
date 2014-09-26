<?php
class M_cust_income extends Model {

public $cust_inc_id;
public $cust_inc_list;

	function M_cust_income() {
		parent::Model();
	}
	
	function getAllIncome(){
	
		$sql = 'select * from cust_income order by cust_inc_list ';
		return $this->db->query($sql);
		//echo $this->db->last_query();
		
	}

function get_options_income($optional = 'y'){
	$qry = $this->getAllIncome();
	if($optional=='y') $opt[''] = '----เลือก----';
	foreach($qry->result() as $row){
		$opt[$row->cust_inc_id] = $row->cust_inc_list;
	}
	return $opt;
}

}
?>
