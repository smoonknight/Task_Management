<?php
class M_task extends CI_Model
{
    public function can_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('table_member');

        return ($query->num_rows() > 0 ? true : false);
    }
    public function get_data_task_list()
    {
        return $this->db->get('task_list')->result_array();
    }
    public function get_data_task_list_join_table_list_where_do()
    {
        $this->db->select('*');
        $this->db->from('task_list');
        $this->db->join('table_list', 'task_list.list_id = table_list.list_id');
        $this->db->where('do', 'yes');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_data_task_list_join_table_list_where_task_id($task_id)
    {
        $this->db->select('*');
        $this->db->from('task_list');
        $this->db->join('table_list', 'task_list.list_id = table_list.list_id');
        $this->db->where('task_id', $task_id);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_data_task_list_join_table_list_where_list_id($list_id)
    {
        $this->db->select('*');
        $this->db->from('task_list');
        $this->db->join('table_list', 'task_list.list_id = table_list.list_id');
        $this->db->where('task_list.list_id', $list_id);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_data_attachment_join_task_list_where_task_id($task_id)
    {
        $this->db->select('*');
        $this->db->from('attachment');
        $this->db->join('task_list', 'attachment.task_id = task_list.task_id');
        $this->db->where('attachment.task_id', $task_id);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_data_table_list()
    {
        return $this->db->get('table_list')->result_array();
    }
    public function get_data_table_member()
    {
        return $this->db->get('table_member')->result_array();
    }
    public function get_data_attachment($task_id)
    {
        $this->db->where('task_id', $task_id);
        return $this->db->get('attachment')->result_array();
    }
    public function get_data_table_member_login($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('table_member')->result_array();
    }
    public function insert_task_list($data)
    {
        $this->db->insert('task_list', $data);
    }
    public function insert_table_list($data)
    {
        $this->db->insert('table_list', $data);
    }
    public function insert_table_member($data)
    {
        $this->db->insert('table_member', $data);
    }
    public function insert_attachment($data)
    {
        $this->db->insert('attachment', $data);
    }
    public function delete_task_list($task_id)
    {
        $this->db->delete('task_list', array('task_id' => $task_id));
    }
    public function delete_table_list($list_id)
    {
        $this->db->delete('table_list', array('list_id' => $list_id));
    }
    public function delete_table_member($username)
    {
        $this->db->delete('table_member', array('username' => $username));
    }
    public function delete_attachment($id)
    {
        $this->db->delete('attachment', array('id' => $id));
    }
    public function update_task_list($list_id, $task_id)
    {
        $this->db->where('task_id', $task_id);
        $this->db->update('task_list', array('list_id' => $list_id));
    }
}
