<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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

    public function index()
    {
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            header('Location:' . base_url() . $_SESSION['role'] . '/dashboard');
        } else {
            $this->load->view('login');
        }
    }

    public function login()
    {
        if (!$this->input->is_ajax_request()) {
            $this->errorResponse['message'] = 'Invalid request';
            echo json_encode($this->errorResponse);
            exit();
        }

        if (empty($this->input->post('email'))) {
            echo json_encode(['success' => 0, 'message' => 'Email can\'t be empty']);
            exit();
        }
        if (empty($this->input->post('password'))) {
            echo json_encode(['success' => 0, 'message' => 'Password can\'t be empty']);
            exit();
        }
        //validate login
        $this->load->model('CommonModel', 'common');
        $validate_login = $this->common->validatelogin($this->input->post('email'), $this->input->post('password'));
        if ($validate_login['success'] == 0) {
            echo json_encode($validate_login);
            exit();
        }
        $_SESSION['id'] = $validate_login['data']['id'];
        $_SESSION['role'] = $validate_login['data']['role'];
        $_SESSION['name'] = $validate_login['data']['name'];
        $validate_login['data']['dashboard_page'] = ($validate_login['data']['role'] . '/dashboard');
        echo json_encode($validate_login);
        exit();
    }

    public function getUsers()
    {
        if ($_SESSION['role'] == 'user') {
            $this->errorResponse['message'] = 'Access denied';
            echo json_encode($this->errorResponse);
            exit();
        }
        if (!$this->input->is_ajax_request()) {
            $this->errorResponse['message'] = 'Invalid request';
            echo json_encode($this->errorResponse);
            exit();
        }
        $this->load->model('CommonModel', 'common');
        $response = $this->common->getUsers();
        $response['can_edit'] = $_SESSION['role'] == 'superadmin' ? true : false;
        $response['can_delete'] = $_SESSION['role'] == 'user' ? false : true;
        $response['can_add'] = $_SESSION['role'] == 'user' ? false : true;
        echo json_encode($response);
        exit();
    }

    public function addUser()
    {
        if (!isset($_POST['userId']) && $_SESSION['role'] == 'user') {
            $this->errorResponse['message'] = 'Access denied';
            echo json_encode($this->errorResponse);
            exit();
        }
        if (!$this->input->is_ajax_request()) {
            $this->errorResponse['message'] = 'Invalid request';
            echo json_encode($this->errorResponse);
            exit();
        }
        $picArr = [];
        if (!isset($_POST['userId'])) {
            $picArr = ['profile_pic', 'signature'];
        }
        $keyArr = ['name', 'mobile', 'email', 'address', 'gender', 'dob'];
        array_merge($keyArr, $picArr);
        $this->validateParams($keyArr, $_POST);
        //upload profile pic
        if (!empty($_POST['profile_pic'])) {
            $destinationPath = "assets/user/profile/";
            $profile_capture_part1 = explode(";base64,", $_POST['profile_pic']);
            $image_base641 = base64_decode($profile_capture_part1[1]);
            $extPart1 = explode(':', $profile_capture_part1[0]);
            $ext1 = explode('/', $extPart1[1]);
            $myimgName1 = 'profile_pic_' . time() . '.' . $ext1[1];
            $file1 = $destinationPath . $myimgName1;
            file_put_contents($file1, $image_base641);
        } else {
            $file1 = $_POST['old_pic'];
        }

        //upload signature
        if (!empty($_POST['signature'])) {
            $destinationPathSign = "assets/user/signature/";
            $sign_capture_part1 = explode(";base64,", $_POST['signature']);
            $image_base642 = base64_decode($sign_capture_part1[1]);
            $extPart1 = explode(':', $sign_capture_part1[0]);
            $ext1 = explode('/', $extPart1[1]);
            $myimgName2 = 'signature' . time() . '.' . $ext1[1];
            $file2 = $destinationPathSign . $myimgName2;
            file_put_contents($file2, $image_base642);
        } else {
            $file2 = $_POST['old_sign'];
        }
        $extraArr = [];
        if (!isset($_POST['userId'])) {
            $extraArr = ['created_by' => $_SESSION['id'], 'created_date' => date('Y-m-d H:i:s')];
        }
        $insertData = [
            'name' => $this->input->post('name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'profile_pic' => $file1,
            'signature' => $file2,
            'role' => 'user',
            'updated_by' => $_SESSION['id'],
            'updated_date' => date('Y-m-d H:i:s'),
        ];
        array_merge($insertData, $extraArr);
        if (isset($_POST['userId'])) {
            $res = $this->db->set($insertData)->where('id', $_POST['userId'])->update('user_master');
        } else {
            $res = $this->db->insert('user_master', $insertData);
        }
        $this->errorResponse['page_url'] = $_SESSION['role'] . '/dashboard';
        if ($res) {
            $userId = isset($_POST['userId']) ? isset($_POST['userId']) : $this->db->insert_id();
            if (!isset($_POST['userId'])) {
                $enc_key = PASSWORD_ENC_KEY;
                $password = rand(11111, 999999);
                $this->db->set('password', "AES_ENCRYPT('{$password}', '{$enc_key}')", false)->where('id = ' . $userId)->update('user_master');
            }
            $this->errorResponse['success'] = 1;
            $this->errorResponse['message'] = 'User ' . (isset($_POST['userId']) ? "updated" : "created") . ' successfully';
            echo json_encode($this->errorResponse);
            exit();
        } else {
            $this->errorResponse['message'] = 'User ' . (isset($_POST['userId']) ? "updation" : "creation") . ' failed';
            echo json_encode($this->errorResponse);
            exit();
        }
    }

    private function validateParams($keyArr, $data)
    {
        for ($i = 0; $i < count($keyArr); $i++) {
            if (empty($data[$keyArr[$i]])) {
                $this->errorResponse['message'] = $keyArr[$i] . ' can\'t be empty';
                echo json_encode($this->errorResponse);
                exit();
            }
        }
    }

    public function deleteUser()
    {
        if ($_SESSION['role'] == 'user') {
            $this->errorResponse['message'] = 'Access denied';
            echo json_encode($this->errorResponse);
            exit();
        }
        if (!$this->input->is_ajax_request()) {
            $this->errorResponse['message'] = 'Invalid request';
            echo json_encode($this->errorResponse);
            exit();
        }
        $res = $this->db->set('status', '1-status', false)->where('id', $this->input->post('id'))->update('user_master');
        if ($res) {
            $this->errorResponse['success'] = 1;
            $this->errorResponse['message'] = 'User status changed successfully';
            echo json_encode($this->errorResponse);
            exit();
        } else {
            $this->errorResponse['message'] = 'User status change failed';
            echo json_encode($this->errorResponse);
            exit();
        }
    }

    public function editUser($id)
    {
        if ($_SESSION['role'] == 'user') {
            $this->errorResponse['message'] = 'Access denied';
            echo json_encode($this->errorResponse);
            exit();
        }
        $userData = $this->db->select('id, name, mobile, email, address, gender, dob, profile_pic, signature')->from('user_master')->where('id', $id)->get()->row_array();
        if (!$userData) {
            $this->errorResponse['message'] = 'User data not found';
            echo json_encode($this->errorResponse);
            exit();
        }
        $this->load->view($_SESSION['role'] . '/editUser', ['data' => $userData]);
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }

    public function register()
    {
        if (!$this->input->is_ajax_request()) {
            $this->errorResponse['message'] = 'Invalid request';
            echo json_encode($this->errorResponse);
            exit();
        }
        $keyArr = ['name', 'mobile', 'email', 'address', 'gender', 'dob', 'profile_pic', 'signature'];
        $this->validateParams($keyArr, $_POST);
        //upload profile pic
        $destinationPath = "assets/user/profile/";
        $profile_capture_part1 = explode(";base64,", $_POST['profile_pic']);
        $image_base641 = base64_decode($profile_capture_part1[1]);
        $extPart1 = explode(':', $profile_capture_part1[0]);
        $ext1 = explode('/', $extPart1[1]);
        $myimgName1 = 'profile_pic_' . time() . '.' . $ext1[1];
        $file1 = $destinationPath . $myimgName1;
        file_put_contents($file1, $image_base641);

        //upload signature
        $destinationPathSign = "assets/user/signature/";
        $sign_capture_part1 = explode(";base64,", $_POST['signature']);
        $image_base642 = base64_decode($sign_capture_part1[1]);
        $extPart1 = explode(':', $sign_capture_part1[0]);
        $ext1 = explode('/', $extPart1[1]);
        $myimgName2 = 'signature' . time() . '.' . $ext1[1];
        $file2 = $destinationPathSign . $myimgName2;
        file_put_contents($file2, $image_base642);
        $insertData = [
            'name' => $this->input->post('name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'profile_pic' => $file1,
            'signature' => $file2,
            'role' => 'user',
            'updated_date' => date('Y-m-d H:i:s'),
            'created_date' => date('Y-m-d H:i:s'),
            'status' => 2,
        ];
        $res = $this->db->insert('user_master', $insertData);

        if ($res) {
            $userId = isset($_POST['userId']) ? isset($_POST['userId']) : $this->db->insert_id();
            if (!isset($_POST['userId'])) {
                $enc_key = PASSWORD_ENC_KEY;
                $password = rand(11111, 999999);
                $this->db->set('password', "AES_ENCRYPT('{$password}', '{$enc_key}')", false)->where('id = ' . $userId)->update('user_master');
            }
            $this->errorResponse['page_url'] = base_url();
            $this->errorResponse['success'] = 1;
            $this->errorResponse['message'] = 'You have registered successfully';
            echo json_encode($this->errorResponse);
            exit();
        } else {
            $this->errorResponse['message'] = 'User registration failed';
            echo json_encode($this->errorResponse);
            exit();
        }
    }

    public function actionUser()
    {
        if ($_SESSION['role'] == 'user') {
            $this->errorResponse['message'] = 'Access denied';
            echo json_encode($this->errorResponse);
            exit();
        }
        if (!$this->input->is_ajax_request()) {
            $this->errorResponse['message'] = 'Invalid request';
            echo json_encode($this->errorResponse);
            exit();
        }
        $res = $this->db->set('status', $this->input->post('status'), false)->where('id', $this->input->post('id'))->update('user_master');
        if ($res) {
            $this->errorResponse['success'] = 1;
            $this->errorResponse['message'] = 'User status changed successfully';
            echo json_encode($this->errorResponse);
            exit();
        } else {
            $this->errorResponse['message'] = 'User status change failed';
            echo json_encode($this->errorResponse);
            exit();
        }
    }
}
