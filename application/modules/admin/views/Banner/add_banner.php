
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
					<a href="javascript:void(0)" class="breadcrumb-item">Banner Management</a>
					<span class="breadcrumb-item active">Add Banner</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Banner"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Banner Details</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Banner</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" action="<?=base_url()?>admin/Banner/add_banner_details" method="post" enctype="multipart/form-data">					
					<fieldset class="mb-3">	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Select Page </label>
							<div class="col-lg-9">
								<select class="form-control" name="page_id" id="banner_page" required>
									<option value="">Select Page</option>
									<?php foreach($page as $p){ ?>
										<option value="<?=$p->id?>"><?=$p->page_name?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Image [ MAX Sixe 2MB ]</label>
							<div class="col-lg-9">
								<input type="file" name="image" required class="form-input-styled" data-fouc>
								<div class="pt-2"><b>Allowed types :</b> JPG, PNG, JPEG || <b>Image size :</b> 2000&nbsp;X&nbsp;600</div>
							</div>
						</div>
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3">Add Banner <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>
