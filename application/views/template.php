<?php
    $this->load->view('header');
    if (isset($data))
        $this->load->view($main_content, $data);
    else 
        $this->load->view($main_content);
    $this->load->view('footer');
?>
