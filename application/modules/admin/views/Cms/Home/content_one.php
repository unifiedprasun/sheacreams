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
					<a href="javascript:void(0)" class="breadcrumb-item">Home Content</a>
					<span class="breadcrumb-item active">Content One</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Content</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" enctype="multipart/form-data" action="<?=base_url()?>admin/Cms/add_content_one_details/<?=$details[0]->id?>" method="post">
					<fieldset class="mb-3">	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Title </label>
							<div class="col-lg-9">
								<input type="text" name="content_title" value="<?=$details[0]->content_title?>" class="form-control" required placeholder="Content Title">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Content One </label>
							<div class="col-lg-9">
								<textarea class="form-control ckeditor" name="content1"><?=$details[0]->content1?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Content Two</label>
							<div class="col-lg-9">
								<textarea class="form-control ckeditor" name="content2"><?=$details[0]->content2?></textarea>
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Content Three</label>
							<div class="col-lg-9">
								<textarea class="form-control ckeditor" name="content3"><?=$details[0]->content3?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Content Four</label>
							<div class="col-lg-9">
								<textarea class="form-control ckeditor" name="content4"><?=$details[0]->content4?></textarea>
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Image One [ MAX Size 2MB ]</label>							
							<div class="col-lg-9">
								<?php if($details[0]->image1 !=''){ ?>
								<div class="show-image">
									<img src="<?=base_url()?>uploads/<?=$details[0]->image1?>" width="150" height="100">
								</div>
								<?php } ?>
								<input type="file" name="image1" class="form-input-styled">
								<input type="hidden" name="old_image1" value="<?=$details[0]->image1?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Image Two [ MAX Size 2MB ]</label>
							<div class="col-lg-9">
								<?php if($details[0]->image2 !=''){ ?>
								<div class="show-image">
									<img src="<?=base_url()?>uploads/<?=$details[0]->image2?>" width="150" height="100">
								</div>
								<?php } ?>
								<input type="file" name="image2" class="form-input-styled">
								<input type="hidden" name="old_image2" value="<?=$details[0]->image2?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Image Three [ MAX Size 2MB ]</label>							
							<div class="col-lg-9">
								<?php if($details[0]->image3 !=''){ ?>
								<div class="show-image">
									<img src="<?=base_url()?>uploads/<?=$details[0]->image3?>" width="150" height="100">
								</div>
								<?php } ?>
								<input type="file" name="image3" class="form-input-styled">
								<input type="hidden" name="old_image3" value="<?=$details[0]->image3?>">
							</div>
						</div>							
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3">Add Content <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>