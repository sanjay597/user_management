<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagination extends CI_Controller
{

    public $errorResponse = [];

    public function __construct()
    {
        parent::__construct();
        $this->errorResponse = [
            'success' => 0,
            'message' => '',
        ];
        $this->load->library("pagination");
        $this->load->model('CommonModel');
    }

    public function index($rowno = 0)
    {
        $search_text = $this->input->post('search');
        $rowperpage = 10;
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        $allcount = $this->CommonModel->get_count($search_text);
        $users_record = $this->CommonModel->getPaginationUsers($rowno, $rowperpage, $search_text);
        $config['base_url'] = base_url() . 'getPageUsers';
        $config['use_page_numbers'] = true;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();
        $data['users'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->load->view('pagination_users', $data);
    }

    public function upload($id)
    {
        $this->load->view('upload_media', ['id' => $id]);
    }

    public function do_upload()
    {
        $target_dir = "assets/user/uploads/";
        $target_file = $target_dir . basename($_FILES["identity"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["identity"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["identity"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["identity"]["name"])) . " has been uploaded.";
                $this->db->set('identity_proof', htmlspecialchars(basename($_FILES["identity"]["name"])))->where('id', $_POST['userId'])->update('pagination_users');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
