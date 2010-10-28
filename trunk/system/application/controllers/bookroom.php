<?php

class Bookroom extends Controller {

	function Bookroom()
	{
		parent::Controller();	
	}
	
	function index($year=null, $month=null)
	{
		if(($year == null) || ($month == null)){
			$data['year']= date("Y");
			$data['month'] = date("m"); ;
			$this->load->view('bookroom',$data);
		}else{
			$data['year']= $year;
			$data['month'] = $month ;
			$this->load->view('bookroom',$data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */