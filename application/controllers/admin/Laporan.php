<?php


class Laporan extends MY_Controller
{

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    public function laporan_stok()
    {
        if (!$_POST) {
            $data['datajoin'] = $this->Stok_model->tampildata();
            $data['title'] = 'Laporan Data Penjualan';
            $data['page']  = 'pages/admin/laporan/stok';
            $tanggalAwal = "2020-08-01";
            $tanggalAkhir = "2020-08-31";

            $this->view($data);
        } else {
            $this->_tampilDataStokBulanan();
        }
    }



    private function _tampilDataStokBulanan()
    {
        $tanggalAwal = $this->input->post('tanggal_awal');
        $tanggalAkhir = $this->input->post('tanggal_akhir');

        $data['datajoin'] = $this->Stok_model->laporanPerbulan($tanggalAwal, $tanggalAkhir);
        $data['title'] = 'Laporan Data Penjualan';
        $data['page']  = 'pages/admin/laporan/stok';
        $this->view($data);
    }

    public function cetakpdfFilter()
    {
        $tanggalAwal = $this->input->post('tanggal_awal');
        $tanggalAkhir = $this->input->post('tanggal_akhir');


        $pdf  = new FPDF('P','mm','A4');
        $pdf->setLeftMargin(6);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','16');
        $pdf->Cell(190,7,'Laporan Stok Barang',0,1,'C');
        $pdf->SetFont('Arial','I','14');
        $pdf->Cell(190,7,'Stok Bulanan',0,1,'C');
        
        
        $pdf->Cell(50,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,7,'No',1,0,'C');
        $pdf->Cell(40,7,'Kategori',1,0,'C');
        $pdf->Cell(60,7,'Barang',1,0,'C');
        $pdf->Cell(20,7,'hpp',1,0,'C');
        $pdf->Cell(18,7,'Stok',1,0,'C');
        $pdf->Cell(18,7,'S.Akhir',1,0,'C');
        $pdf->Cell(30,7,'tanggal_masuk',1,1,'C');
        $pdf->SetFont('Arial','B','10');

        $datajoin = $this->Stok_model->laporanPerbulan($tanggalAwal, $tanggalAkhir);
        $no = 1;
        foreach($datajoin as $row){
            $pdf->Cell(10,7,$no++,1,0,'C');
            $pdf->Cell(40,7,$row->title,1,0,'C');
            $pdf->Cell(60,7,$row->nama_barang,1,0,'C');
            $pdf->Cell(20,7,number_format($row->hpp,0,',','.'),1,0,'C');
            $pdf->Cell(18,7,$row->jumlah,1,0,'C');
            $pdf->Cell(18,7,$row->stok_akhir,1,0,'C');
            $pdf->Cell(30,7,date('d-m-Y', strtotime($row->tanggal_masuk)),1,1,'C');
           
        }

        $pdf->Output();

    }

    public function cetakpdf()
    {
        $pdf  = new FPDF('P','mm','A4');
        $pdf->setLeftMargin(6);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','16');
        $pdf->Cell(190,7,'Laporan Stok Barang',0,1,'C');
        $pdf->SetFont('Arial','I','11');
        $pdf->Cell(190,7,'Seluruh Stok Barang',0,1,'C');
      
        
        $pdf->Cell(50,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,7,'No',1,0,'C');
        $pdf->Cell(40,7,'Kategori',1,0,'C');
        $pdf->Cell(60,7,'Barang',1,0,'C');
        $pdf->Cell(20,7,'hpp',1,0,'C');
        $pdf->Cell(18,7,'Stok',1,0,'C');
        $pdf->Cell(18,7,'S.Akhir',1,0,'C');
        $pdf->Cell(30,7,'tanggal_masuk',1,1,'C');
        $pdf->SetFont('Arial','B','10');

        $datajoin = $this->Stok_model->tampildata();
        $no = 1;
        foreach($datajoin as $row){
            $pdf->Cell(10,7,$no++,1,0,'C');
            $pdf->Cell(40,7,$row->title,1,0,'C');
            $pdf->Cell(60,7,$row->nama_barang,1,0,'C');
            $pdf->Cell(20,7,number_format($row->hpp,0,',','.'),1,0,'C');
            $pdf->Cell(18,7,$row->jumlah,1,0,'C');
            $pdf->Cell(18,7,$row->stok_akhir,1,0,'C');
            $pdf->Cell(30,7,date('d-m-Y', strtotime($row->tanggal_masuk)),1,1,'C');
           
        }

        $pdf->Output();
    }

