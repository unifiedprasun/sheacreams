<style type="text/css">
	@media (min-width: 576px){
	.modal-dialog {
	    max-width: 60%;
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
					<a href="javascript:void(0)" class="breadcrumb-item">Banner Management</a>
					<span class="breadcrumb-item active">Banner Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Banner/add_banner"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Add New Banner</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Banner Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Image</th>
						<th>Page Name</th>
						<th>Page Slug</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>	
					<?php if ($banner){ 
					$i=1; foreach ($banner as $b) {?>
					<tr>
						<td><?php echo $i; ?></td>
						<td>
							<?php if(!empty($b->image)){ ?>
								<img width="100" height="60" src="<?=base_url()?>uploads/<?=$b->image?>">
							<?php } ?>
						</td>	
						<td><?=$b->page_name?></td>	
						<td><?=$b->page_slug?></td>			
						<td>
							<?php if ($b->is_active == 1){?>
								<button class="btn btn-success">Active</button>
							<?php } else{?>
								<button class="btn btn-danger">Inactive</button>
							<?php }?>
						</td>
						<td>
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#banner<?=$b->id?>">Edit Banner</button>
						</td>
					</tr>
					<?php $i++; } } ?>						
				</tbody>
			</table>
		</div>
	</div>

	<?php foreach($banner as $b){ ?>
		<div class="modal fade" id="banner<?=$b->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Update Banner</h5>
		      </div>
		      <form class="form-validate-jquery" action="<?=base_url()?>admin/Banner/update_banner/<?=$b->id?>" enctype="multipart/form-data" method="post">	
			       <div class="modal-body">
					    <div class="form-group row">
							<label class="col-form-label col-lg-3">Select Page </label>
							<div class="col-lg-9">
								<select class="form-control" name="page_id" disabled>
									<option value="">Select Page</option>
									<?php foreach($page as $p){ ?>
										<option <?php if($p->id == $b->page_id){ ?> <?php echo "selected"; ?> <?php } ?> value="<?=$p->id?>"><?=$p->page_name?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Image [ MAX Sixe 2MB ]</label>
							<div class="col-lg-9">
								<?php if($b->image !=''){ ?>
								<div class="show-image">
									<img src="<?=base_url()?>uploads/<?=$b->image?>" width="150" height="100">
								</div>
								<?php } ?>
								<input type="file" name="image" class="form-input-styled" data-fouc>
								<input type="hidden" name="old_image" value="<?=$b->image?>">
							</div>
						</div>
		      	  	</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			        <button type="submit" class="btn btn-primary">Update Banner</button>
			      </div>
		  	  </form>
		    </div>
		  </div>
		</div>
	<?php } ?>