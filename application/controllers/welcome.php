<?php

/**
 * Site Controller / Controls Sites & Shuffles Related stuff
 **/
class Welcome extends CI_Controller
{
  

    function index()
    {
        $data['main_content'] = 'welcome_message';
        $this->load->view('template', $data);    
    }
}
?>
