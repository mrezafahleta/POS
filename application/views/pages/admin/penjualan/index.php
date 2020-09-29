<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penjualan</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('warning') ?>"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/penjualan/create') ?>" class="btn btn-success"><i class="fa fa-plus"> Tambah Data Penjualan</i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Pembeli</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Tanggal Jual</th>
                                        <th>Aksi</th>
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
                
                        <td style="width: 100px;">

                            <input type="text" hidden name="id" value="<?php echo $row->id_penjualan ?>">
                            <input type="text" name="id" value="" hidden>
                            <a href="<?= base_url("admin/penjualan/edit/$row->id_penjualan") ?>" class="btn btn-warning"><i class="fas fa-edit text-light"></i>
                            </a>
                            <a href="<?php echo base_url("admin/penjualan/delete/$row->id_penjualan") ?>" class="btn btn-danger text-light tombol-hapus"><i class="fas fa-trash"></i></a>

                        </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>

                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>



<script>
    function tambah() {
        var hpp = document.getElementById('hpp').value;
        var jumlah = document.getElementById('jumlah').value;
        var format = hpp.replace(".", "");
        var total = parseInt(hpp) * parseInt(jumlah);

        document.getElementById('total').value = total;
        console.log(total);
    }

    const flashdata = $('.flash-data').data('flashdata');

    if (flashdata) {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?php echo $this->session->flashdata('success') ?>",
            showConfirmButton: true,
            timer: 3500,
        });

    }

    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();

        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus data ?',
            text: "Data yang terhapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batalkan'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>