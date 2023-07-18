<style type="text/css">
	@media (min-width: 576px){
	.modal-dialog {
	    max-width: 70%;
	}}
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
					<a href="javascript:void(0)" class="breadcrumb-item">Home Content</a>
					<span class="breadcrumb-item active">Content Three</span>
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
				<form class="form-validate-jquery" enctype="multipart/form-data" action="<?=base_url()?>admin/Cms/add_content_three_details" method="post">
					<fieldset class="mb-3">	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Title </label>
							<div class="col-lg-9">
								<input type="text" name="content_title" class="form-control" required placeholder="Content Title">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Redirect URL </label>
							<div class="col-lg-9">
								<input type="url" name="url" class="form-control" required placeholder="Redirect URL">
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Image [ MAX Size 2MB ]</label>
							<div class="col-lg-9">
								<input type="file" name="image" class="form-input-styled" required>
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

		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Content Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th style="width: 100px;">SL NO</th>
						<th>Image</th>
						<th style="width: 200px;">Title</th>
						<th>Redirect URL</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($details)>0){ ?>
						<?php $i=1;foreach($details as $d){ ?>
							<tr>
								<td><?=$i?></td>
								<td>
									<img src="<?=base_url()?>uploads/<?=$d->image?>" height="60" width="100">
								</td>
								<td><?=$d->content_title?></td>
								<td><a href="<?=$d->url?>" target="_blank"><?=$d->url?></a></td>						
								<td>
									<button class="btn btn-success" type="button" data-toggle="modal" data-target="#content<?=$d->id?>">Edit</button>
								</td>
							</tr>

							<div class="modal fade" id="content<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Content</h5>
										</div>
										<form action="<?=base_url()?>admin/Cms/update_content_three/<?=$d->id?>" method="post" enctype="multipart/form-data">	
											<div class="modal-body">
												<div class="form-group row">
													<label class="col-form-label col-lg-3">Title </label>
													<div class="col-lg-9">
														<input type="text" value="<?=$d->content_title?>" name="content_title" class="form-control" required placeholder="Content Title">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label col-lg-3">Redirect URL </label>
													<div class="col-lg-9">
														<input type="url" name="url" value="<?=$d->url?>" class="form-control" required placeholder="Redirect URL">
													</div>
												</div>	
												<div class="form-group row">
													<label class="col-form-label col-lg-3">Image [ MAX Size 2MB ]</label>
													<div class="col-lg-9">
														<?php if($d->image !=''){ ?>
														<div class="show-image">
															<img src="<?=base_url()?>uploads/<?=$d->image?>" width="150" height="100">
														</div>
														<?php } ?>
														<input type="file" name="image" class="form-input-styled">
														<input type="hidden" name="old_image" value="<?=$d->image?>">
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary">Update Content</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						<?php $i++;} ?>	
					<?php } ?>					
				</tbody>
			</table>
		</div>
	</div>