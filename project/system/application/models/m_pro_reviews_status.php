<?php
class M_pro_reviews_status extends Model {

public $pro_reviews_sta_id;
public $pro_reviews_sta_list;

	function M_reviews_status() {
	
		parent::Model();
		
	}
	
	function getAllProReviewsStatus(){
		$sql = 'select * from pro_reviews_status';
		return $this->db->query($sql);
	}

	function get_options_pro_reviews_sta($optional='y'){
	
		$qry = $this->getAllProReviewsStatus();
		if($optional == 'y') $opt[''] = '---เลือก---';
		foreach($qry->result() as $row){
			$opt[$row->pro_reviews_sta_id] = $row->pro_reviews_sta_list;
		}
		return $opt;
}
}
?>
