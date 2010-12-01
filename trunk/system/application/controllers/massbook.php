<?php

class Massbook extends Controller {

	var $data = '';
		
	function Massbook()
	{
		parent::Controller();	
    		/* Disable browser caching */
		$this->headers->disable_caching();

		/* Check if session is valid first */
		$this->authentication->validate_session();

		/* Check if user accessing is an administrator */
		$this->authentication->validate_admin();

		$this->load->model('massbook_model' );	
		$this->load->model('rooms_model' );	
		$this->load->helper('url');

	        $this->load->model('side_model');
		$array = $this->side_model->current_booking();
                $this->load->view('bar', $array);		
	}
	
	function index($errNo=null){	
		$data['content'] = $this->massbook_model->generate_content($errNo);
		$this->load->view('massbook',$data);
		
	}
	
	function validate (){
		$user = $this->session->userdata('id');
		$start_date = $_POST["start_date"];
		$end_date = $_POST["end_date"];
		$course = $_POST["course_name"];
		$notes = $_POST["notes"];
		$days =  $_POST["days"];
		$roomname = $_POST["room"];
		$slotname= $_POST["slot"];	
		
		if	(isset($_POST["override"])){
			$override =  1;	
		}else{
			$override = 0;
		}		
		
		// Check if there is a empty field. If yes redirect the user back to forms.
		if (isset($slotname) && isset($roomname) && isset($days) && isset($course) && isset($end_date) && isset($start_date)) {
			if($this->rooms_model->validate_date($start_date) && $this->rooms_model->validate_date($end_date)){
				$this->rooms_model->massbook($start_date,$end_date,$course,$notes,$days,$roomname,$slotname,$override,$user);
			}else{
				// errNo 2 means there are errors in the date format.
				$errNo = 2 ;
				redirect("/massbook/index/$errNo","location");
			}
		
		}else{
			// errNo 1 means empty field.
			$errNo = 1 ;
			redirect("/massbook/index/$errNo","location");
		}

		redirect("/bookroom","location");
	}	

	function test (){
		echo strtotime("2010-12-35");
	}		
}