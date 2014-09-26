<?php
class M_pro_color extends Model {

public $pro_color_id;
public $pro_color_list;

function M_pro_color() {
	parent::Model();
}

function getAllproColor(){
	$sql = 'select * from pro_color';
	return $this->db->query($sql);
}

function get_options_pro_color($optional='y'){
	$qry = $this->getAllproColor();
	if($optional == 'y') $opt[''] = '---เลือก---';
	foreach($qry->result() as $row){
		$opt[$row->pro_color_id] = $row->pro_color_list;
	}
	return $opt;
}

}
?>
