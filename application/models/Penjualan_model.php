<?php


class Penjualan_model extends MY_Model
{

    public function getDefaultValues()
    {
        return [
            'id_stok'       => '',
            'nama'          => '',
            'alamat'        => '',
            'nohp'          => '',
            'harga'         => '',
            'jumlah'        => '',
            'total'         => '',
            'tanggal_beli'  => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'id_stok',
                'label' => 'Stok',
                'rules' => 'required'
            ],
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nohp',
                'label' => 'Nohp',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'total',
                'label' => 'Total',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tanggal_beli',
                'label' => 'Tanggal',
                'rules' => 'trim|required'
            ]


        ];


        return $validationRules;
    }

    // memanggil data ditable stok
    public function stok()
    {
        return $this->db->get('stok')->result();
    }

    // tampil data yang saling berhubungan
    public function tampildataStok()
    {
        $this->db->select('stok.id,stok.stok_akhir,stok.id_kategori,kategori.title,stok.title as nama_barang,stok.hpp,stok.jumlah,stok.total,stok.tanggal_masuk');
        $this->db->from('stok', 'kategori');
        $this->db->join('kategori', 'stok.id_kategori = kategori.id');
        $query = $this->db->get()->result();
        return $query;
    }

    public function dataStok($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('stok')->row();
    }

    public function tampildata()
    {
        $this->db->select(
            'penjualan.id AS id_penjualan,
            penjualan.id_stok,
            penjualan.nama,
            penjualan.alamat,
            penjualan.nohp,
            penjualan.harga,
            penjualan.jumlah,
            penjualan.total,
            penjualan.tanggal_beli,
            stok.id,
            stok.title AS stok_title,
            stok.hpp AS stok_harga'
        );
        $this->db->from('penjualan', 'stok');
        $this->db->join('stok', 'penjualan.id_stok = stok.id');
        $query = $this->db->get()->result();
        return $query;
    }

    // Mengambil data berdasarkan id yang dipilih
    public function tampildataEdit($id)
    {
        $this->db->select(
            'penjualan.id AS id_penjualan,
            penjualan.id_stok,
            penjualan.nama,
            penjualan.alamat,
            penjualan.nohp,
            penjualan.harga,
            penjualan.jumlah,
            penjualan.total,
            penjualan.tanggal_beli,
            stok.id,
            stok.title AS stok_title,
            stok.hpp AS stok_harga'
        );
        $this->db->from('penjualan', 'stok');
        $this->db->join('stok', 'penjualan.id_stok = stok.id');
        $this->db->where('penjualan.id', $id);
        $query = $this->db->get()->row();
        return $query;
    }
    public function laporanPerbulan($tanggalawal, $tanggalakhir)
    {
        $this->db->select(
            'penjualan.id AS id_penjualan,
            penjualan.id_stok,
            penjualan.nama,
            penjualan.alamat,
            penjualan.nohp,
            penjualan.harga,
            penjualan.jumlah,
            penjualan.total,
            penjualan.tanggal_beli,
            stok.id,
            stok.title AS stok_title,
            stok.hpp AS stok_harga'
        );
        $this->db->from('penjualan', 'stok');
        $this->db->join('stok', 'penjualan.id_stok = stok.id');
        $this->db->where('penjualan.tanggal_beli >=', $tanggalawal);
        $this->db->where('penjualan.tanggal_beli <=', $tanggalakhir);
        $query = $this->db->get()->result();
        return $query;
    }
}
