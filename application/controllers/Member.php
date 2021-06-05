<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function insert()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->input->post('name');
        $isAdmin = $this->input->post('options');
        $data = array(
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'isAdmin' => $isAdmin
        );
        $this->M_task->insert_table_member($data);
        echo "<script>window.location='" . site_url('ManageUser/index') . "';</script>";
    }

    public function delete()
    {
        $username = $this->input->get('username');
        if ($this->session->userdata('username') != $username) {
            $this->M_task->delete_table_member($username);
            echo "<script>window.location='" . site_url('ManageUser/index') . "';</script>";
        }
        else {
            echo "Dilarang menghapus akun sendiri";
        }
    }
}
