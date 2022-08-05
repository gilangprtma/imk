<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_model extends CI_Model
{
    public function getListMobil()
    {
        $query = "SELECT * FROM `mobiltanki` ORDER BY `id` DESC";

        //$this->db->order_by('id', 'ASC');
        //return $this->db->from('mobiltanki')
        //    ->join('checklist', 'checklist.checklist_mobiltanki_id = mobiltanki.id')
            //->where('status', 'Pending')
        //    ->get()
        //    ->result();

        return $this->db->query($query)->result_array();
    }

    public function jumlahMT()
    {
        $query = $this->db->get('mobiltanki');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function mtReady()
    {
        $query = $this->db->query('SELECT * FROM mobiltanki WHERE status="Ready"');
        $ready = $query->num_rows();
        return $ready;
    }

    public function mtOff()
    {
        $query = $this->db->query('SELECT * FROM mobiltanki WHERE status="Off"');
        $ready = $query->num_rows();
        return $ready;
    }
}
