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

    public function get_detail() 
    {
        $response = array();
        $id = isset($_GET['id']) ? $_GET['id'] : 0;

        $sql = $this->db->query("
            SELECT 
                checklist.*,
                nopol, 
                status
            FROM checklist 
            JOIN mobiltanki ON id = checklist_mobiltanki_id
            WHERE 1 
            AND checklist_mobiltanki_id = $id 
            ORDER BY checklist_created_datetime DESC 
            LIMIT 1
        ");

        if ($sql->num_rows() > 0) {
            $response = $sql->row();

            $checklist_detail = array();

            $sql_get_detail = $this->db->query("
                SELECT *
                FROM checklist_detail
                WHERE 1 
                AND checklist_detail_checklist_id = $response->checklist_id
            ");

            if ($sql_get_detail->num_rows() > 0) {
                $checklist_detail = $sql_get_detail->result();
            }

            $response->checklist_detail = $checklist_detail;
        }

        responseSuccess('Berhasil mendapatkan data', $response);
    }
}
