<style type="text/css">
	a.list-icons-item>i {
	    background: #263238;
	    height: 30px;
	    font-size: 14px;
	    width: 30px;
	    padding: 8px;
	    color: #fff;
	    border-radius: 5px;
	}
	.img-fluid {
	    max-width: 100%;
	    height: 150px;
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
					<a href="javascript:void(0)" class="breadcrumb-item">Writer Management</a>
					<span class="breadcrumb-item active">Writer Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Writer/add_Writer"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Add New Writer</button></a>
		</div>
	</div>

	<div class="content">

		<div class="row">
			<?php if(count($details)>0){ ?>
				<?php foreach($details as $d){ ?>
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-img-actions">
								<?php if($d->image == ''){ ?>
		                    	<img class="card-img-top img-fluid" src="<?=base_url()?>assets/admin/user.png" alt="">
		                    	<?php }else{ ?>
		                    	<img class="card-img-top img-fluid" src="<?=base_url()?>uploads/<?=$d->image?>" alt="">
		                    	<?php } ?>							
								<div class="card-img-actions-overlay card-img-top">

									<a href="javascript:void(0)" data-toggle="modal" data-target="#Writer<?=$d->id?>" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round"><i class="fa fa-eye"></i></a>

									<a href="<?=base_url()?>admin/Writer/delete_Writer/<?=$d->id?>" onclick="return confirm('Are you want to deleted this writer ?');" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2"><i class="fa fa-trash"></i></a>								

									<?php if($d->is_active == 0){ ?>
				                    	<a href="<?=base_url()?>admin/Writer/active_Writer/<?=$d->id?>/1" onclick="return confirm('Are you want to active this writer ?');" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2"><i class="fa fa-thumbs-up"></i></a>
				                    	<?php }else{ ?>
				                    	<a href="<?=base_url()?>admin/Writer/active_Writer/<?=$d->id?>/0" onclick="return confirm('Are you want to inactive this writer ?');" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2"><i class="fa fa-thumbs-down"></i></a>
			                    	<?php } ?>

			                    	<a href="javascript:void(0)" data-toggle="modal" data-target="#password<?=$d->id?>" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2"><i class="fa fa-key"></i></a>	

								</div>
							</div>

					    	<div class="card-body text-center">
					    		<h6 class="font-weight-semibold mb-0"><?=$d->name?></h6>
					    		<span class="d-block text-muted"><?=$d->email?></span>

				    			<div class="list-icons list-icons-extended mt-3">

			                    	<a href="javascript:void(0)" data-toggle="modal" data-target="#writer<?=$d->id?>" class="list-icons-item" data-popup="tooltip" title="View" data-container="body"><i class="fa fa-eye"></i></a>

			                    	<a href="<?=base_url()?>admin/Writer/delete_writer/<?=$d->id?>" onclick="return confirm('Are you want to deleted this writer ?');" class="list-icons-item" data-popup="tooltip" title="Delete" data-container="body"><i class="fa fa-trash"></i></a>

			                    	<?php if($d->is_active == 0){ ?>
				                    	<a href="<?=base_url()?>admin/Writer/active_writer/<?=$d->id?>/1" onclick="return confirm('Are you want to active this writer ?');" class="list-icons-item" data-popup="tooltip" title="Active" data-container="body"><i class="fa fa-thumbs-up"></i></a>
				                    	<?php }else{ ?>
				                    	<a href="<?=base_url()?>admin/Writer/active_writer/<?=$d->id?>/0" onclick="return confirm('Are you want to inactive this writer ?');" class="list-icons-item" data-popup="tooltip" title="Inactive" data-container="body"><i class="fa fa-thumbs-down"></i></a>
			                    	<?php } ?>

			                    	<a href="javascript:void(0)" data-toggle="modal" data-target="#password<?=$d->id?>" class="list-icons-item" data-popup="tooltip" title="Update Password" data-container="body"><i class="fa fa-key"></i></a>

		                    	</div>
					    	</div>
				    	</div>
					</div>

					<!--==========================================Writer Details===============================================-->
					<div class="modal fade" id="writer<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Edit Writer</h5>
					        
					      </div>
					      <form class="form-validate-jquery" action="<?=base_url()?>admin/Writer/update_writer/<?=$d->id?>" method="post" enctype="multipart/form-data">	
						      <div class="modal-body">
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Name </label>
									<div class="col-lg-9">
										<input type="text" name="name" value="<?=$d->name?>" class="form-control" required placeholder="Name">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Username </label>
									<div class="col-lg-9">
										<input type="text" name="username" value="<?=$d->username?>" class="form-control" required placeholder="Username">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Email Address </label>
									<div class="col-lg-9">
										<input type="email" name="email" readonly value="<?=$d->email?>" class="form-control" required placeholder="Email Address">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Contact Number </label>
									<div class="col-lg-9">
										<input type="number" name="mobile" maxlength="10" readonly value="<?=$d->mobile?>" class="form-control" required placeholder="Contact Number">
									</div>
								</div>			
								<div class="form-group row">							
									<label class="col-form-label col-lg-3">Profile Image </label>							
									<div class="col-lg-9">
										<?php if($d->image !=''){ ?>
										<div class="show-image">
											<img src="<?=base_url()?>uploads/<?=$d->image?>" width="150" height="100">
										</div>
										<?php } ?>
										<input type="file" name="image" class="form-input-styled" data-fouc>
										<input type="hidden" value="<?=$d->image?>" name="old_image" class="form-input-styled" data-fouc>
									</div>
								</div>	
					          </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						        <button type="submit" class="btn btn-primary">Update Writer</button>
						      </div>
					  	  </form>
					    </div>
					  </div>
					</div>
					<!--==========================================Writer Password===============================================-->
					<div class="modal fade" id="password<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>				        
					      </div>
					      <form class="" action="<?=base_url()?>admin/Writer/update_password/<?=$d->id?>" method="post">	
					      	  <input type="hidden" name="name" value="<?=$d->name?>">
						      <div class="modal-body">
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Email Address </label>
									<div class="col-lg-9">
										<input type="text" readonly name="email" value="<?=$d->email?>" class="form-control" placeholder="Email Address">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-3">New Password </label>
									<div class="col-lg-9">
										<input type="password" name="new_pass" id="new_pass<?=$d->id?>" class="form-control" required placeholder="New Password">
										<span id="new_pass_alert<?=$d->id?>"></span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Confirm Password </label>
									<div class="col-lg-9">
										<input type="password" name="con_pass" id="con_pass<?=$d->id?>" class="form-control" required placeholder="Confirm Password">
										<span id="con_pass_alert<?=$d->id?>"></span>
									</div>
								</div>								
					          </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						        <button type="submit" class="btn btn-primary" onclick="return writer_password_validate(<?=$d->id?>);">Update Password</button>
						      </div>
					  	  </form>
					    </div>
					  </div>
					</div>

				<?php } ?>
			<?php }else{ ?>
				<div class="col-md-12" style="border: 1px solid #dadada; background: #fff;">
					<p style="color: red; font-size: 18px; text-align: center; font-weight: 600; padding: 30px 30px 20px 30px;">NO DATA FOUND IN WRITER LISTS</p>
				</div>
			<?php } ?>
		</div>
	</div>

