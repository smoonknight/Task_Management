<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('username') != ''){
			$this->load->model('M_task');
			$data['TaskList'] = $this->M_task->get_data_task_list_join_table_list_where_do();
			$data['TableList'] = $this->M_task->get_data_table_list();
			$this->load->view('index', $data);
		}
		else{
			redirect(base_url('Login/index'));
		}
	}
}
