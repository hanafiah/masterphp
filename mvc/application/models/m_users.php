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
class M_users extends CI_Model {

    public $name;
    public $age;
    public $email;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user($id = FALSE)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function insert()
    {
        $this->name = $this->input->post('name'); // similar to $_POST['name']; 
        $this->age = $this->input->post('age');
        $this->email = $this->input->post('email');

        $this->db->insert('users', $this);
    }

    public function update()
    {

        $this->name = $this->input->post('name'); // similar to $_POST['name']; 
        $this->age = $this->input->post('age');
        $this->email = $this->input->post('email');

        $this->db->update('users', $this, array('id' => $this->input->post('id')));
    }

    public function delete($id = FALSE)
    {
        $this->db->delete('users', array('id' => $id));
    }

}
