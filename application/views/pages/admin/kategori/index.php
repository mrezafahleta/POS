<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h3>Kategori Barang</h3>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
        <div class="">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
    </div>
    <?= form_error('title') ?>
    <div class="card">
        <!-- <button type="button" id="tombol">Click me</button> -->
        <div class="card-body">
            <!-- Button trigger modal -->
            <a href="<?= base_url('admin/kategori/create') ?>" class="btn btn-success text-white mb-3"><i class="fa fa-plus"> Tambah Data Kategori</i></a>


            <table id="myTable" class="table table-bordered table-striped ">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kategori</th>

                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($content as $row) : ?>
                        <tr class="text-center">
                            <td><?= $no++  ?></td>
                            <td><?= $row->title ?></td>
                            <td>
                                
                                    <input type="text" hidden name="id" value="<?php echo $row->id ?>">
                                    <input type="text" name="id" value="" hidden>
                                    <a href="<?= base_url("admin/kategori/edit/$row->id") ?>" class="btn btn-warning"><i class="fas fa-edit text-light"></i>
                                    </a>
                                    <a href="<?php echo base_url("admin/kategori/delete/$row->id") ?>" class="btn btn-danger text-light tombol-hapus" id="hapus"><i class="fas fa-trash"></i></a>
                             
                            </td>
                        </tr>

                        <!-- Modal Update -->
                        <div class="modal fade" id="modal-update<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('admin/kategori/edit') ?>" method="POST">
                                            <div class="form-group">
                                                <input type="text" name="id" value="<?php echo $row->id ?>" hidden>
                                            </div>
                                            <div class="form-group">
                                                <label for="Kategori">Kategori</label>
                                                <input name="title" type="text" class="form-control" name="title" id="title" value="<?= $row->title ?>" autofocus>
                                                <?= form_error('title') ?>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
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