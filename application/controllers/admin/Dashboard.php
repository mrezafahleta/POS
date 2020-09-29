<?php


class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');

        if (!$is_login) {
            redirect(base_url('/login'));
            return;
        }

        $this->load->model('Dashboard_model');
    }
    public function index()
    {
        $data['jumlahPenjualan'] = $this->Dashboard_model->tampilSeluruhPenjualan();
        $data['totalPenjualan'] = $this->Dashboard_model->totalPenjualan();
        $data['labaBersih'] = $this->Dashboard_model->labaBersih();
       
        $data['title']  = "Dashboard";
        $data['page'] = "pages/admin/dashboard/index";

        $this->view($data);
    }
}
