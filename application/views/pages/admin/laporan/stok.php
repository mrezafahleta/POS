<div class="content-wrapper">
    <section class="content header pt-3 pb-3">
        <div class="container-fluid">
            <h3>Laporan Stok</h3>

        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <form action="<?= base_url('admin/laporan/cetakpdfFilter') ?>" method="POST">
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
                                <a href="<?= base_url('admin/laporan/cetakpdf') ?>" class="btn btn-warning mt-4 text-white"><i class="fa fa-print"> Cetak PDF</i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>HPP</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Sisa Stok</th>
                                <th>Tanggal Masuk</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($datajoin as $stok) :  ?>
                                <tr class="text-center">
                                    <td><?= $no++ ?></td>
                                    <td><?= $stok->title ?></td>
                                    <td><?= $stok->nama_barang ?></td>
                                    <td class="text-right">Rp. <?= number_format($stok->hpp, 0, ',', '.') ?></td>
                                    <td class="text-center"><?= number_format($stok->jumlah, 0, ',', '.') ?></td>
                                    <td class="text-right">Rp. <?= number_format($stok->total, 0, ',', '.') ?></td>
                                    <td><?= $stok->stok_akhir ?></td>
                                    <td><?= date('d-m-Y', strtotime($stok->tanggal_masuk)) ?></td>

                                </tr>


                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
</div>