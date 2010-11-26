<?php

class ThirdPage extends Controller {

	function ThirdPage()
	{
		parent::Controller();	

    /* Disable browser caching */
    $this->headers->disable_caching();

		/* Check if session is valid first */
    $this->authentication->validate_session();

		$this->load->model('thirdpage_model' );
		$this->load->model('rooms_model' );
	}
	
  function index($year=null, $month=null,$day=null, $room=null, $slot=null)
  {
		if(($year == null) || ($month == null)|| ($day == null)|| ($room == null)|| ($slot == null)){
			$data['year']= date("Y");
			$data['month'] = date("m");
			$data['day'] = date("d"); 
			$data['content'] = $this->thirdpage_model->generate_content($year,$month,$day,$room,$slot);
			$this->load->view('thirdPage',$data);
		}else{
			$data['year']= $year;
			$data['month'] = $month ;
			$data['day'] = $day;
			$data['content'] = $this->thirdpage_model->generate_content($year,$month,$day,$room,$slot); 
			$this->load->view('thirdPage',$data);
		}
	}
	
	function validate($year=null, $month=null,$day=null, $room=null, $slot=null){
		$year = $_POST['year'];
		$month = $_POST['month'];
		$day = $_POST['day'];
		$room = $_POST['room'];
		$slot = $_POST['slot'];
		$notes = $_POST['notes'];
		$course = $_POST['course'];
		$user = $_POST['user'];
		// After some validation procedures add the date into the database.
		//
		// Add data to database.
		$this->rooms_model->add_to_db($year,$month,$day,$room,$slot,$notes,$course,$user);
	
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
