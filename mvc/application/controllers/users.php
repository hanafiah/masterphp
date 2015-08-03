<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @copyright Copyright (c) 2015 Kreydle Sdn Bhd
 * Description of account
 *
 * @author Kreydle Sdn Bhd <help@kreydle.com>
 * @version 4.0
 * @since Aug 3, 2015
 */
class Users extends CI_Controller {

    public $view_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->view_data['users'] = $this->m_users->get_users();
        $this->load->view('v_index', $this->view_data);
    }

    public function new_user()
    {
        if (isset($_POST['btnAdd'])) {
            $this->m_users->insert();
            redirect('users');
        }
        $this->load->view('v_new_user', $this->view_data);
    }

    public function edit($id=FALSE)
    {
        if (isset($_POST['btnEdit'])) {
            $this->m_users->update();
            redirect('users');
        }
        
        $this->view_data['user'] = $this->m_users->get_user($id);
        $this->load->view('v_edit_user', $this->view_data);
    }
    
    public function delete($id = FALSE)
    {
        $this->m_users->delete($id);
        redirect('users');
    }

}
