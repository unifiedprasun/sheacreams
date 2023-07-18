<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin - Login</title>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/colors.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/custom.css" rel="stylesheet" type="text/css">

	<script src="<?=base_url()?>assets/admin/global_assets/js/main/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/admin/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?=base_url()?>assets/admin/global_assets/js/plugins/loaders/blockui.min.js"></script>

	<script src="<?=base_url()?>assets/admin/global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="<?=base_url()?>assets/admin/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="<?=base_url()?>assets/admin/js/app.js"></script>
	<script src="<?=base_url()?>assets/admin/global_assets/js/demo_pages/login_validation.js"></script>

	<style type="text/css">
		.alert {
		    width: 320px;
		}
	</style>

</head>

<body>

	<div class="page-content">
		<div class="content-wrapper">
			<div class="content d-flex justify-content-center align-items-center">
				<form class="login-form form-validate" action="<?=base_url()?>admin/Admins/admin_login" method="post">

					<?php if ($this->session->flashdata('success')) {?>
			          <div class="alert alert-success alert-dismissible msgPop" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?= $this->session->flashdata('success') ?></div>
			        <?php }elseif ($this->session->flashdata('error')) {?>
			          <div class="alert alert-danger alert-dismissible msgPop" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?= $this->session->flashdata('error') ?></div>
			        <?php } ?>

					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Your credentials</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="email" class="form-control" name="email" placeholder="Email" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
