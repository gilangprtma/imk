<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checklist_model extends CI_Model
{
    public function getListCheck()
    {
        $query = "SELECT * FROM `checklist` ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('checklist', ['id' => $id])->row_array();
    }
    
    public function getMT()
    {
        $query = "SELECT * FROM `mobiltanki` ORDER BY `nopol` ASC";
        return $this->db->query($query)->result_array();
    }

    public function addcheck($data)
    {
        $temuan = implode(',', $this->input->post('temuan', true));
        $kategori = implode(',', $this->input->post('kategori', true));
        $batas = implode(',', $this->input->post('batas', true));

        $data = [
            'id_mobil' => htmlspecialchars($this->input->post('id_mobil', true)),
            'temuan' => $temuan,
            'kategori' => $kategori,
            'batas' => $batas,
            'tanggal_checklist' => time()
        ];
        $this->db->insert('checklist', $data);
    }

    public function closedCheck()
    {
        $data = [
            'id_mobil' => htmlspecialchars($this->input->post('id_mobil', true)),
            'temuan' => htmlspecialchars($this->input->post('temuan', true)),
            'kategori' => htmlspecialchars($this->input->post('kategori', true)),
            'tanggal_closed' => time()
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('checklist', $data);
    }
}