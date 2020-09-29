<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Stok_model extends MY_Model
{



    public function tampilKategori()
    {
        return $this->db->get('kategori')->result();
    }


    public function tampildata()
    {
        $this->db->select('stok.id,stok.stok_akhir,stok.id_kategori,kategori.title,stok.title as nama_barang,stok.hpp,stok.jumlah,stok.total,stok.tanggal_masuk');
        $this->db->from('stok', 'kategori');
        $this->db->join('kategori', 'stok.id_kategori = kategori.id');
        $query = $this->db->get()->result();
        return $query;
    }
    public function tampildataKategori($id)
    {
        $this->db->select('stok.id,stok.stok_akhir,stok.id_kategori,kategori.title,stok.title as nama_barang,stok.hpp,stok.jumlah,stok.total,stok.tanggal_masuk');
        $this->db->from('stok', 'kategori');
        $this->db->join('kategori', 'stok.id_kategori = kategori.id');
        $this->db->where('stok.id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function tampilStokAkhir($id)
    {
        $this->db->select('stok_akhir');
        $this->db->from('stok');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    // fungsi mengurutkan data berdasarkan tanggal
    public function laporanPerbulan($tanggalawal, $tanggalakhir)
    {
        $this->db->select('stok.id,stok.stok_akhir,stok.id_kategori,kategori.title,stok.title as nama_barang,stok.hpp,stok.jumlah,stok.total,stok.tanggal_masuk');
        $this->db->from('stok', 'kategori');
        $this->db->join('kategori', 'stok.id_kategori = kategori.id');
        $this->db->where('tanggal_masuk >=', $tanggalawal);
        $this->db->where('tanggal_masuk <=', $tanggalakhir);
        $query = $this->db->get()->result();
        return $query;
    }


    public function getDefaultValues()
    {
        return [
            'id_kategori'   => '',
            'title'         => '',
            'hpp'           => '',
            'jumlah'        => '',
            'total'         => '',
            'tanggal_masuk'  => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'id_kategori',
                'label' => 'Kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'hpp',
                'lbael' => 'Hpp',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'jumlah',
                'lbael' => 'Jumlah',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'total',
                'lbael' => 'Total',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tanggal_masuk',
                'lbael' => 'Tanggal',
                'rules' => 'trim|required'
            ]


        ];


        return $validationRules;
    }
}

/* End of file Stok_model.php */
