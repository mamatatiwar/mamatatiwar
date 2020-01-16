<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->Model('Project_m');
		$this->load->helper('url');
		 
		$this->load->library('javascript');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
	}

	
	public function index()
	{
		$data['alldata']=$this->Project_m->getalldata();
		//print_r($data['alldata']);exit;
		$data['data']=null;
		$this->load->view('project',$data);
	}
	public function insert()
	{
		
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$dob=$this->input->post('dob');
		$age=$this->input->post('age');
		$mobile=$this->input->post('mobile');
		$gender=$this->input->post('gender');
		$sub=$this->input->post('sub');
		$profile=$_FILES['file'];
		//print_r($profile);exit;
		$profname=$profile['name'];
		$proftype=$profile['type'];
		$proftmp=$profile['tmp_name'];
		
		$bday = new DateTime($dob); // Your date of birth
		$today = new Datetime(date('m.d.y'));
		$diff = $today->diff($bday);
		$age=$diff->y;
		
		if($proftype =="image/jpeg" || $proftype =="image/png" ||$proftype =="image/jpg")
		{
			$path="uploads/$profname";
			move_uploaded_file($proftmp,$path);
		}
		else
		{
			echo "select jpg,jpeg,png type image";exit;
		}
		$subs="";  
		foreach($sub as $sub1)  
		   {  
			  $subs .= $sub1.",";  
		   } 
		$data_array=array('name'=>$name,'email'=>$email,'age'=>$age,'mobile'=>$mobile,'gender'=>$gender,'sub'=>$subs,'profile'=>$path);
		$result=$this->Project_m->insert($data_array);
		if($result== true)
		 {
			 $this->session->set_flashdata('success', ' successfully added record');

		 }
		 else{
			 $this->session->set_flashdata('error', ' failed to add');
			 
		 }
		redirect('project');
	}
	public function deletedata($id=null)
	{
		//echo $id;exit;
		$result=$this->Project_m->daletedata($id);
		 if($result== true)
		 {
			 $this->session->set_flashdata('success', ' successfully deleted');

		 }
		 else{
			 $this->session->set_flashdata('error', ' failed to delete');
			 
		 }
		redirect('project');
		
	}
	public function edit($id=null)
	{
		 $data['record'] = $this->Project_m->edit($id);
		
		 $this->load->view('edit',$data);
	}
	public function update($id=null)
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$gender=$this->input->post('gender');
		$sub=$this->input->post('sub');
		$subs="";  
		foreach($sub as $sub1)  
		   {  
			  $subs .= $sub1.",";  
		   } 
		$data_array=array('name'=>$name,'email'=>$email,'mobile'=>$mobile,'gender'=>$gender,'sub'=>$subs);
		$result=$this->Project_m->upadte($data_array,$id);
		 if($result== true)
		 {
			 $this->session->set_flashdata('success', ' successfully updated');

		 }
		 else{
			 $this->session->set_flashdata('error', ' failed to update');
			 
		 }
		redirect('project');
	}
	public function exportCSV(){ 
   // file name 
	   $filename = 'users_'.date('Ymd').'.csv'; 
	   header("Content-Description: File Transfer"); 
	   header("Content-Disposition: attachment; filename=$filename"); 
	   header("Content-Type: application/csv; ");
	   
	   // get data 
	   $usersData = $this->Project_m->getalldata();
	   //print_r($usersData);exit;

	   // file creation 
	   $file = fopen('php://output', 'w');
	 
	   $header = array("id","Name","email","mobile","gender","sub","profile","age","dob"); 
	   fputcsv($file, $header);
	   foreach ($usersData as $key=>$line){ 
		 fputcsv($file,$line); 
	   }
	   fclose($file); 
	   exit; 
  }
}
?>