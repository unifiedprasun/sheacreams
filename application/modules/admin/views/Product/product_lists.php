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
					<a href="javascript:void(0)" class="breadcrumb-item">Product Management</a>
					<span class="breadcrumb-item active">Product Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<div>
			<a href="<?=base_url()?>admin/Product/add_product"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Add Product</button></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Product Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>			
						<th>Category</th>
						<th>Name</th>
						<th>Update Status</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody id="Ajax_Filter">	
					<?php if(count($details)>0){ 
					$j=1; 
					foreach($details as $d) {?>
					<tr>
						<td><?php echo $j; ?></td>
						<td>
							<?php 
							$product_id = $d->id;
							$cat_details = $this->BlankModel->customQuery("SELECT pc.*, c.name FROM product_category as pc INNER JOIN category as c ON c.id=pc.category AND pc.product_id='$product_id'");
							?>
							<?php
							$i=1; 
							foreach($cat_details as $cd){ ?>
								<p><b>( <?=$i?> )</b> <?=$cd->name?></p>
							<?php $i++;} ?>
						</td>
						<td>							
							<p><?=$d->product_name?></p>
						</td>
						<td>
							<select class="form-control" name="best_selling" onchange="return update_best_selling(<?=$d->id?>)" id="best_selling" required>
								<option value="">Select Option</option>
								<option <?php if($d->best_selling == 1){ ?> <?php echo "selected"; ?> <?php } ?> value="1">Set As Best Selling</option>
								<option <?php if($d->best_selling == 0){ ?> <?php echo "selected"; ?> <?php } ?> value="0">Deactivate Best Selling</option>
							</select>
							<br>
							<select class="form-control" name="is_popular" onchange="return update_popular(<?=$d->id?>)" id="is_popular" required>
								<option value="">Select Option</option>
								<option <?php if($d->is_popular == 1){ ?> <?php echo "selected"; ?> <?php } ?> value="1">Set As Popular</option>
								<option <?php if($d->is_popular == 0){ ?> <?php echo "selected"; ?> <?php } ?> value="0">Deactivate Popular</option>
							</select>
						</td>
						<td>
							<?php if($d->is_active == 1){?>
								<button class="btn btn-success">Active</button>
							<?php }else{?>
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
										
										<a href="<?=base_url()?>admin/Product/edit_product/<?=$d->id?>" class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
										
										<a href="<?=base_url()?>admin/Product/delete_product/<?=$d->id?>" onclick="return confirm('Are you want to delete this product ?');" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
										<?php if($d->is_active == 0){ ?>
											<a href="<?=base_url()?>admin/Product/active_product/<?=$d->id?>/1" onclick="return confirm('Are you want to active this product ?');" class="dropdown-item"><i class="fa fa-thumbs-up"></i> Active</a>
										<?php }else{ ?>
											<a href="<?=base_url()?>admin/Product/active_product/<?=$d->id?>/0" onclick="return confirm('Are you want to inactive this product ?');" class="dropdown-item"><i class="fa fa-thumbs-down"></i> Inactive</a>
										<?php } ?>												
									</div>
								</div>
							</div>
						</td>
					</tr>
					<?php $j++; } } ?>						
				</tbody>
			</table>
		</div>
	</div>