<div class="content-wrapper">

    <section class="content mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Form Input Penjualan</h5>
                <div class="">
                    <?php $this->load->view('layout/_alert'); ?>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('admin/penjualan/update') ?>" method="POST">
                    <input type="text" name="id" id="id" value="<?= $content->id ?>" hidden>
                    <div class="d-flex justify-content-lg-end">
                        <label for="" class="">Tanggal</label>
                    </div>
                    <div class="d-flex justify-content-lg-end">
                        <div class="col-lg-4">
                            <input type="date" name="tanggal_beli" id="tanggal_beli" class="form-control mb-3 text-center" value="<?= $content->tanggal_beli ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 ml-auto">

                            <div class="form-group">
                                <label for="">Nama Pembeli</label>
                                <input type="text" class="form-control w-75" name="nama" placeholder="Nama Pembeli" required value="<?= $content->nama ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control w-75" name="alamat" placeholder="Alamat" required value="<?= $content->alamat ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Nomor HP</label>
                                <input type="text" class="form-control w-75" name="nohp" placeholder="Nomor Hp" required value="<?= $content->nohp ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <input type="text" id="id_stok" name="id_stok" value="<?= $joindata->id_stok ?>" hidden>
                                <button type="button" data-toggle="modal" data-target="#kategori-modal" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>
                                <input type="text" class="form-control w-75" name="title" " id=" title" value="<?= $joindata->stok_title ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Harga Jual</label>
                                <input type="number" class="form-control w-75" onkeypress="return angka(event)" name="harga" placeholder="Harga Jual" id="harga" onkeyup="tambah()" required value="<?= $content->harga ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" class="form-control w-75" onkeypress="return angka(event)" name="jumlah" id="jumlah" placeholder="Jumlah Barang" onkeyup="tambah()" required value="<?= $content->jumlah ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="text" class="form-control w-75 text-right" name="total" id="total" placeholder="Total Harga keseluruhan" readonly value="<?= $content->total ?>">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/kategori') ?>" class="btn btn-info">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>

<div class="modal fade" id="kategori-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="text-center">Stok Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Pilih Kategori</h4>
                <table id="tablePenjualan" class="table table-bordered table-striped ">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama Barang</th>
                            <th>HPP</th>

                            <th>Sisa Stok</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($datastok as $stok) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $stok->title ?></td>
                                <td><?= $stok->nama_barang ?></td>
                                <td><?= $stok->hpp ?></td>
                                <td><?= $stok->stok_akhir ?></td>

                                <td>
                                    <button class="btn btn-success" id="pilih" data-id="<?= $stok->id ?>" data-title="<?= $stok->title ?>" data-hpp="<?= $stok->hpp ?>">
                                        <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

<!-- Format Angka -->
<script src="<?php echo base_url('/assets/js/jquery.price_format.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.price_format.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#pilih', function() {
            // data adalah field yang di dalam kolom tabel
            var id_stok = $(this).data('id');
            var title = $(this).data('title');
            var harga = $(this).data('hpp');

            $('#id_stok').val(id_stok);
            $('#title').val(title);
            $('#harga').val(harga);
            $('#kategori-modal').modal('hide');
        })
    })




    function angka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;

    }

    $(function() {
        $('#tablePenjualan').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    function tambah() {

        var hpp = document.getElementById('harga').value;
        var jumlah = document.getElementById('jumlah').value;
        var format = hpp.replace(".", "");
        var total = parseInt(hpp) * parseInt(jumlah);

        document.getElementById('total').value = total;
        console.log(total);

        $('#total').priceFormat({
            prefix: '',
            // centsSeparator: '',
            centsLimit: 0,
            thousandsSeparator: '.'
        });
    }
</script>