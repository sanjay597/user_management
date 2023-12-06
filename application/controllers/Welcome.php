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
        if ($_SESSION['id']) {
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
        $validate_login['data']['dashboard_page'] = $validate_login['data']['role'] == 'user' ? 'dashboard' : ($validate_login['data']['role'] . '/dashboard');
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
        ];
        $res = $this->db->insert('user_master', $insertData);
        $this->errorResponse['page_url'] = $_SESSION['role'] . '/dashboard';
        if ($res) {
            $userId = $this->db->insert_id();
            $enc_key = PASSWORD_ENC_KEY;
            $password = rand(11111, 999999);
            $this->db->set('password', "AES_ENCRYPT('{$password}', '{$enc_key}')", false)->where('id = ' . $userId)->update('user_master');
            $this->errorResponse['success'] = 1;
            $this->errorResponse['message'] = 'User created successfully';
            echo json_encode($this->errorResponse);
            exit();
        } else {
            $this->errorResponse['message'] = 'User creation failed';
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
}
