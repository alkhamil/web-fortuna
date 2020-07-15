<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/dashboard/index');
        $this->load->view('admin/layout/footer');
    }

    public function getClass($class_id)
    {
        $start = $this->input->get('start_date');
        $end = $this->input->get('end_date');
        $this->db->select('trx.*');
        $this->db->from('transactions AS trx');
        $this->db->join('reservations AS rsv', 'rsv.id = trx.reservation_id');
        $this->db->join('rooms AS r', 'r.id = rsv.room_id');
        $this->db->join('classes AS c', 'c.id = r.class_id');
        $this->db->where('trx.created_at >=', date('Y-m-d', strtotime($start)));
        $this->db->where('trx.created_at <=', date('Y-m-d', strtotime($end)));
        $this->db->where('c.id', $class_id);
        $laporan = $this->db->get()->num_rows();
        return $laporan;
    }

    public function grafik()
    {
        $classes = $this->db->get('classes')->result_array();
        $result = [];
        foreach ($classes as $key => $class) {
            $data['class_name'] = $class['name'];
            $data['trx_count'] = $this->getClass($class['id']);
            array_push($result, $data);
        }
        echo json_encode($result);
    }
}