<?php
class M_cust_job extends Model {

public $cust_job_id;
public $cust_job_list;

function M_cust_job() {
	parent::Model();
}

function getAllJob(){
	$sql = 'select * from cust_job order by cust_job_list';
	return $this->db->query($sql);
	//echo $this->db->last_query();
}

function get_options_job($optional = 'y'){
	$qry = $this->getAllJob();
	if($optional=='y') $opt[''] = '----เลือก----';
	foreach($qry->result() as $row){
		$opt[$row->cust_job_id] = $row->cust_job_list;
	}
	return $opt;
}
}
?>
