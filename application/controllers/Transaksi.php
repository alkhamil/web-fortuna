<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function index()
    {
        $this->db->order_by('id', 'DESC');
        $transaksi = $this->db->get('transactions')->result_array();
        $data = [
            'transaksi' => $transaksi
        ];
        $this->load->view('admin/layout/header');
        $this->load->view('admin/transaksi/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function send_email($data)
    {
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'wordwrap'=> TRUE,
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'rakaciahotel7@gmail.com',  // Email gmail
            'smtp_pass'   => 'polisi86',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
        // Load library email dan konfigurasinya
        $this->load->library('email', $config);
        $this->email->initialize($config);
        // Email dan nama pengirim
        $this->email->from('rakaciahotel7@gmail.com', 'Rakacia Hotel');
        // Email penerima
        $this->email->to($data['email']); // Ganti dengan email tujuan
        // Subject email
        $this->email->subject('Pesanan anda telah disetujui');
        // Isi email
        $msg = $this->load->view('email',$data,true);
        $this->email->message($msg);

        $this->email->send();
    }

    public function eticket($data)
    {
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'wordwrap'=> TRUE,
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'rakaciahotel7@gmail.com',  // Email gmail
            'smtp_pass'   => 'polisi86',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
        // Load library email dan konfigurasinya
        $this->load->library('email', $config);
        $this->email->initialize($config);
        // Email dan nama pengirim
        $this->email->from('rakaciahotel7@gmail.com', 'Rakacia Hotel');
        // Email penerima
        $this->email->to($data['email']); // Ganti dengan email tujuan
        // Subject email
        $this->email->subject('e-Ticket');
        // Isi email
        $msg = $this->load->view('e-ticket',$data,true);
        $this->email->message($msg);

        $this->email->send();
    }

    public function approve($id)
    {
        $t = $this->db->get_where('transactions', ['id'=>$id])->row_array();
        $r = $this->db->get_where('reservations', ['id'=>$t['reservation_id']])->row_array();
        $k = $this->db->get_where('rooms', ['id'=>$r['room_id']])->row_array();
        $c = $this->db->get_where('classes', ['id'=>$k['class_id']])->row_array();
        $data['email'] = $r['email'];
        $data['name'] = $r['name'];
        $data['code'] = $t['code'];
        $data['room'] = $k['title'];
        $data['class'] = $c['name'];
        $data['checkin_date'] = $r['checkin_date'];
        $data['checkout_date'] = $r['checkout_date'];
        $data['amount'] = $t['amount'];
        $data['created_at'] = $t['created_at'];
        // echo json_encode($data);exit;
        $trx = [
            'id' => $id,
            'payment_status' => 1
        ];
        $this->db->where('id', $id);
        $this->db->update('transactions', $trx);

        $rsv = [
            'id' => $t['reservation_id'],
            'status' => 1
        ];
        $this->db->where('id', $t['reservation_id']);
        $this->db->update('reservations', $rsv);

        $room = [
            'id' => $r['room_id'],
            'status' => 0,
        ];
        
        $this->db->where('id', $r['room_id']);
        $this->db->update('rooms', $room);
        
        $this->send_email($data);
        $this->eticket($data);

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