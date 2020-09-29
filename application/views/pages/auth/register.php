<main role="main" class="container">
    <?php $this->load->view('layout/_alert') ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    Formulir Registrasi
                </div>
                <div class="card-body">
                    <?= form_open('register', ['method' => 'post'])  ?>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <?php echo form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true, 'placeholder' => 'Masukkan Nama']) ?>
                        <?php echo form_error('name') ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                        <?php echo form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter', 'required' => true]) ?>
                        <?php echo form_error('password') ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <?php echo form_password('password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Masukkan ulang password yang sama', 'required' => true]) ?>
                        <?php echo form_error('password_confirmation') ?>
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">Register</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>