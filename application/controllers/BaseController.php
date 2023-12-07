<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            header('Location:' . base_url() . $_SESSION['role'] . '/dashboard');
        } else {
            $this->load->view('login');
        }
    }
}
