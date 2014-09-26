<?php
class M_cust_question extends Model {

public $cust_quest_id;
public $cust_quest_list;

function M_cust_question() {
	parent::Model();
}

function getAllQuestion(){
	$sql = 'select * from  cust_question';
	return $this->db->query($sql);
}

function get_options_question($optional = 'y'){
	$qry = $this->getAllQuestion();
	if($optional=='y') $opt[''] = '----เลือก----';
	foreach($qry->result() as $row){
		$opt[$row->cust_quest_id] = $row->cust_quest_list;
	}
	return $opt;
}
}
?>
