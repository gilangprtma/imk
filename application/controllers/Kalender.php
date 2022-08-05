<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Kalender_model');
        $this->load->helper('tgl_indo');
    }

    public function index()
    {
        $data['title'] = 'Kalender Mobil Tanki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('kalender/index',$data);
        $this->load->view('template/footer');
    }

    public function home()
    {
        $data['title'] = 'Kalender Mobil Tanki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/head', $data);
        $this->load->view('kalender/home',$data);
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
        $this->load->view('template/footer');
    }

    public function load()
    {
        $event_data = $this->Kalender_model->fetch_all_event();
        foreach($event_data->result_array() as $row)
        {
        $data[] = array(
            'id' => $row['id'],
            'title' => $row['nopol'],
            'start' => $row['keur']
        );
        }
        echo json_encode($data);
    }
}