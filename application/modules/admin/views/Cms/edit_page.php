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
					<span class="breadcrumb-item active">Edit Page</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Cms/page_lists"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Page Details</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Edit Page</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" enctype="multipart/form-data" action="<?=base_url()?>admin/Cms/update_page/<?=$details[0]->id?>" method="post">
					<fieldset class="mb-3">	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Page Name </label>
							<div class="col-lg-9">
								<input type="text" name="name" value="<?=$details[0]->name?>" class="form-control" required placeholder="Page Name">
							</div>
						</div>					
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Page Title </label>
							<div class="col-lg-9">
								<input type="text" name="title" value="<?=$details[0]->title?>" readonly class="form-control" id="page_title" required placeholder="Page Title">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Page Slug </label>
							<div class="col-lg-9">
								<input type="text" name="slug" value="<?=$details[0]->slug?>" id="page_slug" readonly class="form-control" required placeholder="Page Slug">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Banner Image [ MAX Size 2MB ]</label>
							<div class="col-lg-9">
								<?php if($details[0]->banner_image !=''){ ?>
								<div class="show-image">
									<img src="<?=base_url()?>uploads/<?=$details[0]->banner_image?>" width="150" height="100">
								</div>
								<?php } ?>
								<input type="file" name="banner_image" class="form-input-styled">
								<input type="hidden" name="old_banner_image" value="<?=$details[0]->banner_image?>" class="form-input-styled">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Page Content </label>
							<div class="col-lg-9">
								<textarea class="form-control ckeditor" name="content"><?=$details[0]->content?></textarea>
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Meta Title </label>
							<div class="col-lg-9">
								<input type="text" name="meta_title" value="<?=$details[0]->meta_title?>" class="form-control" placeholder="Meta Title">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Meta Keywords </label>
							<div class="col-lg-9">
								<textarea class="form-control" name="meta_keywords" placeholder="Meta Keywords"><?=$details[0]->meta_keywords?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Meta Descriptions </label>
							<div class="col-lg-9">
								<textarea class="form-control" name="meta_description" placeholder="Meta Descriptions"><?=$details[0]->meta_description?></textarea>
							</div>
						</div>								
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3" id="add_page">Update Page <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>