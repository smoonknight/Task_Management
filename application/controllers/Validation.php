
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validation extends CI_Controller
{
    public function login_validation()
    {
        $this->load->model('M_task');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->M_task->can_login($username, $password)) {
                $admin = $this->M_task->get_data_table_member_login($username);
                $session_data = array(
                    'username' => $username,
                    'admin' => $admin[0]['isAdmin']
                );
                $this->session->set_userdata($session_data);
                redirect(base_url('Home/index'));
            }
            else {
                $this->session->set_flashdata('error', "invalid username or password");
                redirect(base_url('Login/index'));
            }
        } 
    }
    public function logout_validation(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('admin');
        redirect(base_url('Login/index'));
    }
}
