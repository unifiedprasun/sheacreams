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
					<a href="javascript:void(0)" class="breadcrumb-item">Writer Management</a>
					<span class="breadcrumb-item active">Add Writer</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Writer/Writer_lists"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Writer Details</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Writer</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" action="<?=base_url()?>admin/Writer/add_Writer_details" autocomplete="off" method="post" enctype="multipart/form-data">
					<fieldset class="mb-3">						
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Name </label>
							<div class="col-lg-9">
								<input type="text" name="name" class="form-control" required placeholder="Name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Username </label>
							<div class="col-lg-9">
								<input type="text" name="username" class="form-control" required placeholder="Username">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Email Address </label>
							<div class="col-lg-9">
								<input type="email" id="writer_email" name="email" class="form-control" required placeholder="Email Address">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Contact Number </label>
							<div class="col-lg-9">
								<input type="number" id="writer_contact_number" maxlength="10" name="mobile" class="form-control" required placeholder="Contact Number">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Password </label>
							<div class="col-lg-9">
								<input type="password" id="password" name="password" class="form-control" required placeholder="Password">
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Confirm Password </label>
							<div class="col-lg-9">
								<input type="password" id="con_pass" name="con_pass" class="form-control" required placeholder="Confirm Password">
							</div>
						</div>			
						<div class="form-group row">							
							<label class="col-form-label col-lg-3">Profile Image </label>							
							<div class="col-lg-9">								
								<input type="file" name="image" class="form-input-styled" data-fouc>
							</div>
						</div>			
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3" onclick="return confirm_password_validate();">Add Writer <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>