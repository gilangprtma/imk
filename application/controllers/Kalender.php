<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Kalender Mobil Tanki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/head', $data);
        $this->load->view('kalender/index',$data);
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
        $this->load->view('template/footer');
    }
}