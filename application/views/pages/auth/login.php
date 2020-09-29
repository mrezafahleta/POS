<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?= isset($title) ? $title : 'market' ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('/assets/libs/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesomme -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/libs/fontsawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/libs/bootstrap/css/bootstrap.min.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('/assets/datatable/css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/my.css') ?>">
    <!-- DataTable -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"> -->
    <!--  -->


</head>

<body>

    <div class="container mt-5">
        <?php $this->load->view('layout/_alert') ?>
        <div class="card w-50 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <?= form_open('login', ['method' => 'POST']) ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password', 'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>

                    <div class="middle">
                        <button type="submit" class="btn btn-primary middle">Submit</button>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

    </script> -->
    <script src="<?php echo base_url('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('/assets/js/app.js') ?>"></script>
    <script src="<?php echo base_url('/assets/js/search.js') ?>"></script>
    <!-- Datatable Js -->
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script> -->
    <script src="<?php echo base_url('/assets/datatable/js/jquery.dataTables.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>