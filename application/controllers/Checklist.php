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

        //$this->load->model('Checklist_model', 'checklist');
        //$data['checklist'] = $this->checklist->getListCheck();

        $data['checklist'] = array();

        $get_checklist = $this->db->query("
            SELECT 
                *,
                DATE(checklist_created_datetime) AS checklist_created_datetime_label, 
                CASE
                    WHEN checklist_is_close = 0 THEN 'Masih Ada Temuan'
                    WHEN checklist_is_close = 1 THEN 'Ready'
                    ELSE 'Blokir'
                END AS checklist_is_close_label,
                CASE 
                    WHEN checklist_close_datetime IS NULL THEN '-'
                    ELSE DATE(checklist_close_datetime)
                END checklist_close_datetime_label
            FROM checklist 
            JOIN mobiltanki ON mobiltanki.id = checklist.checklist_mobiltanki_id
            ORDER BY checklist_id DESC
        ");

        if ($get_checklist->num_rows() > 0) {
            foreach ($get_checklist->result_array() as $key => $value) {
                $value['checklist_created_datetime_label'] = date_indo($value['checklist_created_datetime_label']);

                if ($value['checklist_close_datetime_label'] != '-') {
                    $value['checklist_close_datetime_label'] = date_indo($value['checklist_close_datetime_label']);
                }
            }

            $data['checklist'] = $get_checklist->result_array();
        }

        // echo '<pre>';
        // print_r($data);
        // die();

        $this->load->view('template/header', $data);
        $this->load->view('template/head', $data);
        $this->load->view('checklist/index', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
        $this->load->view('template/footer');
    }

    public function addChecklist()
    {
        $data['title'] = 'Add Checklist';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['list'] = $this->Checklist_model->getMT();

        $this->load->view('template/header', $data);
        $this->load->view('template/head', $data);
        $this->load->view('checklist/addchecklist', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/foot');
        $this->load->view('template/footer');
    }

    public function closed($id)
    {
        $data['title'] = 'Closed Checklist';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //$data['close'] = $this->Checklist_model->getById($id);

        $data['close'] = array();

        $get_checklist = $this->db->query("
            SELECT 
                *,
                DATE(checklist_created_datetime) AS checklist_created_datetime_label, 
                CASE
                    WHEN checklist_is_close = 0 THEN 'Masih Ada Temuan'
                    WHEN checklist_is_close = 1 THEN 'Ready'
                    ELSE 'Blokir'
                END AS checklist_is_close_label,
                CASE 
                    WHEN checklist_close_datetime IS NULL THEN '-'
                    ELSE DATE(checklist_close_datetime)
                END checklist_close_datetime_label
            FROM checklist 
            JOIN mobiltanki ON mobiltanki.id = checklist.checklist_mobiltanki_id
            WHERE 1
            AND checklist_id = $id
            LIMIT 1
        ");

        if ($get_checklist->num_rows() > 0) {
            $data['close'] = $get_checklist->row_array();

            $data['close']['detail'] = array();

            $get_checklist_detail = $this->db->query("
                SELECT 
                    *,
                    CASE
                        WHEN checklist_detail_is_close = 0 THEN 'Belum Selesai'
                        WHEN checklist_detail_is_close = 1 THEN 'Selesai'
                        ELSE 'Blokir'
                    END AS checklist_detail_is_close_label,
                    CASE 
                        WHEN checklist_detail_close_datetime IS NULL THEN '-'
                        ELSE DATE(checklist_detail_close_datetime)
                    END checklist_close_datetime_label
                FROM checklist_detail 
                WHERE 1
                AND checklist_detail_checklist_id = $id
            ");

            if ($get_checklist_detail->num_rows() > 0) {
                $data['close']['detail'] = $get_checklist_detail->result_array();
            }
        }

        // echo '<pre>';
        // print_r($data);
        // die();

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

    public function saveChecklist()
    {
        $datetime = date('Y-m-d H:i:s');

        $this->form_validation->set_rules('id', 'Mobil', 'required|numeric');
        $this->form_validation->set_rules('temuan[]', 'Temuan', 'required');
        $this->form_validation->set_rules('kategori[]', 'Kategori', 'required');
        $this->form_validation->set_rules('batas[]', 'Batas temuan hari', 'required');

        if ($this->form_validation->run($this) == FALSE) {
            $error_validation = $this->form_validation->error_array();
            errorValidation("Form belum lengkap", $error_validation);
        }

        $id = $this->input->post('id');
        $temuan = $this->input->post('temuan[]') ? $this->input->post('temuan[]') : array();
        $kategori = $this->input->post('kategori[]') ? $this->input->post('kategori[]') : array();
        $batas = $this->input->post('batas[]') ? $this->input->post('batas[]') : array();

        if (!is_array($temuan)) {
            $error_validation = array('temuan[]' => 'Temuan harus berupa array');
            errorValidation("Form belum lengkap", $error_validation);
        }

        if (!is_array($kategori)) {
            $error_validation = array('kategori[]' => 'Kategori harus berupa array');
            errorValidation("Form belum lengkap", $error_validation);
        }

        if (!is_array($batas)) {
            $error_validation = array('batas[]' => 'Batas harus berupa array');
            errorValidation("Form belum lengkap", $error_validation);
        }

        $is_error = false;
        $msgError = "";

        $response = array();
        $this->db->trans_begin();

        try {
            $data_insert_checklist = array(
                'checklist_mobiltanki_id' => $id,
                'checklist_created_datetime' => $datetime,
                'checklist_updated_datetime' => NULL,
            );

            if (!$this->db->insert('checklist', $data_insert_checklist)) {
                throw new Exception("Gagal menyimpan data");
            } else {
                $checklist_id = $this->db->insert_id();

                foreach ($temuan as $key => $value) {
                    $data_insert_checklist_detail = array(
                        'checklist_detail_checklist_id' => $checklist_id,
                        'checklist_detail_temuan' => $value,
                        'checklist_detail_kategori' => $kategori[$key],
                        'checklist_detail_batas_temuan_hari' => $batas[$key],
                        'checklist_detail_input_datetime' => $datetime,
                        'checklist_detail_close_datetime' => NULL,
                    );

                    if (!$this->db->insert('checklist_detail', $data_insert_checklist_detail)) {
                        throw new Exception("Gagal menyimpan data detail");
                    }
                }
            }
        } catch (Exception $exc) {
            $is_error = true;
            $msgError = $exc->getMessage();
        }

        if ($this->db->trans_status() === false || $is_error === true) {
            $this->db->trans_rollback();
            errorFailed("Gagal menyimpan data. " . $msgError);
        } else {
            $this->db->trans_commit();
            responseSuccess('Berhasil menyimpan data', $response);
        }
    }

    public function updateClosed($id = 0)
    {
        $response = array();
        $datetime = date("Y-m-d H:i:s");

        $get_checklist_detail = $this->db->query("
            SELECT *
            FROM checklist_detail 
            WHERE 1
            AND checklist_detail_id = $id
            LIMIT 1
        ");

        if ($get_checklist_detail->num_rows() <= 0) {
            errorFailed("Data tidak ditemukan", array());
        } else {
            //if ($get_checklist_detail->row()->checklist_detail_is_close != "0") {
                //errorFailed("Data sudah berstatus selesai", array());
            //} else {
                $is_error = false;
                $msgError = "";

                $response = array();
                $this->db->trans_begin();

                try {
                    $data_update = array(
                        'checklist_detail_is_close' => 1,
                        'checklist_detail_close_datetime' => $datetime,
                    );

                    $this->db->where('checklist_detail_id', $id);
                    $this->db->update('checklist_detail', $data_update);

                    if ($this->db->affected_rows() < 0) {
                        throw new Exception("Gagal menyimpan data");
                    } else {
                        $checklist_id = $get_checklist_detail->row()->checklist_detail_checklist_id;

                        $get_checklist_detail = $this->db->query("
                            SELECT *
                            FROM checklist_detail 
                            WHERE 1
                            AND checklist_detail_checklist_id = $checklist_id
                            -- AND checklist_detail_is_close = 0
                            -- LIMIT 1
                        ");

                        if ($get_checklist_detail->num_rows() > 0) {
                            $is_done = true;

                            foreach ($get_checklist_detail->result() as $key => $value) {
                                if ($value->checklist_detail_is_close != '1') {
                                    $is_done = false;
                                }
                            }

                            if ($is_done) {
                                $data_update_checklist = array(
                                    'checklist_is_close' => 1,
                                    'checklist_close_datetime' => $datetime,
                                );

                                $this->db->where('checklist_id', $checklist_id);
                                $this->db->update('checklist', $data_update_checklist);

                                if ($this->db->affected_rows() < 0) {
                                    throw new Exception("Gagal update data");
                                }
                            }
                        }
                    }
                } catch (Exception $exc) {
                    $is_error = true;
                    $msgError = $exc->getMessage();
                }

                if ($this->db->trans_status() === false || $is_error === true) {
                    $this->db->trans_rollback();
                    errorFailed("Gagal menyimpan data. " . $msgError);
                } else {
                    $this->db->trans_commit();
                    responseSuccess('Berhasil menyimpan data', $response);
                }
            //}
        }
    }

    public function blok()
    {
        $sql = "SELECT * FROM checklist_detail WHERE checklist_detail_batas_temuan_hari";
        $query = $this->db->query($sql);

        $tanggalBatas = date('Y-m-d');
        $queryBatas = $this->db->query("SELECT * FROM checklist_detail WHERE 
        checklist_detail_batas_temuan_hari < '$tanggalBatas' AND checklist_detail_is_close=0");
        if($queryBatas->num_rows()>0){
            foreach($queryBatas->result() as $idu=>$valu){
                $data = [
                    'checklist_detail_is_close' => '2'
                ];

                $this->db->where('checklist_detail_id',$valu->checklist_detail_id);
                $this->db->update('checklist_detail', $data);

                // Update blokir all

                $checklist_id = $valu->checklist_detail_checklist_id;

                $get_checklist_detail = $this->db->query("
                    SELECT *
                    FROM checklist_detail 
                    WHERE 1
                    AND checklist_detail_checklist_id = $checklist_id
                ");

                if ($get_checklist_detail->num_rows() > 0) {
                    $is_blokir = true;

                    foreach ($get_checklist_detail->result() as $key => $value) {
                        if ($value->checklist_detail_is_close != '2') {
                            $is_blokir = false;
                        }
                    }

                    if ($is_blokir) {
                        $data_update_checklist = array(
                            'checklist_is_close' => 2,
                        );

                        $this->db->where('checklist_id', $checklist_id);
                        $this->db->update('checklist', $data_update_checklist);
                    }
                }

                // End update blokir all
            }
        }else{
            echo "tidak ada";
        }
    }
}
