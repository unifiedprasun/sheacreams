<style type="text/css">
	.note-toolbar:not([class*=bg-]):not([class*=alpha-]) {
	    z-index: 0;
	    background: #fff !important;
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
					<a href="javascript:void(0)" class="breadcrumb-item">Blog Management</a>
					<span class="breadcrumb-item active">View Blog</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Blog/blog_lists"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Blog Details</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">View Blog</h5>
			</div>
			<div class="card-body">				
				<fieldset class="mb-3">	
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Blog Category </label>
						<div class="col-lg-9">
							<select class="form-control" name="category" disabled>
								<option value="">Select Category</option>
								<?php foreach($category as $c){ ?>
									<option <?php if($details[0]->category == $c->id){ ?><?php echo "selected"; ?><?php } ?> value="<?=$c->id?>"><?=$c->name?></option>
								<?php } ?>
							</select>
						</div>
					</div>				
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Blog Title </label>
						<div class="col-lg-9">
							<input type="text" disabled value="<?=$details[0]->title?>" name="title" class="form-control" id="blog_title" placeholder="Blog Title">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Blog Slug </label>
						<div class="col-lg-9">
							<input type="text" value="<?=$details[0]->slug?>" name="slug" id="slug" disabled class="form-control" placeholder="Page Slug">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Tags</label>
						<div class="col-lg-9">
						  	<input type="text" disabled name="tags" class="form-control" value="<?=$details[0]->tags?>" placeholder="Blog Tags" data-role="tagsinput">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Written By </label>
						<div class="col-lg-9">
							<input type="text" disabled value="<?=$details[0]->w_name?>" name="writer" class="form-control" placeholder="Blog Written By">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Short Description </label>
						<div class="col-lg-9">
							<textarea disabled class="form-control ckeditor" name="short_desc"><?=$details[0]->short_desc?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Blog Content </label>
						<div class="col-lg-9">
							<textarea disabled class="form-control ckeditor" name="content"><?=$details[0]->content?></textarea>
						</div>
					</div>	
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Meta Title </label>
						<div class="col-lg-9">
							<input type="text" disabled value="<?=$details[0]->meta_title?>" name="meta_title" class="form-control" placeholder="Meta Title">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Meta Keywords </label>
						<div class="col-lg-9">
							<textarea disabled class="form-control" name="meta_keywords" placeholder="Meta Keywords"><?=$details[0]->meta_keywords?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-3">Meta Descriptions </label>
						<div class="col-lg-9">
							<textarea disabled class="form-control" name="meta_description" placeholder="Meta Descriptions"><?=$details[0]->meta_description?></textarea>
						</div>
					</div>								
				</fieldset>			
			</div>
		</div>
	</div>



