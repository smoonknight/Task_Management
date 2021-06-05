<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
    public function insert () {
        $task_name = $this->input->post('task_name');
        $task_desc = $this->input->post('task_desc');
        $list_id = $this->input->post('list_id');
        $priority = $this->input->post('priority');
        $deadline = $this->input->post('deadline');
        $data = array(
            'task_id' => '',
            'task_name' => $task_name,
            'task_desc' => $task_desc,
            'list_id' => $list_id,
            'priority' => $priority,
            'deadline' => $deadline
        );
        $this->M_task->insert_task_list($data);
        echo "<script>window.location='" . site_url('Home/index') . "';</script>";
    }

    public function delete () {
        $list_id = $this->input->get('task_id');
        $this->M_task->delete_task_list($list_id);
        echo "<script>window.location='" . site_url('Home/index') . "';</script>";
    }

    public function update () {
        $list_id = $this->input->post('list_id');
        $task_id = $this->input->post('task_id');
        $this->M_task->update_task_list($list_id,$task_id);
        echo "<script>window.location='" . site_url('Home/index') . "';</script>";
    }
}