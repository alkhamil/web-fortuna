<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $this->db->order_by('id', 'DESC');
        $admin = $this->db->get_where('users', ['level'=>'admin'])->result_array();
        $data = [
            'admin' => $admin
        ];
        $this->load->view('admin/layout/header');
        $this->load->view('admin/admin/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function admin_tambah()
    {
        $status = 0;
        if (isset($_POST['status'])) {
            $status = 1;
        }
        $admin = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'level' => 'admin',
            'status' => $status
        ];
        $this->db->insert('users', $admin);
        $this->session->set_flashdata('msg', 'Data berhasil ditambahkan');
        redirect(base_url('admin'),'refresh');   
    }

    public function admin_edit()
    {
        $status = 0;
        if (isset($_POST['status'])) {
            $status = 1;
        }
        $admin = [
            'id' => $this->input->post('user_id'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'level' => 'admin',
            'status' => $status
        ];
        $this->db->where('id', $this->input->post('user_id'));
        $query = $this->db->update('users', $admin);
        $this->session->set_flashdata('msg', 'Data telah diupdate');
        redirect(base_url('admin'),'refresh');
    }

    public function admin_hapus($id)
    {
        $this->db->delete('users', ['id'=>$id]);
        $this->session->set_flashdata('msg', 'Data sudah di hapus');
        redirect(base_url('admin'),'refresh');
    }
}