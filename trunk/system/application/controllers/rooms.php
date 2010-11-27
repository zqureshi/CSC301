<?php

class Rooms extends Controller {

	function Rooms()
	{
		parent::Controller();	

		/* Disable browser caching */
    		$this->headers->disable_caching();

		/* Check if session is valid first */
		$this->authentication->validate_session();
	        $this->load->model('side_model');
		$array = $this->side_model->current_booking();
                $this->load->view('bar', $array);
		
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
