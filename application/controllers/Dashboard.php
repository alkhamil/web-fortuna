<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/dashboard/index');
        $this->load->view('admin/layout/footer');
    }
}