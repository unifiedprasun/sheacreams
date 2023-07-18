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
					<a href="javascript:void(0)" class="breadcrumb-item">Customer Management</a>
					<span class="breadcrumb-item active">Add Customer</span>
				</div>				
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Customer/customer_lists"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Customer Details</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Customer</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" method="post" action="<?=base_url()?>admin/Customer/add_customer_details" enctype="multipart/form-data">
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
								<input type="email" id="email" onchange="return customer_email_validate();" name="email" class="form-control" required placeholder="Email Address">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Contact Number </label>
							<div class="col-lg-9">
								<input type="number" id="mobile" maxlength="10" onchange="return customer_mobile_validate();" name="mobile" class="form-control" required placeholder="Contact Number">
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
						<button type="submit" class="btn btn-primary ml-3" onclick="return confirm_password_validate();">Add Customer <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>
