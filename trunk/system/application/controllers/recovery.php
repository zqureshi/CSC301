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

  function reset_password($hash)
  {
    if($this->Recovery_hash->has_hash($hash)){
      $id = $this->Recovery_hash->get_user($hash);
      $this->Booking_user->update_pass($id, 'hello');
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

    $this->Recovery_hash->add_hash($user->id);
    echo "Activation Email Sent";

    /*
    $this->email->from('noreply@cdf.toronto.edu');
    $this->email->to('zeeshan.quireshi@gmail.com');
    $this->email->subject('Testing Recovery Email');
    $this->email->message('This Should Work');

    $this->email->send();
    echo $this->email->print_debugger();
     */
  }
	
	function index()
	{
		$this->load->view('recovery_get_email');
	}
}

/* End of file recovery.php */
/* Location: ./system/application/controllers/recovery.php */
