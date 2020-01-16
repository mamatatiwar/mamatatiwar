<?php

class lead_model extends CI_Model
{
	public function savedatatodb($action,$note)
	{
		echo $this->db->query("insert into lead_tbl(action,note,status) values ('$action','$note','1')");
	}
	public function getallinfofrmdb()
	{
		$this->load->database();
		$query=$this->db->query("select *from lead_tbl");
		$arr=[];
		foreach($query->result() as $row)
			{
				array_push($arr,$row);
			}
			echo json_encode($arr);
		
	}
	function edit($id)
	{
		$query="select *from lead_tbl where id=$id";
		$result = $this->db->query($query);
        return $result->row_array();
	}
	
}
?>