<?php
class M_cust_education extends Model {

public $cust_edu_id;
public $cust_edu_list;

	function M_cust_education() {
	
		parent::Model();
		
	}

	function getAllEducation(){
	
		$sql = 'select * from cust_education order by cust_edu_list';
		return $this->db->query($sql);
		//echo $this->db->last_query();
		
	}
	
	function get_options_education($optional = 'y'){
	
		$qry = $this->getAllEducation();
		if($optional=='y') $opt[''] = '----เลือก----';
		foreach($qry->result() as $row){
			$opt[$row->cust_edu_id] = $row->cust_edu_list;
		}
		return $opt;
		
	}

}
?>
