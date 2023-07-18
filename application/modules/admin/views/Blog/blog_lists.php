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
					<span class="breadcrumb-item active">Blog Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Blog Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Title</th>
						<th>Category</th>
						<th>Writer</th>
						<th>Post Date</th>
						<th>Status</th>
						<th>Comments</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($details)>0){ ?>
						<?php $i=1;foreach($details as $d){ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$d->title?></td>
								<td><?=$d->name?></td>
								<td><?=$d->w_name?></td>
								<td><?=date('d F Y', strtotime($d->added_on))?></td>
								<td>
									<?php if($d->is_approve == 1){ ?>
										<?php if($d->is_active == 0){ ?>
											<button class="btn btn-warning">Inactive</button>
										<?php }else{ ?>
											<button class="btn btn-success">Active</button>
										<?php } ?>
									<?php }else{ ?>
										<button class="btn btn-warning">Pending</button>
									<?php } ?>
								</td>	
								<td>
									<a href="<?=base_url()?>admin/Blog/get_comments/<?=$d->id?>"><button class="btn btn-warning" type="button">Comments</button></a>
								</td>					
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<?php if($d->is_approve == 1){ ?>
													<a href="<?=base_url()?>admin/Blog/view_blog/<?=$d->id?>" class="dropdown-item"><i class="fa fa-eye"></i> View</a>
													<a href="javascript:void(0);" class="dropdown-item" data-toggle="modal" data-target="#meta<?=$d->id?>"><i class="fa fa-bars"></i> Meta Tags</a>
													<a href="<?=base_url()?>admin/Blog/delete_blog/<?=$d->id?>" onclick="return confirm('Are you want to delete this blog ?');" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
													<?php if($d->is_active == 0){ ?>
														<a href="<?=base_url()?>admin/Blog/active_blog/<?=$d->id?>/1" onclick="return confirm('Are you want to active this blog ?');" class="dropdown-item"><i class="fa fa-thumbs-up"></i> Active</a>
													<?php }else{ ?>
														<a href="<?=base_url()?>admin/Blog/active_blog/<?=$d->id?>/0" onclick="return confirm('Are you want to inactive this blog ?');" class="dropdown-item"><i class="fa fa-thumbs-down"></i> Inactive</a>
													<?php } ?>
												<?php }else{ ?>
													<a href="<?=base_url()?>admin/Blog/view_blog/<?=$d->id?>" class="dropdown-item"><i class="fa fa-eye"></i> View</a>
													<a href="<?=base_url()?>admin/Blog/approve_blog/<?=$d->id?>/1" onclick="return confirm('Are you want to approve this blog ?');" class="dropdown-item"><i class="fa fa-check"></i> Approve</a>													
													<a href="<?=base_url()?>admin/Blog/approve_blog/<?=$d->id?>/2" onclick="return confirm('Are you want to reject this blog ?');" class="dropdown-item"><i class="fa fa-times"></i> Reject</a>													
												<?php } ?>												
											</div>
										</div>
									</div>
								</td>								
							</tr>

							<!--===========================================META TAGS MODAL======================================================-->

							<div class="modal fade" id="meta<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Edit Meta Tags</h5>
							        
							      </div>
							      <form class="form-validate-jquery" action="<?=base_url()?>admin/Blog/update_meta_tags/<?=$d->id?>" method="post">	
							        <div class="modal-body">
							        	<div class="form-group row">
											<label class="col-form-label col-lg-3">Tags</label>
											<div class="col-lg-9">
												<input type="text" value="<?=$d->tags?>" name="tags" class="form-control" placeholder="Blog Tags" data-role="tagsinput" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-lg-3">Meta Title </label>
											<div class="col-lg-9">
												<input type="text" value="<?=$d->meta_title?>" name="meta_title" class="form-control" placeholder="Meta Title">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-lg-3">Meta Keywords </label>
											<div class="col-lg-9">
												<textarea class="form-control" name="meta_keywords" placeholder="Meta Keywords"><?=$d->meta_keywords?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-lg-3">Meta Descriptions </label>
											<div class="col-lg-9">
												<textarea class="form-control" name="meta_description" placeholder="Meta Descriptions"><?=$d->meta_description?></textarea>
											</div>
										</div>
							        </div>
							        <div class="modal-footer">
							            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							            <button type="submit" class="btn btn-primary">Update Meta Tags</button>
							        </div>
							  	  </form>
							    </div>
							  </div>
							</div>

							<!--===============================================================================================================-->

						<?php $i++;} ?>	
					<?php } ?>					
				</tbody>
			</table>
		</div>
	</div>		