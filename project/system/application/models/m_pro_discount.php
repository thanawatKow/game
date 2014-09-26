<?php
class M_pro_discount extends Model {

public $pro_dis_id;
public $pro_dis_list;

function M_pro_discount() {
	parent::Model();
}

function getAllDiscount(){
	$sql = 'select * from pro_discounts';
	return $this->db->query($sql);
}

function get_options_discount($optional='y'){
	$qry = $this->getAllDiscount();
	if($optional == 'y') $opt[''] = '---เลือก---';
	foreach($qry->result() as $row){
		$opt[$row->pro_dis_id] = $row->pro_dis_list;
	}
	return $opt;
}
}
?>
