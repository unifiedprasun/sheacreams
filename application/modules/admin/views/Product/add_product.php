<style type="text/css">
	.bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
	    width: 100%;
	    border: 1px solid #ccc;
	    border-radius: 3px;
	}

	.btn:focus, .btn:hover {
	    color: #ccc!important;
	    font-weight: normal;
	}

	.bootstrap-select .dropdown-toggle:focus {
		outline: none !important;
	}
	.btn-light.focus, .btn-light:focus, .btn-light:hover, .btn-light:not([disabled]):not(.disabled).active, .btn-light:not([disabled]):not(.disabled):active, .show>.btn-light.dropdown-toggle {
	    border-color: #fff;
	}
</style>

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
					<a href="javascript:void(0)" class="breadcrumb-item">Product Management</a>
					<span class="breadcrumb-item active">Add Product</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<div>
				<a href="<?=base_url()?>admin/Product/product_lists"><button class="btn btn-warning" type="button" style="padding: 5px !important;"> Product Details</button></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Product</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" action="<?=base_url()?>admin/Product/add_product_details" method="post" enctype="multipart/form-data">					
					<fieldset class="mb-3">	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Product Category </label>
							<div class="col-lg-9">
								<select class="selectpicker" name="category[]" required multiple data-live-search="true">
									<?php foreach($category as $c){ ?>
										<option value="<?=$c->id?>"><?=$c->name?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Product Name </label>
							<div class="col-lg-9">
								<input type="text" name="product_name" id="product_name" class="form-control" required placeholder="Product Name">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Product Slug </label>
							<div class="col-lg-9">
								<input type="text" name="product_slug" id="slug" class="form-control" required readonly placeholder="Product Slug">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">SKU Code </label>
							<div class="col-lg-9">
								<input type="text" name="sku_code" id="sku_code" class="form-control" required placeholder="SKU Code">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Feature Image [ MAX Size 2MB ]</label>
							<div class="col-lg-9">
								<input type="file" name="feature_image" required class="form-input-styled" data-fouc>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Product Price </label>
							<div class="col-lg-9">
								<div class="row">
									<div class="col-lg-6">
										<div class="input-group">
										  	<div class="input-group-prepend">
										    	<span class="input-group-text">USD</span>
										  	</div>
											  <input type="text" required name="usd_price" placeholder="USD Price" class="form-control" aria-describedby="basic-addon3">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="input-group">
										  	<div class="input-group-prepend">
										    	<span class="input-group-text">GBP</span>
										  	</div>
											  <input type="text" required name="gbp_price" placeholder="GBP Price" class="form-control" aria-describedby="basic-addon3">
										</div>
									</div>
								</div>
							</div>						
						</div>
						
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Offer Price </label>
							<div class="col-lg-9">
								<div class="row">
									<div class="col-lg-6">
										<div class="input-group">
										  	<div class="input-group-prepend">
										    	<span class="input-group-text">USD</span>
										  	</div>
											  <input type="text" name="usd_offer_price" placeholder="USD Price" class="form-control" aria-describedby="basic-addon3">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="input-group">
										  	<div class="input-group-prepend">
										    	<span class="input-group-text">GBP</span>
										  	</div>
											  <input type="text" name="gbp_offer_price" placeholder="GBP Price" class="form-control" aria-describedby="basic-addon3">
										</div>
									</div>
								</div>
							</div>						
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Short Description </label>
							<div class="col-lg-9">
								<textarea name="short_desc" class="form-control ckeditor" placeholder="Short Description"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Long Description </label>
							<div class="col-lg-9">
								<textarea name="long_desc" class="form-control ckeditor" placeholder="Long Description"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Aditional Information </label>
							<div class="col-lg-9">
								<textarea name="aditional_info" class="form-control ckeditor" placeholder="Aditional Information"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Tags</label>
							<div class="col-lg-9">
							  	<input type="text" name="tags" class="form-control" placeholder="Product Tags" data-role="tagsinput">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Meta Title </label>
							<div class="col-lg-9">
								<input type="text" name="meta_title" class="form-control" placeholder="Meta Title">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Meta Keywords </label>
							<div class="col-lg-9">
								<textarea name="meta_keywords" class="form-control" placeholder="Meta Keywords"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3">Meta Description </label>
							<div class="col-lg-9">
								<textarea name="meta_description" class="form-control" placeholder="Meta Description"></textarea>
							</div>
						</div>	

					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3" id="add_product" disabled>Add Product <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>
