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
}

/* End of file Headers.php */
