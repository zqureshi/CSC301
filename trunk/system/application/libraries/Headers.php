<?php

class Headers
{
  function disable_caching()
  {
    $CI =& get_instance();

    $CI->output->set_header("Expires: Sat, 01 Jan 2000 01:00:00 GMT");	
    $CI->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");	
    $CI->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");	
    $CI->output->set_header("Pragma: no-cache");	
  }
}

/* End of file Headers.php */
