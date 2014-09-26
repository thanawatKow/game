<?php
class M_pro_status extends Model {

public $pro_status_id;
public $pro_status_list;

function M_pro_status() {
	parent::Model();
}

function getAllProStatus(){
	$sql = 'select * from pro_status';
	return $this->db->query($sql);
}

function get_options_pro_status($optional='y'){
	$qry = $this->getAllProStatus();
	if($optional == 'y') $opt[''] = '---เลือก---';
	foreach($qry->result() as $row){
		$opt[$row->pro_sta_id] = $row->pro_sta_list;
	}
	return $opt;
}
}
?>
