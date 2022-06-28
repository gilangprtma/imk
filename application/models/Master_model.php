<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function getListMobil()
    {
        $query = "SELECT * FROM `mobiltanki` ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('mobiltanki', ['id' => $id])->row_array();
    }

    public function addMobil($data)
    {
        $data = [
            'nopol' => htmlspecialchars($this->input->post('nopol', true)),
            'transportir' => htmlspecialchars($this->input->post('transportir', true)),
            'merk_mobil' => htmlspecialchars($this->input->post('merk_mobil', true)),
            'jenis' => htmlspecialchars($this->input->post('jenis', true)),
            'kapasitas' => htmlspecialchars($this->input->post('kapasitas', true)),
            'tahun_pembuatan' => htmlspecialchars($this->input->post('tahun_pembuatan', true)),
            'jenis_produk' => htmlspecialchars($this->input->post('jenis_produk', true)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
            'ta' => htmlspecialchars($this->input->post('ta', true)),
            'tera' => htmlspecialchars($this->input->post('tera', true)),
            'keur' => htmlspecialchars($this->input->post('keur', true)),
            'pajak' => htmlspecialchars($this->input->post('pajak', true)),
            'tanggal_pemeriksaan' => time()
        ];
        $this->db->insert('mobiltanki', $data);
    }

    public function editMobil()
    {
        $data = [
            'nopol' => htmlspecialchars($this->input->post('nopol', true)),
            'transportir' => htmlspecialchars($this->input->post('transportir', true)),
            'merk_mobil' => htmlspecialchars($this->input->post('merk_mobil', true)),
            'jenis' => htmlspecialchars($this->input->post('jenis', true)),
            'kapasitas' => htmlspecialchars($this->input->post('kapasitas', true)),
            'tahun_pembuatan' => htmlspecialchars($this->input->post('tahun_pembuatan', true)),
            'jenis_produk' => htmlspecialchars($this->input->post('jenis_produk', true)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
            'ta' => htmlspecialchars($this->input->post('ta', true)),
            'tera' => htmlspecialchars($this->input->post('tera', true)),
            'keur' => htmlspecialchars($this->input->post('keur', true)),
            'pajak' => htmlspecialchars($this->input->post('pajak', true)),
            'tanggal_pemeriksaan' => time()
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mobiltanki', $data);
    }

    public function deletemobil($id)
    {
        $this->db->delete('mobiltanki', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show fade" role="alert">Data has been deleted</div>');
        redirect('master/mobiltanki');
    }
}
