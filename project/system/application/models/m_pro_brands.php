<?php
class M_pro_brands extends Model {

public $pro_brands_id;
public $pro_brands_list;

function M_pro_brands() {
	parent::Model();
}

function getAllProBrands(){
	$sql = 'select * from pro_brands';
	return $this->db->query($sql);
}

function get_options_pro_brands($optional='y'){
	$qry = $this->getAllProBrands();
	if($optional == 'y') $opt[''] = '---เลือก---';
	foreach($qry->result() as $row){
		$opt[$row->pro_brands_id] = $row->pro_brands_list;
	}
	return $opt;
}

}
?>
