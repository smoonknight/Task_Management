<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Description extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if ($this->session->userdata('username') != '') {
			$task_id = $this->input->get('task_id');
			$data['TaskList'] = $this->M_task->get_data_task_list_join_table_list_where_task_id($task_id);
			$data['TableList'] = $this->M_task->get_data_table_list();
			$data['Attachment'] = $this->M_task->get_data_attachment($task_id);
			$this->load->view('description', $data);
		} else {
			redirect(base_url('Login/index'));
		}
	}
	public function upload()
	{
		$task_id = $this->input->post('task_id');
		$config['upload_path'] = './assets/attachment';
		$config['allowed_types'] = 'jpg|png|gif|pdf|ppt';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile')) {
			echo print_r(array('error' => $this->upload->display_errors()));
		} else {
			$file_name = $this->upload->data('file_name');
		}

		$data = array(
			'id' => '',
			'file_name' => $file_name,
			'task_id' => $task_id
		);

		echo print_r($data);

		$this->M_task->insert_attachment($data);
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
	public function download(){
		$path = $this->input->get('path');
		force_download($path, NULL);
	}
	public function delete(){
		$id = $this->input->get('id');
		$this->M_task->delete_attachment($id);
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
}
