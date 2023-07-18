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
					<a href="javascript:void(0)" class="breadcrumb-item">Category Management</a>
					<span class="breadcrumb-item active">Category Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Category/add_category/<?=$this->uri->segment(4)?>"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Add New Category</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Category Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Category For</th>
						<th>Slug</th>
						<th>Name</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>	
					<?php if ($category){ 
					$i=1; foreach ($category as $c) {?>
					<tr>
						<td><?php echo $i; ?></td>
						<td>
							<?php if ($c->category_for == 1){ ?>
								<button class="btn btn-success">Product</button>
							<?php }else{ ?>
								<button class="btn btn-danger">Blog</button>
							<?php } ?>
						</td>
						<td><?php echo $c->slug?></td>
						<td><?php echo $c->name?></td>							
						<td>
							<?php if ($c->is_active == 1){?>
								<button class="btn btn-success">Active</button>
							<?php } else{?>
								<button class="btn btn-danger">Inactive</button>
							<?php }?>
						</td>
						<td class="text-center">
							<a href="<?=base_url()?>admin/Category/edit_category/<?=$c->id?>/<?=$this->uri->segment(4)?>"><button type="button" class="btn btn-primary btn-icon rounded-round"><i class="icon-pencil"></i></button></a>
							<?php if($c->is_active == 0){ ?>
								<a href="<?=base_url()?>admin/Category/active_category/<?=$c->id?>/1/<?=$c->category_for?>"><button type="button" onclick="return confirm('Are you want to active this category ?');" class="btn btn-success btn-icon rounded-round"><i class="fa fa-thumbs-up"></i></button></a>
							<?php }else{ ?>
								<a href="<?=base_url()?>admin/Category/active_category/<?=$c->id?>/0/<?=$c->category_for?>"><button type="button" onclick="return confirm('Are you want to active this category ?');" class="btn btn-warning btn-icon rounded-round"><i class="fa fa-thumbs-down"></i></button></a>
							<?php } ?>
							<a href="<?=base_url()?>admin/Category/delete_category/<?=$c->id?>/<?=$c->category_for?>"><button type="button" onclick="return confirm('Are you want to delete this category ?');" class="btn btn-danger btn-icon rounded-round"><i class="fa fa-trash"></i></button></a>
						</td>
					</tr>
					<?php $i++; } } ?>						
				</tbody>
			</table>
		</div>
	</div>