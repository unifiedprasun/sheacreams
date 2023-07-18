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
					<a href="javascript:void(0)" class="breadcrumb-item">Customer Management</a>
					<span class="breadcrumb-item active">Customer Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<a href="<?=base_url()?>admin/Customer/add_customer"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Add New Customer</button></a>
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

								<a href="javascript:void(0)" data-toggle="modal" data-target="#user<?=$d->id?>" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round"><i class="fa fa-eye"></i></a>

								<a href="<?=base_url()?>admin/Customer/delete_user/<?=$d->id?>" onclick="return confirm('Are you want to deleted this user ?');" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2"><i class="fa fa-trash"></i></a>								

								<?php if($d->is_active == 0){ ?>
			                    	<a href="<?=base_url()?>admin/Customer/active_user/<?=$d->id?>/1" onclick="return confirm('Are you want to active this user ?');" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2"><i class="fa fa-thumbs-up"></i></a>
			                    	<?php }else{ ?>
			                    	<a href="<?=base_url()?>admin/Customer/active_user/<?=$d->id?>/0" onclick="return confirm('Are you want to inactive this user ?');" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2"><i class="fa fa-thumbs-down"></i></a>
		                    	<?php } ?>

							</div>
						</div>

				    	<div class="card-body text-center">
				    		<h6 class="font-weight-semibold mb-0"><?=$d->name?></h6>
				    		<span class="d-block text-muted"><?=$d->email?></span>

			    			<div class="list-icons list-icons-extended mt-3">
		                    	<a href="javascript:void(0)" data-toggle="modal" data-target="#user<?=$d->id?>" class="list-icons-item" data-popup="tooltip" title="View" data-container="body"><i class="fa fa-eye"></i></a>
		                    	<a href="<?=base_url()?>admin/Customer/delete_user/<?=$d->id?>" onclick="return confirm('Are you want to deleted this user ?');" class="list-icons-item" data-popup="tooltip" title="Delete" data-container="body"><i class="fa fa-trash"></i></a>
		                    	<?php if($d->is_active == 0){ ?>
			                    	<a href="<?=base_url()?>admin/Customer/active_user/<?=$d->id?>/1" onclick="return confirm('Are you want to active this user ?');" class="list-icons-item" data-popup="tooltip" title="Active" data-container="body"><i class="fa fa-thumbs-up"></i></a>
			                    	<?php }else{ ?>
			                    	<a href="<?=base_url()?>admin/Customer/active_user/<?=$d->id?>/0" onclick="return confirm('Are you want to inactive this user ?');" class="list-icons-item" data-popup="tooltip" title="Inactive" data-container="body"><i class="fa fa-thumbs-down"></i></a>
		                    	<?php } ?>
	                    	</div>
				    	</div>
			    	</div>
				</div>

				<div class="modal fade" id="user<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
				        
				      </div>
				      <form class="form-validate-jquery" action="<?=base_url()?>admin/Customer/update_user/<?=$d->id?>" method="post" enctype="multipart/form-data">	
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
									<input type="hidden" name="old_image" value="<?=$d->image?>" class="form-input-styled" data-fouc>
								</div>
							</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				        <button type="submit" class="btn btn-primary">Update User</button>
				      </div>
				  </form>
				    </div>
				  </div>
				</div>
				
				<?php } ?>
			<?php }else{ ?>
				<div class="col-md-12" style="border: 1px solid #dadada; background: #fff;">
					<p style="color: red; font-size: 18px; text-align: center; font-weight: 600; padding: 30px 30px 20px 30px;">NO DATA FOUND IN USER LISTS</p>
				</div>
			<?php } ?>
		</div>
		<div id="pagination ">
            <ul class="tsc_pagination flex-right">
                <?=$links?>
            </ul>
        </div>
	</div>

