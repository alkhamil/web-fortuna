<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipeKamar extends CI_Controller {

    public function index()
    {
        $tipekamar = $this->db->get('classes')->result_array();
        $data = [
            'tipekamar' => $tipekamar,
            'error' => ''
        ];
        $this->load->view('admin/layout/header');
        $this->load->view('admin/tipekamar/index', $data);        
        $this->load->view('admin/layout/footer');
    }

    public function tipekamar_tambah()
    {
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|svg|jpeg';
        $config['max_size']             = '12000'; // KB  
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('photo')){
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('tipekamar'),'refresh');
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
            $tipekamar = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'photo' => $upload_data['uploads']['file_name'],
            ];
            $this->db->insert('classes', $tipekamar);
            $this->session->set_flashdata('msg', 'Data berhasil ditambahkan');
            redirect(base_url('tipekamar'),'refresh');
        }

    }
}