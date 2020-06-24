<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function index()
    {
        $transaksi = $this->db->get('transactions')->result_array();
        $data = [
            'transaksi' => $transaksi
        ];
        $this->load->view('admin/layout/header');
        $this->load->view('admin/transaksi/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function approve($id)
    {
        $reservation_id = $this->db->get_where('transactions', ['id'=>$id])->row_array()['reservation_id'];
        $room_id = $this->db->get_where('reservations', ['id'=>$reservation_id])->row_array()['room_id'];
        $trx = [
            'id' => $id,
            'payment_status' => 1
        ];
        $this->db->where('id', $id);
        $this->db->update('transactions', $trx);

        $rsv = [
            'id' => $reservation_id,
            'status' => 1
        ];
        $this->db->where('id', $reservation_id);
        $this->db->update('reservations', $rsv);

        $room = [
            'id' => $room_id,
            'status' => 0,
        ];

        $this->db->where('id', $room_id);
        $this->db->update('rooms', $room);
        $this->session->set_flashdata('msg', 'Data sudah di approve');
        redirect(base_url('transaksi'),'refresh');
        
    }

    public function hapus($id)
    {   
        $trx = $this->db->get_where('transactions', ['id'=>$id])->row_array();

        $room_id = $this->db->get_where('reservations', ['id'=>$trx['reservation_id']])->row_array()['room_id'];
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
        
        $this->db->delete('transactions', ['id'=>$id]);
        $this->db->delete('reservations', ['id'=>$trx['reservation_id']]);
        $this->session->set_flashdata('msg', 'Data sudah di hapus');
        redirect(base_url('transaksi'),'refresh');
    }
}