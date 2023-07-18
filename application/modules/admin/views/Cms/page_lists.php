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
					<a href="javascript:void(0)" class="breadcrumb-item">Content Management</a>
					<span class="breadcrumb-item active">Page Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Cms/add_page"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Add New Page</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Page Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Page Name</th>
						<th>Page Slug</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($details)>0){ ?>
						<?php $i=1;foreach($details as $d){ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$d->name?></td>
								<td><?=$d->slug?></td>
								<td>
									<?php if($d->is_active == 0){ ?>
										<button class="btn btn-warning">Inactive</button>
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
												<a href="<?=base_url()?>admin/Cms/edit_page/<?=$d->id?>" class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
												<a href="<?=base_url()?>admin/Cms/delete_page/<?=$d->id?>" onclick="return confirm('Are you want to delete this page ?');" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
												<?php if($d->is_active == 0){ ?>
													<a href="<?=base_url()?>admin/Cms/active_page/<?=$d->id?>/1" onclick="return confirm('Are you want to active this page ?');" class="dropdown-item"><i class="fa fa-thumbs-up"></i> Active</a>
												<?php }else{ ?>
													<a href="<?=base_url()?>admin/Cms/active_page/<?=$d->id?>/0" onclick="return confirm('Are you want to inactive this page ?');" class="dropdown-item"><i class="fa fa-thumbs-down"></i> Inactive</a>
												<?php } ?>												
											</div>
										</div>
									</div>
								</td>
							</tr>
						<?php $i++;} ?>	
					<?php } ?>					
				</tbody>
			</table>
		</div>
	</div>	
