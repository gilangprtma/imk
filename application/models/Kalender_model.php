<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalender_model extends CI_Model
{
    public function fetch_all_event()
    {
        $this->db->order_by('id');
        return $this->db->get('mobiltanki');
    }
}