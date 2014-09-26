<?php
class M_cust_status extends Model {

public $cust_sta_id;
public $cust_sta_list;

function M_cust_status() {
	parent::Model();
}

function getAllCustStatus(){
	$sql = 'select * from cust_status ';
	return $this->db->query($sql);
}

function get_options_status($optional = 'y'){
	$qry = $this->getAllCustStatus();
	if($optional=='y') $opt[''] = '----เลือก----';
	foreach($qry->result() as $row){
		$opt[$row->cust_sta_id] = $row->cust_sta_list;
	}
	return $opt;
}
}
?>
