<style type="text/css">
	@media (min-width: 576px){
	.modal-dialog {
	    max-width: 80%;
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
					<a href="javascript:void(0)" class="breadcrumb-item"> Content Management</a>
					<span class="breadcrumb-item active">Widgets Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Settings/general_settings"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Add Widgets</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Widgets Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead class="flip-content">
				<tr>
					<th>#SN</th>
					<th style="width: 200px;">Name</th>
					<th>Value</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>	
				<?php if(count($details)>0){ ?>
					<?php $i=1;foreach($details as $d){ ?>
						<tr>
							<td><?=$i?></td>
							<td><?php echo $d->name;?></td>
							<td><?=substr($d->value, 0, 200)?></td>
							<td>
								<?php if($d->is_active == 0){ ?>
									<button class="btn btn-danger">Inactive</button>
								<?php }else{ ?>
									<button class="btn btn-success">Active</button>
								<?php } ?>
							</td>
							<td class="text-center">
								<div class="list-icons">
									<div class="dropdown">
										<a href="#" class="list-icons-item" data-toggle="dropdown">
											<i class="icon-menu9"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="javascript:void(0)" data-toggle="modal" data-target="#general_settings<?=$d->id?>" class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
											<a href="<?=base_url()?>admin/Settings/delete_settings/<?=$d->id?>" onclick="return confirm('Are you want to delete this setting ?');" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
											<?php if($d->is_active == 0){ ?>
												<a href="<?=base_url()?>admin/Settings/active_settings/<?=$d->id?>/1" onclick="return confirm('Are you want to active this setting ?');" class="dropdown-item"><i class="fa fa-thumbs-up"></i> Active</a>
											<?php }else{ ?>
												<a href="<?=base_url()?>admin/Settings/active_settings/<?=$d->id?>/0" onclick="return confirm('Are you want to inactive this setting ?');" class="dropdown-item"><i class="fa fa-thumbs-down"></i> Inactive</a>
											<?php } ?>												
										</div>
									</div>
								</div>
							</td>
						</tr>

						<div class="modal fade" id="general_settings<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Edit Widgets</h5>
						        
						      </div>
						      <form class="" action="<?=base_url()?>admin/Settings/update_general_settings/<?=$d->id?>" method="post">	
							      <div class="modal-body">
									    <div class="form-group row">
											<label class="col-form-label col-lg-3">Title </label>
											<div class="col-lg-9">
												<input type="text" name="title" value="<?=$d->title?>" class="form-control" required placeholder="Title">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-lg-3">Name </label>
											<div class="col-lg-9">
												<input type="text" name="name" value="<?=$d->name?>" class="form-control" required placeholder="Name">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-lg-3">Icon [<a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"> Click Here </a>] </label>
											<div class="col-lg-9">
												<input type="text" name="icon" value="<?=$d->icon?>" class="form-control" placeholder="Use Font Awesome Icon">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-lg-3">Value </label>
											<div class="col-lg-9">
												<textarea class="form-control ckeditor" name="value"><?=$d->value?></textarea>
											</div>
										</div>	
						          </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							        <button type="submit" class="btn btn-primary">Update Widgets</button>
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

