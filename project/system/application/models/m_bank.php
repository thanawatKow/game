<?php
class M_bank extends Model {
	

	function M_bank() {
	
		parent::Model();
		
	}
	
	function getAllBank(){
		
			$sql = 'select * from bank order by bank_name';
			return $this->db->query($sql);
			//echo $this->db->last_query();
	}
	
	function get_options_bank($optional = 'y'){
	
			$qry = $this->getAllBank();
			
			if($optional=='y') $opt[''] = '----เลือก----';
			
			foreach($qry->result() as $row){
			
				$opt[$row->bank_id] = $row->bank_name;
				
			}
			
		return $opt;
		
	}

}
?>
