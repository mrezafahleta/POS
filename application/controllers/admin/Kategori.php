<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');

        if (!$is_login) {
            redirect(base_url('/login'));
            return;
        }
    }

    public function index()
    {
        $input = "";
        $data['form_action'] = "";
        $data['title'] = 'Kategori';
        $data['content'] = $this->kategori->get();

        $data['page'] = 'pages/admin/kategori/index';
        $this->view($data);
        return;
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->kategori->getDefaultValues();
        } else {
            $title = $this->input->post('title');
        }

        if (!$this->kategori->validate()) {
            $data['title'] =     'Tambah Kategori';
            $data['form_action'] = ('admin/kategori/create');
            $data['page']    =    'pages/admin/kategori/create';

            $this->view($data);
            return;
        }

        if ($this->kategori->where('title', $title)->first() > 0) {
            $this->session->set_flashdata('error', 'Nama Kategori sudah ada');
            redirect(base_url('admin/kategori/create'));
        } else {
            $data = [
                'title' => $title
            ];
            $this->kategori->create($data);
            $this->session->set_flashdata('success','Data Berhasil diTambahkan');
            redirect(base_url('admin/kategori'));
        }
    }

    public function edit($id)
    {
        $data['content'] = $this->kategori->where('id', $id)->first();
        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan!');
            redirect(base_url('/admin/kategori'));
        }

        if (!$_POST) {
            $input = (object) $this->kategori->getDefaultValues();
        }

        if (!$this->kategori->validate()) {
            $data['title'] =     'Edit Kategori';
            $data['form_action'] = "admin/kategori/update";
            $data['page']    =    'pages/admin/kategori/edit';
        }
        $this->view($data);
        return;
    }

    public function update()
    {

        $id = htmlspecialchars($this->input->post('id'));
        $title = htmlspecialchars($this->input->post('title'));

        $data = [
            'id'    => $id,
            'title' => $title,
        ];



        if ($this->kategori->where('title', $title)->first() > 0) {
            $this->session->set_flashdata('error', 'Nama Kategori sudah ada');
            redirect(base_url("/admin/kategori/edit/$id"));
        } else {

            $this->kategori->where('id', $id)->update($data);
            $this->session->set_flashdata('success', 'Data Berhasil di Perbarui');
        }
        redirect(base_url('/admin/kategori'));
    }

    public function delete($id)
    {

        if ($this->kategori->where('id', $id)->first()) {
            $this->session->flashdata('warning', 'Maaf data tidak ditemukan');
        }

        if ($this->kategori->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->flashdata('error', 'Oops, Terjadi kesalahan');
        }

        redirect(base_url('admin/kategori'));
    }
}

/* End of file Stok.php */
