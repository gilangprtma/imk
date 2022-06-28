<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getList()
    {
        $query = "SELECT * FROM `user` ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function adduser($data)
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'phone' => htmlspecialchars($this->input->post('phone', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'image' => 'default.png',
            'date_created' => time()
        ];
        $this->db->insert('user', $data);
    }

    public function edituser()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'phone' => htmlspecialchars($this->input->post('phone', true)),
            'date_update' => time()
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function deleteuser($id)
    {
        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show fade" role="alert">Data has been deleted</div>');
        redirect('user/list');
    }
}
