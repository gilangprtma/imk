<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checklist extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Checklist_model');
        $this->load->helper('tgl_indo');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Checklist';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Checklist_model', 'checklist');
        $data['checklist'] = $this->checklist->getListCheck();

        $this->load->view('template/header', $data);
        $this->load->view('template/head', $data);
        $this->load->view('checklist/index', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
        $this->load->view('template/footer');
    }

    public function addChecklist()
    {
        if ($_POST) {
            echo '<pre>';
            print_r($_POST);
            die();
        }

        $data['title'] = 'Add Checklist';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['list'] = $this->Checklist_model->getMT();

        $this->form_validation->set_rules('temuan[]', 'Temuan', 'required|trim');
        $this->form_validation->set_rules('kategori[]', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('batas[]', 'Batas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/head', $data);
            $this->load->view('checklist/addchecklist', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/foot');
            $this->load->view('template/footer');
        } else {
            $this->Checklist_model->addcheck($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show fade" role="alert">Checklist Success Added</div>');
            redirect('checklist');
        }
    }

    public function closed($id)
    {
        $data['title'] = 'Closed Checklist';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['close'] = $this->Checklist_model->getById($id);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/head', $data);
            $this->load->view('checklist/closedChecklist', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/foot');
            $this->load->view('template/footer');
        } else {
            $this->Checklist_model->closedCheck();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show fade" role="alert">Temuan berhasil diclosed</div>');
            redirect('checklist');
        }
    }
}
