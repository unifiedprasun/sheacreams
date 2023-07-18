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
					<a href="javascript:void(0)" class="breadcrumb-item">Content Management</a>
					<span class="breadcrumb-item active">Widgets</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Settings/general_settings_lists"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Widgets Details</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Widgets</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" action="<?=base_url()?>admin/Settings/add_general_settings" method="post">
					<fieldset class="mb-3">												
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Title </label>
							<div class="col-lg-9">
								<input type="text" name="title" class="form-control" required placeholder="Title">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Name </label>
							<div class="col-lg-9">
								<input type="text" name="name" class="form-control" required placeholder="Name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Icon [<a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"> Click Here </a>] </label>
							<div class="col-lg-9">
								<input type="text" name="icon" class="form-control" placeholder="Use Font Awesome Icon">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Value </label>
							<div class="col-lg-9">
								<textarea class="form-control ckeditor" name="value"></textarea>
							</div>
						</div>														
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3">Add Widgets <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>