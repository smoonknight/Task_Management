<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageList extends CI_Controller {
	public function index()
	{
		if ($this->session->userdata('admin') == 'yes') {
			if ($this->session->userdata('username') != '') {
				$this->load->model('M_task');
				$data['TableList'] = $this->M_task->get_data_table_list();
				$this->load->view('manage_list', $data);
			} else {
				redirect(base_url('Login/index'));
			}
		} else {
			redirect(base_url('Home/index'));
		}
	}
	
}