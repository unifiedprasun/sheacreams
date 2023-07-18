<div class="content-wrapper">

	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> Dashboard <small>reports & statistics</small></h4>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>			
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="javascript:void(0)" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
					<a href="javascript:void(0)" class="breadcrumb-item">Profile Management</a>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Update Profile</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" action="<?=base_url()?>admin/Admins/update_profile/<?=$details[0]->id?>" enctype="multipart/form-data" method="post">
					<fieldset class="mb-3">						
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Name </label>
							<div class="col-lg-9">
								<input type="text" name="name" value="<?=$details[0]->name?>" class="form-control" required placeholder="Name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Username </label>
							<div class="col-lg-9">
								<input type="text" name="username" value="<?=$details[0]->username?>" class="form-control" required placeholder="Username">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Email Address </label>
							<div class="col-lg-9">
								<input type="email" name="email" readonly value="<?=$details[0]->email?>" class="form-control" required placeholder="Email Address">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Contact Number </label>
							<div class="col-lg-9">
								<input type="number" name="contact_number" readonly value="<?=$details[0]->contact_number?>" class="form-control" required placeholder="Contact Number">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Position </label>
							<div class="col-lg-9">
								<input type="text" name="position" value="<?=$details[0]->position?>" class="form-control" required placeholder="Position">
							</div>
						</div>			
						<div class="form-group row">							
							<label class="col-form-label col-lg-3">Profile Image </label>							
							<div class="col-lg-9">
								<?php if($details[0]->image !=''){ ?>
								<div class="show-image">
									<img src="<?=base_url()?>uploads/<?=$details[0]->image?>" width="150" height="100">
								</div>
								<?php } ?>
								<input type="file" name="image" class="form-input-styled" data-fouc>
								<input type="hidden" value="<?=$details[0]->image?>" name="old_image" class="form-input-styled" data-fouc>
							</div>
						</div>			
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3">Update Profile <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Change Password</h5>
			</div>
			<div class="card-body">
				<form action="<?=base_url()?>admin/Admins/update_password/<?=$details[0]->id?>" method="post">
					<fieldset class="mb-3">						
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Old Password </label>
							<div class="col-lg-9">
								<input type="text" id="old_pass" onchange="return validate_password();" name="old_pass" class="form-control" required placeholder="Old Password">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">New Password </label>
							<div class="col-lg-9">
								<input type="text" id="new_pass" name="new_pass" class="form-control" required placeholder="New Password">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Confirm Password </label>
							<div class="col-lg-9">
								<input type="text" id="con_pass" name="con_pass" class="form-control" required placeholder="Confirm Password">
							</div>
						</div>												
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<a href="<?=base_url()?>admin/Admins"><button type="button" class="btn btn-danger">Cancel <i class="fa fa-times ml-2"></i></button></a>
						<button type="submit" onclick="return new_password_validate();" id="update_profile" disabled class="btn btn-primary ml-3">Update Password <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>