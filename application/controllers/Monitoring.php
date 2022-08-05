<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Monitoring_model');
        $this->load->helper('tgl_indo');
    }

    public function index()
    {
        $data['title'] = 'Monitoring Mobil Tanki';

        $this->load->model('Monitoring_model', 'listmobil');

        //$data = $this->Monitoring_model->getListMobil->result();

        $data['listmobil'] = $this->listmobil->getListMobil();
        $data['hitungMT'] = $this->Monitoring_model->jumlahMT();
        $data['mtready'] = $this->Monitoring_model->mtReady();
        $data['mtoff'] = $this->Monitoring_model->mtOff();

        $this->load->view('template/header', $data);
        $this->load->view('monitoring/index', $data);
        $this->load->view('template/footer');
    }
}
