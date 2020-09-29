<div class="content-wrapper">

    <section class="content mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Form Update Stok</h5>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('admin/stok/update') ?>" method="POST">
                    <input type="text" name="id" id="id" value="<?= $content->id ?>" hidden>
                    <div class="d-flex justify-content-lg-end">
                        <label for="" class="">Tanggal</label>
                    </div>
                    <div class="d-flex justify-content-lg-end">
                        <div class="col-lg-4">
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control mb-3 text-center" value="<?= $content->tanggal_masuk ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 ml-auto">
                            <div class="input-group w-75 mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                                </div>
                                <select class="form-control w-50" id="id_kategori" name="id_kategori">


                                    <option selected value="<?= $content->id_kategori ?>">
                                        <?= $joindata->title ?>
                                    </option>
                                    <?php foreach ($kategori as $stok) : ?>
                                        <option value="<?= $stok->id ?>"><?= $stok->title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Kategori">Nama Barang</label>
                                <input type="text" class="form-control w-75" name="title" id="title" value="<?= $content->title ?>" autofocus required>
                                <?= form_error('title') ?>
                            </div>
                            <div class="form-group">
                                <label for="Kategori">Harga Pokok Penjualan</label>
                                <input type="number" class="form-control w-75" onkeypress="return angka(event)" name="hpp" placeholder="Harga Pokok Penjualan" id="hpp" onkeyup="tambah()" required value="<?= $content->hpp ?>">
                                <?= form_error('hpp') ?>
                            </div>
                            <div class="form-group">
                                <label for="Kategori">Jumlah Barang</label>
                                <input type="number" class="form-control w-75" onkeypress="return angka(event)" name="jumlah" value="<?= $content->jumlah ?>" id="jumlah" placeholder="Jumlah Barang" onkeyup="tambah()" required>
                                <?= form_error('jumlah')  ?>
                            </div>

                            <div class="form-group">
                                <label for="Kategori">Total</label>
                                <input type="text" class="form-control w-75" name="total" id="total" placeholder="Total Harga keseluruhan" value="<?= $content->total ?>" readonly>
                                <?= form_error('total') ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/stok') ?>" class="btn btn-info">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
<!-- Format Angka -->
<script src="<?php echo base_url('/assets/js/jquery.price_format.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.price_format.js') ?>"></script>
<script type="text/javascript">
    $('#total').priceFormat({
        prefix: '',
        // centsSeparator: '',
        centsLimit: 0,
        thousandsSeparator: '.'
    });




    function angka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;

    }

    function tambah() {
        var hpp = document.getElementById('hpp').value;
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