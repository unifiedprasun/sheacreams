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
					<span class="breadcrumb-item active">Menu Management</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="#"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Menu Details</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Menu</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" enctype="multipart/form-data" action="<?=base_url()?>admin/Cms/add_page_details" method="post">
					<fieldset class="mb-3">	

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Menu Type</label>
							<div class="col-lg-9">
								<select class="form-control" name="type" required>
									<option value="1">Header Menu</option>
									<option value="2">Footer Menu</option>
								</select>
							</div>
						</div>						

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Parent Menu </label>
							<div class="col-lg-9">
								<select class="form-control" name="parent" required>
									<option value="0">Parent</option>
									<?php foreach($menu as $m){ ?>
										<option value="<?=$m->id?>"><?=$m->title?></option>
									<?php } ?>
								</select>
							</div>
						</div>
							
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Menu Title </label>
							<div class="col-lg-9">
								<input type="text" name="title" class="form-control" required placeholder="Menu Title">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Authentication</label>
							<div class="col-lg-9">
								<select class="form-control" name="authentication" required>
									<option value="1">Not Required</option>
									<option value="2">Required</option>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Redirection Type</label>
							<div class="col-lg-9">
								<select class="form-control" id="redirection_type" name="redirection_type" required>
									<option value="1">Website</option>
									<option value="2">External</option>
								</select>
							</div>
						</div>

						<div class="form-group row" id="page_slug">
							<label class="col-form-label col-lg-3">Redirection Slug </label>
							<div class="col-lg-9">
								<input type="text" id="m_slug" required name="redirection_slug" class="form-control" placeholder="Redirection Slug">
							</div>
						</div>

						<div class="form-group row" id="redirection_link" style="display: none;">
							<label class="col-form-label col-lg-3">Redirection URL </label>
							<div class="col-lg-9">
								<input type="url" id="m_url" name="redirection_url" class="form-control" placeholder="Redirection URL">
							</div>
						</div>	
													
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3">Add Menu <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>