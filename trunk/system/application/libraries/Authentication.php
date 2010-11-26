<?php

class Authentication
{
  function validate_session()
  {
    $CI =& get_instance();

    if($CI->session->userdata('id') == FALSE)
    {
      redirect(index_page());
    }
  }

  function validate_admin()
  {
    $CI =& get_instance();

    if($CI->Booking_user->is_admin($CI->session->userdata('id')) == FALSE)
    {
			redirect('/bookroom');
    }
  }
}

/* End of file Headers.php */
