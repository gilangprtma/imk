<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/bloked');
        }
    }
}

function errorValidation($msg = null, $data = array()) {
    header("Content-Type: application/json");
    header("HTTP/1.1 400 Bad Request");

    echo json_encode(array(
        "status" => 400,
        "error_code" => 'error_validation',
        "msg" => is_null($msg) ? 'Form belum valid' : $msg,
        "data" => empty($data) ? (object) array() : (object) $data,
    ));

    exit;
}

function errorFailed($msg = null, $data = array()) {
    header("Content-Type: application/json");
    header("HTTP/1.1 400 Bad Request");

    echo json_encode(array(
        "status" => 400,
        "error_code" => 'error_failed',
        "msg" => is_null($msg) ? 'Gagal' : $msg,
        "data" => empty($data) ? (object) array() : (object) $data,
    ));

    exit;
}

function responseSuccess($msg = null, $data = array(), $err_code = false) {
    header("Content-Type: application/json");
    header("HTTP/1.1 200 Success");

    echo json_encode(array(
        'status' => 200,
        'error_code' => $err_code,
        'msg' => is_null($msg) ? 'Success' : $msg,
        'data' => (object) $data
    ));

    exit;
}