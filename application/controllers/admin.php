<?php

/**
 * Admin Controller / Controls Admin Related stuff
 **/
class Admin extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();

        if (!($this->session->userdata('logged_in') && $this->user_model->is_admin($this->session->userdata('email'))))
            redirect('user');
    }

    function index()
    {
        $data['main_content'] = 'admin_panel_view';
        $this->load->view('template', $data);
    }

    function add_category()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Site Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() !== false)
            {
                $data = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description')
                );
                $this->site_model->add_category($data);
                redirect('site/shuffle_board');
            }
        $data['main_content'] = 'category_edit_view';
        $this->load->view('template', $data);
    }
    function view_categories()
    {
    }

    function edit_sites()
    {
        $data['data']['sites'] = $this->site_model->get_inactive_records();
        $data['main_content'] = 'edit_sites_view';

        $this->load->view('template', $data);
    }
    function make_site_active()
    {
        $data = array(
            'state' => 'active'
        );
        $this->site_model->update_record($data, $this->uri->segment(3));    
        redirect('admin/edit_sites');
    }
    function delete_site()
    {
        $this->site_model->delete_row($this->uri->segment(3));
        redirect('admin/edit_sites');
    }
}

?>
