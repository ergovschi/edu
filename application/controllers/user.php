<?php

/**
 * User Controller / Controls Users Related stuff
 **/
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function index()
    {
        if ($this->session->userdata('logged_in'))
            redirect('site');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_address', 'Email Address', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

        if ( $this->form_validation->run() !== false ) {
            // then validation passed. Get from db
            $res = $this
                ->user_model
                ->verify_user(
                    $this->input->post('email_address'), 
                    $this->input->post('password')
                );

            if ( $res !== false ) {
                $this->session->set_userdata('email', $this->input->post('email_address'));
                $this->session->set_userdata('logged_in', TRUE);
                redirect('site');
            }

        }

        $data['main_content'] = 'login_view';
        $this->load->view('template', $data);
    }

    function register()
    {
        if ($this->session->userdata('logged_in'))
            redirect('site');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_address', 'Email Address', 'valid_email|required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('age', 'BirthYear', 'required|is_natural|lower_than[2008]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        
        if ($this->form_validation->run() !== false)
        { //Insert data into database
            $data = array(
                'email' => $this->input->post('email_address'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'password' => sha1($this->input->post('password')),
                'location' => $this->input->post('location'),
                'age' => $this->input->post('age'),
                'interests' => implode(',', $this->input->post('domains')),
                'user_type' => 0
            );
            $this->user_model->register_user($data); 
            redirect('user');
        }
        $data['data']['domains'] = $this->site_model->get_domains();

        $data['main_content'] = 'register_view';
        $this->load->view('template', $data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('user');
    }
}

?>
