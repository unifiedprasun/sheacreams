<style type="text/css">
	.card-header {
	    margin-bottom: 0px !important;
	}
	input[type=checkbox], input[type=radio] {
	    width: 1.25rem !important;
	    height: 1.25rem !important;
	}
	.fa {
	    font-size: large;
	    color: #040404;
	}
</style>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-md">

	<div class="sidebar-content">

		<div class="card">
			<div class="card-header bg-transparent header-elements-inline">
				<span class="text-uppercase font-size-sm font-weight-semibold">Navigation</span>
				<div class="header-elements">
					<div class="list-icons">
                		<a class="list-icons-item" data-action="collapse"></a>
            		</div>
        		</div>
			</div>

			<div class="card-body p-0">
				<ul class="nav nav-sidebar" data-nav-type="accordion">
					<li class="nav-item-header">Folders</li>
					<li class="nav-item">
						<a href="<?=base_url()?>admin/Enquery" class="nav-link">
							<i class="icon-drawer-in"></i>
							Inbox
							<span class="badge bg-success badge-pill ml-auto"><?=count($count)?></span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url()?>admin/Enquery/compose_lists" class="nav-link"><i class="icon-drawer-out"></i> Sent mail</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url()?>admin/Enquery/star_lists" class="nav-link"><i class="icon-stars"></i> Starred</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url()?>admin/Enquery/trash_lists" class="nav-link active"><i class="icon-bin"></i> Trash</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
</div>

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
					<a href="javascript:void(0)" class="breadcrumb-item">Enquery Management</a>
					<span class="breadcrumb-item active">Enquery Details</span>
				</div>

				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>					
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header bg-transparent header-elements-inline">
				<h6 class="card-title">Trash Lists</h6>
			</div>

			<div class="navbar navbar-light bg-light navbar-expand-lg border-bottom-0 py-lg-2">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler w-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-single">
						<i class="icon-circle-down2"></i>
					</button>
				</div>

				<div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-single">
					<div class="mt-3 mt-lg-0">
						<div class="btn-group">
							<button type="button" class="btn btn-light btn-icon btn-checkbox-all">
								<input type="checkbox" onclick="return check_uncheck_checkbox(this.checked);" class="form-input-styled">
							</button>

							<button type="button" onclick="undo_trash_lists();" class="btn btn-light"><i class="fa fa-undo"></i></button>
							
						</div>

						<div class="btn-group ml-3 mr-lg-3">
							<button type="button" class="btn btn-light" data-toggle="modal" data-target="#compose"><i class="icon-pencil7"></i> <span class="d-none d-lg-inline-block ml-2">Compose</span></button>
							<button type="button" class="btn btn-light" onclick="undo_trash_lists();"><i class="fa fa-undo"></i> <span class="d-none d-lg-inline-block ml-2">Undo</span></button>
	                    	
						</div>
					</div>
				</div>
			</div>

			<div class="table-responsive">
				<table class="table table-inbox datatable-show-all" id="sample_5">							
					<thead style="display: none;">
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody data-link="row" class="rowlink">
						<?php if(count($details)>0){ ?>
							<?php foreach($details as $d){ ?>
								<tr class="<?php if($d->is_read == 0){ ?><?php echo "unread"; ?><?php }else{ ?><?php echo "read"; ?><?php } ?>">
									<td class="table-inbox-checkbox rowlink-skip"style="width: 80px">
										<input type="checkbox" name="all" value="<?=$d->id?>"/>
									</td>
									<td class="table-inbox-star rowlink-skip" style="width: 50px">
										
										<?php if($d->is_read == 0){ ?>
											<a href="javascript:void(0)"><i class="fa fa-envelope"></i></a>
										<?php }else{ ?>
											<a href="javascript:void(0)"><i class="fa fa-envelope-open-o"></i></a>
										<?php } ?>
										
									</td>
									<td class="table-inbox-star rowlink-skip" style="width: 50px">
										
										<?php if($d->is_star == 0){ ?>
											<a href="javascript:void(0)"><i class="fa fa-star-o"></i></a>
										<?php }else{ ?>
											<a href="javascript:void(0)"><i class="fa fa-star"></i></a>
										<?php } ?>
										
									</td>
									<td class="table-inbox-image">
										<img src="<?=base_url()?>assets/admin/user.png" class="rounded-circle" width="32" height="32" alt="">
									</td>
									<td class="table-inbox-name" style="width: 300px">
										<a href="javascript:void(0)">
											<div class="letter-icon-title text-default"><?=$d->name?></div>
											<div class="letter-icon-title text-default"><?=$d->email?></div>
										</a>
									</td>
									<td class="table-inbox-message">
										<span class="table-inbox-subject"><?=$d->subject?> &nbsp;-&nbsp;</span>
										<span class="text-muted font-weight-normal"><?=substr($d->message,0,50);?>...</span>
									</td>
									<td class="table-inbox-time" style="width: 200px">
										<?=date('m F Y h:i A', strtotime($d->date))?>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="compose" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Compose Email</h5>
	      </div>
	      <form class="form-validate-jquery" action="<?=base_url()?>admin/Enquery/compose_mail" method="post">	
		       <div class="modal-body">
				    <div class="form-group">
						<label>Email To </label>						
						<input type="email" name="email"  class="form-control" required placeholder="Title">
					</div>
					<div class="form-group">
						<label>Subject </label>						
						<input type="text" name="subject" class="form-control" required placeholder="Title">
					</div>
					<div class="form-group">
						<label>Message </label>						
						<textarea class="form-control" name="message" required placeholder="Write Your Message"></textarea>						
					</div>
	      	  	</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-primary">Send Mail</button>
		      </div>
	  	  </form>
	    </div>
	  </div>
	</div>
