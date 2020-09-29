<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h3>Stok Barang</h3>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
            <?= form_error('title') ?>
            <div class="card">

                <div class="card-body">

                    <a href="<?= base_url('admin/stok/create') ?>" class="btn btn-success text-white mb-3"><i class="fa fa-plus"> Tambah Data Kategori</i></a>


                    <table id="myTable" class="table table-bordered table-striped ">
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
                                <th>Aksi</th>
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

                                    <td class="w-25">
                                        <form action="" method="POST">
                                            <input type="text" hidden name="id" value="<?php echo $stok->id ?>">
                                            <input type="text" name="id" value="" hidden>
                                            <a href="<?= base_url("admin/stok/edit/$stok->id") ?>" class="btn btn-warning text-white font-weight-bold"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url("admin/stok/delete/$stok->id") ?>" class="btn btn-danger text-light tombol-hapus"><i class="fa fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>


                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $("#coba").click(function() {
        $("").hide();
    });

    $("#tes").click(function() {
        $("#text").hide();
    })

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