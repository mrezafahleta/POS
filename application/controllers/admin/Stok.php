<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends MY_Controller
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
        $data['datajoin'] = $this->Stok_model->tampildata();
        $data['title'] = "Stok Barang";
        $data['content'] = $this->Stok_model->tampilKategori();

        $data['page']  = 'pages/admin/stok/index';
        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->stok->getDefaultValues();
        } else {
            $id_kategori = htmlspecialchars($this->input->post('id_kategori'));
            $title = htmlspecialchars($this->input->post('title'));
            $hpp  = htmlspecialchars($this->input->post('hpp'));
            $jumlah = htmlspecialchars($this->input->post('jumlah'));
            $total = str_replace('.', '', $this->input->post('total'));
            $tanggal_masuk = htmlspecialchars($this->input->post('tanggal_masuk'));
            $stok_akhir = $jumlah;
        }

        if (!$this->stok->validate()) {
            $data['title'] =     'Tambah Stok';
            $data['form_action'] = ('admin/stok/create');
            $data['content']     = $this->stok->tampilKategori();
            $data['page']    =    'pages/admin/stok/create';

            $this->view($data);
            return;
        }
        $data = [
            'id_kategori' => $id_kategori,
            'title' => $title,
            'hpp' => $hpp,
            'jumlah' => $jumlah,
            'total' => $total,
            'tanggal_masuk' => $tanggal_masuk,
            'stok_akhir' => $stok_akhir
        ];
        $this->stok->create($data);
        $this->session->set_flashdata('success', 'Data Berhasil disimpan');
        redirect(base_url('admin/stok'));
    }

    public function edit($id)
    {
        $data['content'] = $this->stok->where('id', $id)->first();
        $data['joindata']    = $this->stok->tampildataKategori($id);

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan!');
            redirect(base_url('/admin/stok'));
        }


        if (!$this->stok->validate()) {
            $data['title'] =     'Edit Kategori';
            $data['form_action'] = "admin/stok/update";
            $data['kategori']    = $this->stok->tampilKategori();


            $data['page']    =    'pages/admin/stok/edit';
            $this->view($data);
            return;
        }
    }


    public function update()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $id_kategori = htmlspecialchars($this->input->post('id_kategori'));
        $title = htmlspecialchars($this->input->post('title'));
        $hpp  = htmlspecialchars($this->input->post('hpp'));
        $jumlah = htmlspecialchars($this->input->post('jumlah'));
        $total = str_replace('.', '', $this->input->post('total'));
        $tanggal_masuk = htmlspecialchars($this->input->post('tanggal_masuk'));


        $data = [
            'id' => $id,
            'id_kategori' => $id_kategori,
            'title' => $title,
            'hpp' => $hpp,
            'jumlah' => $jumlah,
            'total' => $total,
            'tanggal_masuk' => $tanggal_masuk,

        ];

        if ($this->stok->where('id', $id)->update($data)) {
            $this->session->set_flashdata('success', 'Data Berhasil diperbarui');
            redirect(base_url('admin/stok'));
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect(base_url('admin/stok'));
        }

        redirect(base_url('/admin/stok'));
    }

    public function delete($id)
    {
        if ($this->stok->where('id', $id)->first()) {
            $this->session->flashdata('warning', 'Maaf data tidak ditemukan');
        }

        if ($this->stok->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->flashdata('error', 'Oops, Terjadi kesalahan');
        }

        redirect(base_url('/admin/stok'));
    }
}

/* End of file Stok.php */
