<?php
class M_cust_sta_mar extends Model {

public $cust_sta_mar_id;
public $cust_sta_mar_list;

function M_cust_sta_mar() {
	parent::Model();
}

function getAllStaMar(){
	$sql = 'select * from cust_sta_mar order by cust_sta_mar_list';
	return $this->db->query($sql);
}

function get_options_sta_mar($optional = 'y'){
	$qry = $this->getAllStaMar();
	if($optional=='y') $opt[''] = '----เลือก----';
	foreach($qry->result() as $row){
		$opt[$row->cust_sta_mar_id] = $row->cust_sta_mar_list;
	}
	return $opt;
} 

}
?>
