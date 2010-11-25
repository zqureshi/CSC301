<?php

class Bookroom extends Controller {

	function Bookroom()
	{
		parent::Controller();	

		/* Check if session is valid first */
		if($this->session->userdata('id') == FALSE)
		{
			redirect(index_page());
		}
		$this->output->set_header("Expires: Mon, 20 Dec 1998 01:00:00 GMT");	
		$this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");	
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");	
		$this->output->set_header("Pragma: no-cache");	
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
