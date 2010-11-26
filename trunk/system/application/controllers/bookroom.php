<?php

class Bookroom extends Controller {

	function Bookroom()
	{
		parent::Controller();	

    /* Disable browser caching */
    $this->headers->disable_caching();

		/* Check if session is valid first */
    $this->authentication->validate_session();
	}
	
	function index($year=null, $month=null)
	{	
		$this->load->model('bookroom_model' );		
		
		if(($year == null) || ($month == null)){
			$data['year']= date("Y");
			$data['month'] = date("m"); 
			$data['calendar'] = $this->bookroom_model->generate_calendar($data['year'],$data['month']);
			$this->load->view('bookroom',$data);
		}else{
			$data['year']= $year;
			$data['month'] = $month ;
			$data['calendar'] = $this->bookroom_model->generate_calendar($data['year'],$data['month']);
			$this->load->view('bookroom',$data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
