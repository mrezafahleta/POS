<?php
$success	= $this->session->flashdata('success');
$success	= $this->session->flashdata('success-update');
$error		= $this->session->flashdata('error');
$warning	= $this->session->flashdata('warning');
$unique_slug = $this->session->flashdata('unique_slug');

if ($success) {
	$alert_status	= 'alert-success';
	$status			= 'Success!';
	$message		= $success;
}

if ($error) {
	$alert_status	= 'alert-danger';
	$status			= 'Error!';
	$message		= $error;
}

if ($warning) {
	$alert_status	= 'alert-warning';
	$status			= 'Warning!';
	$message		= $warning;
}

if ($unique_slug) {
	$alert_status = 'alert-danger';
	$status		  = 'Gagal: ';
	$message	  = $unique_slug;
}
?>

<!-- <?php if ($success || $error || $warning || $unique_slug) : ?>
	<div class="row">
		<div class="col-md-8 m-auto mt-3">
			<div class="alert <?= $alert_status ?> alert-dismissible fade show text-center font-weight-bold" role="alert">
				<strong><?= $status ?></strong> <?= $message ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
<?php endif ?> -->

<?php if($success) : ?>
	<div class="flash-data" data-flashdata=	"<?= $this->session->flashdata('success') ?>"></div>
<?php endif ?>