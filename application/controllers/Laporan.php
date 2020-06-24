<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function index()
    {
        $this->db->where('created_at >=', date('Y-m-d'));
        $this->db->where('created_at <=', date('Y-m-d'));
        $laporan = $this->db->get('transactions')->result_array();
        $data = [
            'laporan' => $laporan,
            'dari' => date('Y-m-d'),
            'sampai' => date('Y-m-d')
        ];
        $this->load->view('admin/layout/header');
        $this->load->view('admin/laporan/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function cari()
    {
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');

        $this->db->where('created_at >=', date('Y-m-d', strtotime($dari)));
        $this->db->where('created_at <=', date('Y-m-d', strtotime($sampai)));
        $laporan = $this->db->get('transactions')->result_array();
        $data = [
            'laporan' => $laporan,
            'dari' => $dari,
            'sampai' => $sampai
        ];
        $this->load->view('admin/layout/header');
        $this->load->view('admin/laporan/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function cetak_pdf($dari, $sampai)
    {
        $this->db->where('created_at >=', date('Y-m-d', strtotime($dari)));
        $this->db->where('created_at <=', date('Y-m-d', strtotime($sampai)));
        $laporan = $this->db->get('transactions')->result_array();
        $data = [
            'laporan' => $laporan,
            'dari' => $dari,
            'sampai' => $sampai
        ];
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('admin/laporan/laporan', $data);
    }
}