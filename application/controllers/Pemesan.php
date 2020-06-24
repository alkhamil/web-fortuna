<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesan extends CI_Controller {

    public function index()
    {
        $pemesan = $this->db->get('customers')->result_array();
        $data = [
            'pemesan' => $pemesan
        ];
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pemesan/index', $data);
        $this->load->view('admin/layout/footer');
    }

}
