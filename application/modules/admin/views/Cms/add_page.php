<style type="text/css">
.note-toolbar:not([class*=bg-]):not([class*=alpha-]) {
    background-color: #fff;
    border-bottom: 1px solid #ddd;
    padding: 5px;
    margin: 0;
    z-index: 0 !important; 
    border-top-left-radius: .1875rem;
    border-top-right-radius: .1875rem;
    background: #cccccc4f;
}

.note-toolbar .btn {
    background: #f9f9f9;
    border: 1px solid #c3c3c3;
}
.note-btn-group.btn-group .note-btn-group.btn-group {
    margin-right: 5px;
}

.note-btn-group.btn-group.note-view {
    margin-top: 5px;
}

.note-btn-group.btn-group.note-fontname {
    margin-right: 0;
}

.note-toolbar.panel-heading {
    position: relative !important;
}

.note-toolbar {
    z-index: 500 !important;
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
					<a href="javascript:void(0)" class="breadcrumb-item">Content Management</a>
					<span class="breadcrumb-item active">Add Page</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Cms/page_lists"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Page Details</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Page</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" enctype="multipart/form-data" action="<?=base_url()?>admin/Cms/add_page_details" method="post">
					<fieldset class="mb-3">	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Parent Page </label>
							<div class="col-lg-9">
								<select class="form-control" name="parent" required>
									<option value="">Select Option</option>
									<option value="0">Parent</option>
									<?php foreach($pages as $p){ ?>
									<option value="<?=$p->id?>"><?=$p->title?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Page Template </label>
							<div class="col-lg-9">
								<select class="form-control" name="template" required>
									<option value="">Select Option</option>
									<option value="about-us">About</option>
									<option value="terms-and-conditions">Terms And Conditions</option>
								</select>
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Page Name </label>
							<div class="col-lg-9">
								<input type="text" name="name" class="form-control" required placeholder="Page Name">
							</div>
						</div>					
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Page Title </label>
							<div class="col-lg-9">
								<input type="text" name="title" class="form-control" id="page_title" required placeholder="Page Title">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Page Slug </label>
							<div class="col-lg-9">
								<input type="text" name="slug" id="page_slug" readonly class="form-control" required placeholder="Page Slug">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Banner Image [ MAX Size 2MB ]</label>
							<div class="col-lg-9">
								<input type="file" name="banner_image" class="form-input-styled" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Page Content </label>
							<div class="col-lg-9">
								<textarea class="form-control summernote" name="content"></textarea>
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
								<textarea class="form-control" name="meta_keywords" placeholder="Meta Keywords"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Meta Descriptions </label>
							<div class="col-lg-9">
								<textarea class="form-control" name="meta_description" placeholder="Meta Descriptions"></textarea>
							</div>
						</div>								
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3" id="add_page" disabled>Add Page <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>