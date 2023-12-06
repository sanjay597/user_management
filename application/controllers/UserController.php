<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
    public function dashboard()
    {
        $userId = $_SESSION['id'];
        $userData = $this->db->select('id, name, mobile, email, address, gender, dob, profile_pic, signature')->from('user_master')->where('id', $userId)->get()->row_array();
        if (!$userData) {
            $this->errorResponse['message'] = 'User data not found';
            echo json_encode($this->errorResponse);
            exit();
        }
        $this->load->view('user/dashboard', ['data' => $userData]);
    }
}
