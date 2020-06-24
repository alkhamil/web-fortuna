<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

    public function index()
    {
        $kamar = $this->db->get('rooms')->result_array();
        $tipekamar = $this->db->get('classes')->result_array();
        $data = [
            'kamar' => $kamar,
            'tipekamar' => $tipekamar
        ];
        $this->load->view('admin/layout/header');
        $this->load->view('admin/kamar/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function kamar_tambah()
    {
        if (!empty($this->input->post('status'))) {
            $status = 1;
        }else {
            $status = 0;
        }
        $kamar = [
            'title' => $this->input->post('title'),
            'number' => $this->input->post('number'),
            'class_id' => $this->input->post('class_id'),
            'status' => $status,
        ];
        $this->db->insert('rooms', $kamar);
        $this->session->set_flashdata('msg', 'Data berhasil ditambahkan');
        redirect(base_url('kamar'),'refresh');   
    }

    public function kamar_edit()
    {
        if (!empty($this->input->post('status'))) {
            $status = 1;
        }else {
            $status = 0;
        }
        $kamar = [
            'id' => $this->input->post('room_id'),
            'title' => $this->input->post('title'),
            'number' => $this->input->post('number'),
            'class_id' => $this->input->post('class_id'),
            'status' => $status,
        ];
        $this->db->where('id', $this->input->post('room_id'));
        $query = $this->db->update('rooms', $kamar);
        $this->session->set_flashdata('msg', 'Data telah diupdate');
        redirect(base_url('kamar'),'refresh');
    }

    public function kamar_hapus($id)
    {
        $this->db->delete('rooms', ['id'=>$id]);
        $this->session->set_flashdata('msg', 'Data sudah di hapus');
        redirect(base_url('kamar'),'refresh');
    }
}