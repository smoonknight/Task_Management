<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManageUser extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('admin') == 'yes') {
            if ($this->session->userdata('username') != '') {
                $this->load->model('M_task');
                $data['TableMember'] = $this->M_task->get_data_table_member();
                $data['TableList'] = $this->M_task->get_data_table_list();
                $this->load->view('manage_user', $data);
            } else {
                redirect(base_url('Login/index'));
            }
        } else {
            redirect(base_url('Home/index'));
        }
    }
}
