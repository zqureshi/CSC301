<?php

class Rooms extends Controller {

	function Rooms()
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
	
	function index($year=null, $month=null, $day=null)
	{
		$this->load->model('rooms_model' );
		
			// FIX HERE.
		if(($year == null) || ($month == null) || ($day == null)){
			$data['year']= date("Y");
			$data['month'] = date("m");
			$data['day'] = date("d");
			$data['schedule'] = $this->rooms_model->generate_schedule($year,$month,$day);
			$this->load->view('rooms',$data);
		}else{
			$data['year']= $year;
			$data['month'] = $month ;
			$data['day'] = $day ;
			$data['schedule'] = $this->rooms_model->generate_schedule($year,$month,$day);
			$this->load->view('rooms',$data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
