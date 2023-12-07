<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public $errorResponse = [];
    public function __construct()
    {
        parent::__construct();
        $this->errorResponse = [
            'success' => 0,
            'message' => '',
        ];
    }
    public function dashboard()
    {
        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            $userData = $this->db->select('id, name, mobile, email, address, gender, dob, profile_pic, signature')->from('user_master')->where('id', $userId)->get()->row_array();
            if (!$userData) {
                $this->errorResponse['message'] = 'User data not found';
                echo json_encode($this->errorRespoFnse);
                exit();
            }
            $this->load->view('user/dashboard', ['data' => $userData]);
        } else {
            redirect(base_url());
        }
    }

    public function register()
    {
        $this->load->view('user/addUser');
    }
}
