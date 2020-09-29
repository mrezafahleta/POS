<div class="content-wrapper">

    <section class="content mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Form Tambah Kategori</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url($form_action) ?>" method="POST">
                    <!-- <div class="d-flex justify-content-lg-end">
                        <label for="" class="mt-2">Tanggal</label>
                    </div>
                    <div class="d-flex justify-content-lg-end">
                        <input type="text" id="tanggal" class="form-control w-25 text-center" name="" id="">
                    </div> -->
                    <?php $this->load->view('layout/_alert'); ?>
                    <div class="form-group">
                        <input type="text" id="id" name="id" value="<?= $content->id ?>" hidden>
                        <label for="Kategori">Kategori</label>
                        <input type="text" class="form-control w-75" required name="title" id="title" value="<?= $content->title ?>" autofocus>
                        <?= form_error('title') ?>

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('admin/kategori') ?>" class="btn btn-info">Kembali</a>
                </form>
            </div>
        </div>
    </section>

</div>