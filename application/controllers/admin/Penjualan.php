<?php



class Penjualan extends MY_Controller
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
    $data['title'] = "Halaman Penjualan";
    $data['stok'] = $this->Penjualan_model->tampildataStok();
    $data['content'] = $this->Penjualan_model->tampildata();
    $data['page']  = 'pages/admin/penjualan/index';
    $this->view($data);
  }

  public function create()
  {

    if (!$this->penjualan->validate()) {
      $data['title']       = 'Input Penjualan';
      $data['datastok']    =  $this->Penjualan_model->tampildataStok();
      $data['page']        =  'pages/admin/penjualan/create';
      $this->view($data);
      return;
    }

    $id_stok = htmlspecialchars($this->input->post('id_stok'));
    $nama = htmlspecialchars($this->input->post('nama'));
    $alamat = htmlspecialchars($this->input->post('alamat'));
    $nohp = htmlspecialchars($this->input->post('nohp'));
    $harga = htmlspecialchars($this->input->post('harga'));
    $jumlah = htmlspecialchars($this->input->post('jumlah'));
    $total = str_replace('.', '', $this->input->post('total'));
    $tanggal_beli = htmlspecialchars($this->input->post('tanggal_beli'));

    $jumlahStok = $this->Penjualan_model->dataStok($id_stok);



    if ($jumlahStok->jumlah < $jumlah) {
      $this->session->set_flashdata('error', 'Stok tidak cukup');
      redirect(base_url('admin/penjualan/create'));
    } else {
      $data = [
        'id_stok' => $id_stok,
        'nama'    => $nama,
        'alamat'  => $alamat,
        'nohp'    => $nohp,
        'harga'   => $harga,
        'jumlah'  => $jumlah,
        'total'   => $total,
        'tanggal_beli' => $tanggal_beli
      ];
      $this->penjualan->create($data);
      $this->session->set_flashdata('success', 'Data Berhasil disimpan');
      redirect(base_url('admin/penjualan'));
    }
  }

  public function edit($id)
  {
    // Mengambil data penjualan berdasarkan id yang dipilih
    $data['content'] = $this->penjualan->where('id', $id)->first();

    // mengambil data penjualan dan stok berdasarkan id yang dipilih
    $data['joindata'] = $this->penjualan->tampildataEdit($id);


    if (!$data['content']) {
      $this->session->set_flashdata('warning', 'Data tidak ditemukan!');
      redirect(base_url('/admin/stok'));
    }


    if (!$this->penjualan->validate()) {
      $data['title'] = "Halaman Edit";
      $data['stok'] = $this->Penjualan_model->tampildataStok();
      $data['datastok']    =  $this->Penjualan_model->tampildataStok();
      $data['page']  = 'pages/admin/penjualan/edit';
      $this->view($data);
    }
  }

  public function update()
  {
    $id = htmlspecialchars($this->input->post('id'));
    $id_stok = htmlspecialchars($this->input->post('id_stok'));
    $nama = htmlspecialchars($this->input->post('nama'));
    $alamat = htmlspecialchars($this->input->post('alamat'));
    $nohp = htmlspecialchars($this->input->post('nohp'));
    $harga = htmlspecialchars($this->input->post('harga'));
    $jumlah = htmlspecialchars($this->input->post('jumlah'));
    $total = str_replace('.', '', $this->input->post('total'));
    $tanggal_beli = htmlspecialchars($this->input->post('tanggal_beli'));

    $data = [
      'id'      => $id,
      'id_stok' => $id_stok,
      'nama'    => $nama,
      'alamat'  => $alamat,
      'nohp'    => $nohp,
      'harga'   => $harga,
      'jumlah'  => $jumlah,
      'total'   => $total,
      'tanggal_beli' => $tanggal_beli
    ];

    if ($this->penjualan->where('id', $id)->update($data)) {
      $this->session->set_flashdata('success', 'Data Berhasil diperbarui');
      redirect(base_url('admin/penjualan'));
    } else {
      $this->session->set_flashdata('error', 'Terjadi kesalahan');
      redirect(base_url('admin/penjualan'));
    }

    redirect(base_url('/admin/penjualan'));
  }


  public function delete($id)
  {
    if ($this->penjualan->where('id', $id)->first()) {
      $this->session->flashdata('warning', 'Maaf data tidak ditemukan');
    }

    if ($this->penjualan->where('id', $id)->delete()) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus!');
    } else {
      $this->session->flashdata('error', 'Oops, Terjadi kesalahan');
    }

    redirect(base_url('admin/penjualan'));
  }
}
