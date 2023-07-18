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
					<a href="javascript:void(0)" class="breadcrumb-item">Settings Management</a>
					<span class="breadcrumb-item active">Add Home Banner</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>			
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Home Banner</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" enctype="multipart/form-data" action="<?=base_url()?>admin/Settings/add_home_banner" method="post">
					<fieldset class="mb-3">												
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Title </label>
							<div class="col-lg-9">
								<input type="text" name="banner_title" class="form-control" required placeholder="Title">
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-form-label col-lg-3"> Banner Image </label>
							<div class="col-lg-9">
								<input type="file" name="banner_image" class="form-input-styled" data-fouc>
							</div>
						</div>																			
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3">Add Home Banner <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Home Banner Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Banner Image</th>
						<th>Title</th>						
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>	
					<?php if ($details){ 
					$i=1; foreach ($details as $d) {?>
					<tr>
						<td><?php echo $i; ?></td>
						<td>
							<?php if ($d->banner_image !=''){ ?>
							<img height="80" width="120" src="<?=base_url()?>uploads/<?=$d->banner_image?>" alt="Image">
							<?php } ?>
						</td>
						<td><?php echo $d->banner_title; ?></td>																		
						<td>
							<?php if ($d->is_active == 1){?>
								<button class="btn btn-success">Active</button>
							<?php } else{?>
								<button class="btn btn-danger">Inactive</button>
							<?php }?>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="javascript:void(0)" data-toggle="modal" data-target="#home_benner<?=$d->id?>" class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
										<a href="<?=base_url()?>admin/Settings/delete_home_banner/<?=$d->id?>" onclick="return confirm('Are you want to delete this banner ?');" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
										<?php if($d->is_active == 0){ ?>
											<a href="<?=base_url()?>admin/Settings/active_home_banner/<?=$d->id?>/1" onclick="return confirm('Are you want to active this banner ?');" class="dropdown-item"><i class="fa fa-thumbs-up"></i> Active</a>
										<?php }else{ ?>
											<a href="<?=base_url()?>admin/Settings/active_home_banner/<?=$d->id?>/0" onclick="return confirm('Are you want to inactive this banner ?');" class="dropdown-item"><i class="fa fa-thumbs-down"></i> Inactive</a>
										<?php } ?>												
									</div>
								</div>
							</div>
						</td>
					</tr>
					<?php $i++; } } ?>						
				</tbody>
			</table>
		</div>
	</div>

	<?php foreach($details as $d){ ?>
		<div class="modal fade" id="home_benner<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Home Banner</h5>
		      </div>
		      <form class="" enctype="multipart/form-data" action="<?=base_url()?>admin/Settings/update_home_banner/<?=$d->id?>" method="post">	
			      <div class="modal-body">
		      	    <div class="form-group row">
						<label class="col-form-label col-lg-3">Title </label>
						<div class="col-lg-9">
							<input type="text" name="banner_title" value="<?=$d->banner_title?>" class="form-control" required placeholder="Title">
						</div>
					</div>						
					<div class="form-group row">
						<label class="col-form-label col-lg-3"> Banner Image </label>
						<div class="col-lg-9">
							<?php if($d->banner_image !=''){ ?>
							<div class="show-image">
								<img src="<?=base_url()?>uploads/<?=$d->banner_image?>" width="150" height="100">
							</div>
							<?php } ?>
							<input type="hidden" value="<?=$d->banner_image?>" name="old_banner_image">
							<input type="file" name="banner_image" class="form-input-styled">
						</div>
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			        <button type="submit" class="btn btn-primary">Update Home Banner</button>
			      </div>
		  	  </form>
		    </div>
		  </div>
		</div>
	<?php } ?>