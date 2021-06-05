<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListTable extends CI_Controller {
    public function insert () {
        $list_name = $this->input->post('list_name');
        $list_desc = $this->input->post('list_desc');
        $do = $this->input->post('options');
        $data = array(
            'list_id' => '',
            'list_name' => $list_name,
            'list_desc' => $list_desc,
            'do' => $do,
        );
        $this->M_task->insert_table_list($data);
        echo "<script>window.location='" . site_url('ManageList/index') . "';</script>";
    }

    public function delete () {
        $list_id = $this->input->get('list_id');
        $this->M_task->delete_table_list($list_id);
        echo "<script>window.location='" . site_url('ManageList/index') . "';</script>";
    }
}