<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class lead extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
		
		$this->load->model('lead_model');
     
    }
	
	public function index()
    {
		 $this->load->view("leadview", Null, NULL);
		
    }
	public function savedatafun()
	{
		
		$action=$_REQUEST["act"];
		$note=$_REQUEST["nt"];
		$this->lead_model->savedatatodb($action,$note);
	}
	public function getall_leadinfo()
	{
		$this->lead_model->getallinfofrmdb();
	}
	function edit($id=null)
	{
		//echo "hii";exit;
		$data['record']=$this->lead_model->edit($id);
		 //$this->loadViews('lead/editlead',$data);
		 $this->load->view("editlead",$data);
	}
	
}