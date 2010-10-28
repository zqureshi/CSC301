<?php

class Recovery extends Controller {

	function Recovery()
	{
		parent::Controller();	

    /* Load Email library class */
    $this->load->library('email');

    /* Load required models */
    $this->load->model('Booking_user');
    $this->load->model('Recovery_hash');

	}

  function start_password_reset($hash = NULL){
    if($hash != NULL){
      $this->load->view('reset_pass_form', array('hash' => $hash));
    } else {
      echo 'Error! No Hash Provided';
    }
  }

  function reset_password($hash = NULL)
  {
    if($hash != NULL || $this->Recovery_hash->has_hash($hash)){
      $id = $this->Recovery_hash->get_user($hash);
      $this->Booking_user->update_pass($id, $this->input->post('password'));
      $this->Recovery_hash->remove_hash($hash);
      echo 'Password Reset';
    } else {
      echo 'Error! Hash  doesn\'t exist';
    }
  }

  function send_mail()
  {
    $result = $this->Booking_user->get_user(
      'email',
      xss_clean($this->input->post('email'))
    );

    if(empty($result)){
      echo 'User Not Found';
      return;
    }

    $user = $result[0];

    $hash = $this->Recovery_hash->add_hash($user->id);
    echo "Recovery Email Sent";

    $this->email->from('noreply@aafjj9f2.yahoo.joyent.us', 'Password Recovery');
    $this->email->to($user->email);
    $this->email->subject('LabBooking Password Recovery');
    $this->email->message('Open link to reset password: '.site_url("recovery/start_password_reset/{$hash}"));

    $this->email->send();
    /* Email Debug
     * echo $this->email->print_debugger();
     */
  }
	
	function index()
	{
		$this->load->view('recovery_get_email');
	}
}

/* End of file recovery.php */
/* Location: ./system/application/controllers/recovery.php */