    // Laporan Penjualan

    public function laporan_penjualan()
    {
        if (!$_POST) {
            $data['content'] = $this->Penjualan_model->tampildata();
            $data['title'] = 'Laporan Data Penjualan';
            $data['page']  = 'pages/admin/laporan/penjualan';
            $tanggalAwal = "2020-08-01";
            $tanggalAkhir = "2020-08-31";

            $this->view($data);
        } else {
            $this->_tampilDataStokBulanan();
        }
    }

    public function cetakpdfPenjualan()
    {
        $pdf  = new FPDF('P','mm','A4');
        $pdf->setLeftMargin(6);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','16');
        $pdf->Cell(190,7,'Laporan Penjualan Barang',0,1,'C');
        $pdf->SetFont('Arial','I','11');
        $pdf->Cell(190,7,'Seluruh Penjualan Barang',0,1,'C');
      
        
        $pdf->Cell(50,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,7,'No',1,0,'C');
        $pdf->Cell(40,7,'Nama Barang',1,0,'C');
        $pdf->Cell(60,7,'Nama Pembeli',1,0,'C');
        $pdf->Cell(20,7,'Harga',1,0,'C');
        $pdf->Cell(18,7,'Jumlah',1,0,'C');
        $pdf->Cell(20,7,'Total',1,0,'C');
        $pdf->Cell(30,7,'Tanggal Jual',1,1,'C');
        $pdf->SetFont('Arial','B','10');

        $datajoin = $this->Penjualan_model->tampildata();
        $no = 1;
        foreach($datajoin as $row){
            $pdf->Cell(10,7,$no++,1,0,'C');
            $pdf->Cell(40,7, $row->stok_title,1,0,'C');
            $pdf->Cell(60,7,$row->nama,1,0,'C');
            $pdf->Cell(20,7,number_format($row->harga,0,',','.'),1,0,'C');
            $pdf->Cell(18,7,$row->jumlah,1,0,'C');
            $pdf->Cell(20,7,number_format($row->total,0,',','.'),1,0,'C');
            $pdf->Cell(30,7,date('d-m-Y', strtotime($row->tanggal_beli)),1,1,'C');
           
        }

        $pdf->Output();
    }

    public function cetakpdfFilterPenjualan()
    {
        $tanggalAwal = $this->input->post('tanggal_awal');
        $tanggalAkhir = $this->input->post('tanggal_akhir');


        $pdf  = new FPDF('P','mm','A4');
        $pdf->setLeftMargin(6);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','16');
        $pdf->Cell(190,7,'Laporan Penjualan Barang',0,1,'C');
        $pdf->SetFont('Arial','I','14');
        $pdf->Cell(190,7,'Penjualan Bulanan',0,1,'C');
        
        $pdf->Cell(50,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,7,'No',1,0,'C');
        $pdf->Cell(40,7,'Nama Barang',1,0,'C');
        $pdf->Cell(60,7,'Nama Pembeli',1,0,'C');
        $pdf->Cell(20,7,'Harga',1,0,'C');
        $pdf->Cell(18,7,'Jumlah',1,0,'C');
        $pdf->Cell(20,7,'Total',1,0,'C');
        $pdf->Cell(30,7,'Tanggal Beli',1,1,'C');
        $pdf->SetFont('Arial','B','10');
        
 

        $datajoin = $this->Penjualan_model->laporanPerbulan($tanggalAwal, $tanggalAkhir);
        $no = 1;
        foreach($datajoin as $row){
            $pdf->Cell(10,7,$no++,1,0,'C');
            $pdf->Cell(40,7, $row->stok_title,1,0,'C');
            $pdf->Cell(60,7,$row->nama,1,0,'C');
            $pdf->Cell(20,7,number_format($row->harga,0,',','.'),1,0,'C');
            $pdf->Cell(18,7,$row->jumlah,1,0,'C');
            $pdf->Cell(20,7,number_format($row->total,0,',','.'),1,0,'C');
            $pdf->Cell(30,7,date('d-m-Y', strtotime($row->tanggal_beli)),1,1,'C');
           
        }

        $pdf->Output();

    }



    public function resetData()
    {
        redirect(base_url('admin/laporan'));
    }
}
