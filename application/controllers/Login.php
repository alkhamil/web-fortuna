<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('login');
    }

    public function login_proses()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['username'=>$username])->row_array();
        if (!empty($user)) {
            if (sha1($password) == $user['password']) {
                switch ($user['level']) {
                    case 'admin':
                        $this->session->set_userdata('auth', $user);
                        $this->session->set_flashdata('sukses', 'Anda berhasil login sebagai admin');
                        redirect(base_url('dashboard'), 'refresh');
                        break;
                    case 'customer':
                        $this->session->set_userdata('auth', $user);
                        $this->session->set_flashdata('sukses', 'Anda berhasil login sebagai user');
                        redirect(base_url('/'), 'refresh');
                        break;
                    default:
                        break;
                }
            }else {
                $this->session->set_flashdata('msg', 'Username dan password tidak cocok !');
			    redirect(base_url('login'), 'refresh');
            }
        }else {
            $this->session->set_flashdata('msg', 'Username dan password tidak cocok !');
			redirect(base_url('login'), 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('auth');
        $this->session->unset_userdata('acount');
        $this->session->unset_userdata('datacheckin');
        redirect(base_url('/login'), 'refresh');
    }
}