<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CommonModel extends CI_Model
{

    public $datetime = '';
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }
    public function validatelogin($email, $password)
    {
        $enc_key = PASSWORD_ENC_KEY;
        $query = "SELECT id, name, email, role FROM user_master WHERE email = ? AND status = 1 AND aes_decrypt(password, ?) = ?";
        $res = $this->db->query($query, ["$email", "$enc_key", "$password"]);
        if ($res->num_rows() > 0) {
            $response = ['success' => 1, 'data' => $res->row_array()];
        } else {
            $response = ['success' => 0, 'message' => 'Invalid credientials'];
        }
        return $response;
    }

    public function getUsers()
    {
        $query = "SELECT id, name, role, mobile, email, address, gender, dob, status, created_by, created_date FROM user_master WHERE role = 'user'";
        $res = $this->db->query($query);
        if ($res->num_rows() > 0) {
            $response = ['success' => 1, 'data' => $res->result_array()];
        } else {
            $response = ['success' => 0, 'message' => 'No users found'];
        }
        return $response;
    }
}
