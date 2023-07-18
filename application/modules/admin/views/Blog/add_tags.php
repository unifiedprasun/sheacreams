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
					<span class="breadcrumb-item active">Add Tags</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Tags</h5>
			</div>
			<div class="card-body">
				<form class="form-validate-jquery" action="<?=base_url()?>admin/Blog/add_tags" method="post">

					<fieldset class="mb-3">
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Category</label>
							<div class="col-lg-9">
								<select name="category" class="form-control" required>
									<option value="">Select Category</option>
									<?php foreach($category as $c){ ?>
										<option value="<?=$c->id?>"><?=$c->name?></option>
									<?php } ?>
								</select>
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-form-label col-lg-3">Tags </label>
							<div class="col-lg-9">
								<input type="text" name="tag" data-role="tagsinput" class="form-control" required placeholder="tag">
							</div>
						</div>														
					</fieldset>

					<div class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn btn-danger" id="reset_1">Reset <i class="fa fa-refresh ml-2"></i></button>
						<button type="submit" class="btn btn-primary ml-3">Add Tags <i class="icon-paperplane ml-2"></i></button>
					</div>

				</form>
			</div>
		</div>

		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Tags Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Category</th>
						<th>Tag</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>	
					<?php if ($tags){ 
					$i=1; foreach ($tags as $t) {?>
					<tr>
						<td><?php echo $i; ?></td>	
						<td><?=$t->cat_name?></td>
						<td><?=$t->tag?></td>						
						<td>
							<?php if ($t->is_active == 1){?>
								<button class="btn btn-success">Active</button>
							<?php } else{?>
								<button class="btn btn-danger">Inactive</button>
							<?php }?>
						</td>
						<td>
							<button data-toggle="modal" data-target="#tag_edit<?=$t->id?>" class="btn btn-primary" type="button">Edit Tag</button>
						</td>
					</tr>

					<div class="modal fade" id="tag_edit<?=$t->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="<?=base_url()?>admin/Blog/update_tag/<?=$t->id?>" method="post">
									<div class="modal-body">
										<div class="form-group row">
											<label class="col-form-label col-lg-3">Category</label>
											<div class="col-lg-9">
												<select name="category" class="form-control" required>
													<option value="">Select Category</option>
													<?php foreach($category as $c){ ?>
														<option <?php if($c->id == $t->category){ ?> <?php echo "selected"; ?> <?php } ?> value="<?=$c->id?>"><?=$c->name?></option>
													<?php } ?>
												</select>
											</div>
										</div>	
										<div class="form-group row">
											<label class="col-form-label col-lg-3">Tag </label>
											<div class="col-lg-9">
												<input type="text" value="<?=$t->tag?>" name="tag" class="form-control" required placeholder="tag">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<?php $i++; } } ?>						
				</tbody>
			</table>
		</div>
	</div>