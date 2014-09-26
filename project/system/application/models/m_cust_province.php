<?php
class M_cust_province extends Model {

public $cust_prv_id;
public $cust_prv_list;

function M_cust_province() {
	parent::Model();
}

function getAllProvince(){
	$sql = 'select * from cust_province order by cust_prv_list';
	return $this->db->query($sql);
}

function get_options_province($optional = 'y'){
	$qry = $this->getAllProvince();
	if($optional=='y') $opt[''] = '----เลือก----';
	foreach($qry->result() as $row){
		$opt[$row->cust_prv_id] = $row->cust_prv_list;
	}
	return $opt;
}
}
?>
