<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');
        $this->load->helper('tgl_indo');
        is_logged_in();
    }

    public function mobiltanki()
    {
        $data['title'] = 'Mobil Tanki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Master_model', 'listmobil');
        $data['listmobil'] = $this->listmobil->getListMobil();

        $this->load->view('template/header', $data);
        $this->load->view('template/head', $data);
        $this->load->view('master/mobiltanki',$data);
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
        $this->load->view('template/footer');
    }

    public function addMobilTanki()
    {
        $data['title'] = 'Add Mobil Tanki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nopol', 'Nopol', 'required|trim');
        $this->form_validation->set_rules('transportir', 'Transportir', 'trim|required');
        $this->form_validation->set_rules('merk_mobil', 'Merk Mobil', 'trim|required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim|max_length[2]');
        $this->form_validation->set_rules('tahun_pembuatan', 'Tahun Pembuatan', 'required|trim');
        $this->form_validation->set_rules('jenis_produk', 'Jenis Produk', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('ta', 'TA', 'trim|required');
        $this->form_validation->set_rules('tera', 'Tera', 'trim|required');
        $this->form_validation->set_rules('keur', 'Keur', 'trim|required');
        $this->form_validation->set_rules('pajak', 'Pajak', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/head', $data);
            $this->load->view('master/addMobilTanki', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/foot');
            $this->load->view('template/footer');
        } else {
            $this->Master_model->addMobil($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show fade" role="alert">Mobil Tanki Success Added</div>');
            redirect('master/mobiltanki');
        }
    }

    public function editMobil($id)
    {
        $data['title'] = 'Edit Mobil Tanki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['mt'] = $this->Master_model->getById($id);
        $data['jenis'] = ['Multi Produk', 'Pertashop', 'Industri', 'Avtur'];
        $data['pola'] = ['Pola Sewa', 'Pola Tarif'];

        $this->form_validation->set_rules('nopol', 'Nopol', 'required|trim');
        $this->form_validation->set_rules('transportir', 'Transportir', 'trim|required');
        $this->form_validation->set_rules('merk_mobil', 'Merk Mobil', 'trim|required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim|max_length[2]');
        $this->form_validation->set_rules('tahun_pembuatan', 'Tahun Pembuatan', 'required|trim');
        $this->form_validation->set_rules('jenis_produk', 'Jenis Produk', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('ta', 'TA', 'trim|required');
        $this->form_validation->set_rules('tera', 'Tera', 'trim|required');
        $this->form_validation->set_rules('keur', 'Keur', 'trim|required');
        $this->form_validation->set_rules('pajak', 'Pajak', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/head', $data);
            $this->load->view('master/editMobilTanki', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/foot');
            $this->load->view('template/footer');
        } else {
            $this->Master_model->editMobil();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show fade" role="alert">Mobil Tanki Success Edit</div>');
            redirect('master/mobiltanki');
        }
    }

    public function deleteMobil($id)
    {
        $this->Master_model->deletemobil($id);
    }
}