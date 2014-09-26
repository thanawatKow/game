<?php
class M_admin_status extends Model {

public $admin_sta_id;
public $admin_sta_list;

function M_admin_status() {
	parent::Model();
}

function getAllStaAdmin(){
	$sql = 'select * from admin_status';
	return $this->db->query($sql);
}

function get_options_admin_sta($optional='y'){
	$qry = $this->getAllStaAdmin();
	if($optional == 'y') $opt[''] = '---เลือก---';
	foreach($qry->result() as $row){
		$opt[$row->admin_sta_id] = $row->admin_sta_list;
	}
	return $opt;
}

}
?>
