<?php
class Project_m extends CI_Model
{
	public function insert($data_array)
	{
		//print_r($data_array);exit;
		$this->db->insert('stud_info',$data_array);
		 return true;
	}
	public function getalldata()
	{
		$this->db->select("*");
	   $this->db->from("stud_info");
	   $query = $this->db->get();        
	   return $query->result_array();
	  
	}
	public function daletedata($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('stud_info');
		return true;
	}
	public function edit($id)
	{
		 $query = $this->db->get_where('stud_info', array('id' => $id));
        if ( $query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;    
        }
	}
	public function upadte($data_array,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('stud_info', $data_array);
		 return true;
	}
	
}

		
?>