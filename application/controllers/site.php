<?php

/**
 * Site Controller / Controls Sites & Shuffles Related stuff
 **/
class Site extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in'))
            redirect('user');
    }

    function index()
    {
        $data['main_content'] = 'site_view';
        $this->load->view('template', $data);
    }

    function add_site()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Site Name', 'required');
        $this->form_validation->set_rules('url', 'Site Url', 'required');
        $this->form_validation->set_rules('description','Description', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('domain', 'Domain', 'required');

        if ($this->form_validation->run() !== false)
        {
            $data = array(
               'name' => $this->input->post('name'), 
               'url' => $this->input->post('url'), 
               'description' => $this->input->post('description'), 
               'category' => $this->input->post('category'), 
               'domain' => $this->input->post('domain'), 
               'state' => 'inactive' 
            );
            $this->site_model->add_record($data);
        }

        $data['data']['doms'] = $this->site_model->get_domains();
        $data['data']['cats'] = $this->site_model->get_categories();
        $data['main_content'] = 'add_site_view';
        $this->load->view('template', $data);
    }

    function shuffle_board()
    {
        $data['data']['domains'] = $this->site_model->get_domains();
        $data['data']['categories'] = $this->site_model->get_categories();
        $data['main_content'] = 'shuffle_board_view';
        $this->load->view('template', $data);
    }
    function shuffle()
    {
        $data['doms'] = $this->input->post('domain');
        $data['cats'] = $this->input->post('category');
        $data['site'] = $this->site_model->get_random_site($data);
        $data['domains'] = $this->site_model->get_domains();
        $data['categories'] = $this->site_model->get_categories();
        $data['user_ent'] = $this->site_model->user_likes($this->session->userdata('email'), $data['site']->id, 'fun');
        $data['user_edu'] =  $this->site_model->user_likes($this->session->userdata('email'), $data['site']->id, 'edu');
        $this->load->view('shuffle_view',$data);
    }

    function user_thinks()
    {
        $site_id = $this->uri->segment(3);
        $type = $this->uri->segment(4);

        if (!$this->site_model->user_likes($this->session->userdata('email'), $site_id, $type))
            if ($this->site_model->is_active($site_id))
                if($type == 'edu' || $type == 'fun')
                    $this->site_model->user_thinks($this->session->userdata('email'), $site_id, $type); 
        
    }
}

?>
