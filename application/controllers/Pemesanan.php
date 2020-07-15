<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function index()
    {
        $this->db->order_by('id', 'DESC');
        $pemesanan = $this->db->get('reservations')->result_array();
        $data = [
            'pemesanan' => $pemesanan
        ];
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pemesanan/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function checkout($id)
    {
        $room_id = $this->db->get_where('reservations', ['id'=>$id])->row_array()['room_id'];
        $room = [
            'id' => $room_id,
            'status' => 1,
        ];
        $this->db->where('id', $room_id);
        $this->db->update('rooms', $room);

        $rsv = [
            'id' => $id,
            'status' => 2
        ];
        $this->db->where('id', $id);
        $this->db->update('reservations', $rsv);

        
        $this->session->set_flashdata('msg', 'Pelanggan Sudah Keluar Kamar');
        redirect(base_url('pemesanan'),'refresh');
    }

    public function hapus($id)
    {
        $rsv = $this->db->get_where('reservations', ['id'=>$id])->row_array();
        $trx = $this->db->get_where('transactions', ['id'=>$rsv['id']])->row_array();
        $room_id = $rsv['room_id'];
        $room = [
            'id' => $room_id,
            'status' => 1,
        ];
        $this->db->where('id', $room_id);
        $this->db->update('rooms', $room);
        
        if ($trx['bukti_transfer'] != "") {
			unlink('assets/uploads/'.$trx['bukti_transfer']);
			unlink('assets/uploads/thumbs/'.$trx['bukti_transfer']);
        }
        
        $this->db->delete('transactions', ['id'=>$trx['id']]);
        $this->db->delete('reservations', ['id'=>$rsv['id']]);
        $this->session->set_flashdata('msg', 'Data sudah di hapus');
        redirect(base_url('pemesanan'),'refresh');
    }
    
}