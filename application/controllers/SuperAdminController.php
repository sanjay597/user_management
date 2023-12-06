<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($_SESSION['role'] == 'user') {
            $this->errorResponse['message'] = 'Access denied';
            echo json_encode($this->errorResponse);
            exit();
        }
    }
    public function dashboard()
    {
        $this->load->view('superadmin/dashboard');
    }

    public function addUser()
    {
        $this->load->view($_SESSION['role'] . '/addUser');
    }
}
