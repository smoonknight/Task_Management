<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasklist extends CI_Controller {
	public function index()
	{

        if ($this->session->userdata('username') != '') {
            $list_id = $this->input->get('list');
            $this->load->model('M_task');
            $data['TaskList'] = $this->M_task->get_data_task_list_join_table_list_where_list_id($list_id);
            $data['TableList'] = $this->M_task->get_data_table_list();
            $this->load->view('tasklist', $data);
		} else {
			redirect(base_url('Login/index'));
		}
	}
}