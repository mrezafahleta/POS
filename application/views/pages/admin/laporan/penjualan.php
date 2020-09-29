<div class="content-wrapper">
    <section class="content header pt-3 pb-3">
        <div class="container-fluid">
            <h3>Laporan Penjualan</h3>

        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <form action="<?= base_url('admin/laporan/cetakpdfFilterPenjualan') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Dari tanggal</label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-check"></i></span>
                                    </div>

                                    <input type="date" id="" class="form-control font-weight-bold" name="tanggal_awal" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Dari tanggal</label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-check"></i></span>
                                    </div>

                                    <input type="date" autocomplete="off" id="" class="form-control font-weight-bold" name="tanggal_akhir" required>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">

                                <button type="submit" class="btn btn-primary mt-4"> <i class="fa fa-file-alt"> Tampilkan Data</i> </button>
                                <a href="<?= base_url('admin/laporan/resetData') ?>" class="btn btn-success mt-4"><i class="fa fa-sync-alt"> Refresh Data</i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="<?= base_url('admin/laporan/cetakpdfPenjualan') ?>" class="btn btn-warning mt-4 text-white"><i class="fa fa-print"> Cetak PDF</i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                            <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Pembeli</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Tanggal Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($content as $row) :  ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->stok_title ?></td>
                                    <td>
                                                <input type="text" hidden name="id" value="<?php echo $row->id_penjualan ?>">
                                                <a href="#detailPembeli<?= $row->id_penjualan ?>" data-toggle="modal" class="text-red"><?= $row->nama ?></a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="detailPembeli<?= $row->id_penjualan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detail Pembeli</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Nama</th>
                                                                        <td><?= $row->nama ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Alamat</th>
                                                                        <td><?= $row->alamat ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>No Hp :</th>
                                                                        <td><?= $row->nohp ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                        </div>
                        </td>
                                    <td>Rp.<?= number_format($row->harga, 0, ',', '.') ?></td>
                                    <td><?= $row->jumlah ?></td>
                                    <td>Rp.<?= number_format($row->total, 0, ',', '.') ?></td>
                                    <td><?= date('d-m-Y', strtotime($row->tanggal_beli)) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
</div>