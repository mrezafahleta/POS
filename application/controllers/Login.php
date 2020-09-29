<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');

        if ($is_login) {
            redirect(base_url());
            return;
        }
    }

    public function index()
    {
        if (!$_POST) {
            $input = (object) $this->login->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {
            $data['title'] = "POS";
            $data['input'] = $input;
            $this->load->view('pages/auth/login', $data);
            return;
        }

        try {
            // Login disini adalah Login_model yang di persingkat url
            $this->login->run($input);
            $this->session->set_flashdata('success', 'Berhasil login');
            redirect(base_url('admin/dashboard'));
        } catch (Exception $ejak) {
            $this->session->set_flashdata('error', $ejak->getMessage());
            redirect(base_url('/login'));
        }
    }
}

/* End of file Login.php */