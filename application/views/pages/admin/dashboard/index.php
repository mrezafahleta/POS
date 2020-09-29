<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p>Jumlah Penjualan</p>
                            <h3><?= $jumlahPenjualan; ?> Item</h3>

                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                   <!-- small box -->
                   <div class="small-box bg-info">
                       <div class="inner">
                           <p>Total Penjualan</p>
                           <h3>Rp.<?= number_format($totalPenjualan, 0, ',', '.'); ?></h3>

                       </div>
                       <div class="icon">
                           <i class="fas fa-money-bill-alt"></i>
                       </div>
                       <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                   </div>
              </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
