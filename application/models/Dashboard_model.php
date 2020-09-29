<?php


class Dashboard_model extends MY_Model
{
    public function tampilSeluruhPenjualan()
    {
        $query = $this->db->get('penjualan');

        if ($query->num_rows() > 0) {
            return $query->num_rows;
        } else {
            return 0;
        }
    }

    public function totalPenjualan()
    {
        $this->db->select_sum('total');
        $query = $this->db->get('penjualan');

        if ($query->num_rows() > 0) {
            return $query->row()->total;
        } else {
            return 0;
        }
    }

    public function labaBersih()
    {
        $this->db->select('SUM(penjualan.total - stok.hpp) as totalLaba');
        $this->db->from('penjualan', 'stok');
        $this->db->join('stok', 'penjualan.id_stok = stok.id');
        $query = $this->db->get()->row()->totalLaba;
        return $query;
    }
}
