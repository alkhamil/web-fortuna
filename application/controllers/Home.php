<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/index');
		$this->load->view('home/layout/footer');
    }
    
    public function form_registration()
    {
        $this->load->view('home/layout/header');
		$this->load->view('home/registration');
		$this->load->view('home/layout/footer');
    }

    public function registration()
    {
        $user = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'level' => 'customer'
        ];
        $user_id = $this->createData('users', $user);
        $customer = [
            'user_id' => $user_id,
            'title' => $this->input->post('title'),
            'name' => $this->input->post('name'),
            'birthday' => $this->input->post('birthday'),
            'profesion' => $this->input->post('profesion'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address')
        ];

        $this->db->insert('customers', $customer);
        if ($this->db->affected_rows()) {
            $this->session->set_userdata('account', [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            ]);
            redirect(base_url('feedback'),'refresh');
        }
    }

    public function feedback()
    {
        $this->load->view('home/layout/header');
		$this->load->view('home/feedback');
		$this->load->view('home/layout/footer');
    }

    public function ketersediaan()
    {
        $datacheckin = [
            'durasi-menginap' => $this->input->post('durasi-menginap'),
            'check-in' => $this->input->post('check-in'),
            'check-out' => $this->input->post('check-out'),
            'total-tamu' => $this->input->post('total-tamu'),
        ];
        $this->session->set_userdata('datacheckin', $datacheckin);
        $tipekamar = $this->db->get('classes')->result_array();
        $kamar = $this->db->get('rooms')->result_array();

        $data = [
            'tipekamar' => $tipekamar,
            'kamar' => $kamar
        ];

        $this->load->view('home/layout/header');
        $this->load->view('home/ketersediaan', $data);
        $this->load->view('home/layout/footer');
    }

    public function pilihkamar($id)
    {
        $kamar = $this->db->get_where('rooms', ['id'=>$id])->row_array();
        $data = [
            'kamar' => $kamar
        ];
        $this->load->view('home/layout/header');
        $this->load->view('home/pilihkamar', $data);
        $this->load->view('home/layout/footer');
    }

    public function reservation()
    {
        $this->session->set_userdata('datacheckin', $_POST);
        $reservastion = [
            'class_id' => $this->input->post('class_id'),
            'room_id' => $this->input->post('room_id'),
            'customer_id' => $this->input->post('customer_id'),
            'checkin_date' => $this->input->post('check-in'),
            'checkout_date' => $this->input->post('check-out'),
            'title' => $this->input->post('title'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'status' => 0,
            'created_at' => date('Y-m-d')
        ];
        $reservation_id = $this->createData('reservations', $reservastion);
        $transaction = [
            'reservation_id' => $reservation_id,
            'code' => 'TRX/'.date('Y-m-d').$reservation_id,
            'payment_type' => $this->input->post('bank'),
            'payment_status' => 0,
            'amount' => $this->input->post('amount'),
            'created_at' => date('Y-m-d'),
        ];
        $datacheckin = $this->session->userdata('datacheckin');
        $datacheckin['reservation_id'] = $reservation_id;
        $this->session->set_userdata('datacheckin', $datacheckin);
        $this->db->insert('transactions', $transaction);
        if ($this->db->affected_rows()) {
            redirect(base_url('form-upload-pembayaran'),'refresh');
        }
    }

    public function form_upload_pembayaran()
    {
        $this->load->view('home/layout/header');
        $this->load->view('home/form-upload-pembayaran');
        $this->load->view('home/layout/footer');
    }

    public function upload_pembayaran()
    {
        $id = $this->input->post('trx_id');
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|svg|jpeg';
        $config['max_size']             = '12000'; // KB  
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('bukti_transfer')){
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('form-upload-pembayaran'),'refresh');
        }else {
            $upload_data = array('uploads' => $this->upload->data());
            // Image Editor
            $config['image_library']  	= 'gd2';
            $config['source_image']   	= './assets/uploads/'.$upload_data['uploads']['file_name']; 
            $config['new_image']     	= './assets/uploads/thumbs/';
            $config['create_thumb']   	= TRUE;
            $config['quality']       	= "100%";
            $config['maintain_ratio']   = TRUE; 
            $config['width']       		= 360; // Pixel
            $config['height']       	= 360; // Pixel
            $config['x_axis']       	= 0;
            $config['y_axis']       	= 0;
            $config['thumb_marker']   	= '';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $trx = [
                'id' => $id,
                'bukti_transfer' => $upload_data['uploads']['file_name']
            ];
            $this->db->where('id', $id);
            $query = $this->db->update('transactions', $trx);
            $this->session->unset_userdata('datacheckin');
            $this->session->set_flashdata('msg', 'Terimakasih sudah melakukan pemesanan');
            redirect(base_url('/my-reservation'),'refresh');
        }
    }

    public function my_reservation()
    {
        $this->load->view('home/layout/header');
        $this->load->view('home/my-reservation');
        $this->load->view('home/layout/footer');
    }

    function createData($table,$data){
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}
