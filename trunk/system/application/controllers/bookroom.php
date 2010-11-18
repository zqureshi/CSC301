<?php

class Bookroom extends Controller {

	function Bookroom()
	{
		parent::Controller();	
	}
	
	function index($year=null, $month=null)
	{	
		/* Check if session is valid first */
		if($this->session->userdata('id') == FALSE)
		{
			redirect('/welcome');
		}
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