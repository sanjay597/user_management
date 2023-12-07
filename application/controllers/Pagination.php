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
}
