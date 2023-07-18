<style type="text/css">
	.card-header {
	    margin-bottom: 0px !important;
	}
</style>

<div class="content-wrapper">

	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Mailbox</span> - Read Mail</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

			<div class="header-elements d-none">
				<form action="#">
					<div class="form-group form-group-feedback form-group-feedback-right">
						<input type="search" class="form-control wmin-200" placeholder="Search messages">
						<div class="form-control-feedback">
							<i class="icon-search4 font-size-base text-muted"></i>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<a href="mail_read.html" class="breadcrumb-item">Mailbox</a>
					<span class="breadcrumb-item active">Read mail</span>
				</div>

				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">

		<div class="d-md-flex align-items-md-start">
			<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left border-0 shadow-0 sidebar-expand-md">
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
									<a href="<?=base_url()?>admin/Enquery" class="nav-link active">
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
									<a href="<?=base_url()?>admin/Enquery/trash_lists" class="nav-link"><i class="icon-bin"></i> Trash</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="flex-fill overflow-auto">

					<div class="card">
						<div class="navbar navbar-light bg-light navbar-expand-lg border-bottom-0 py-lg-2 rounded-top">
							<div class="text-center d-lg-none w-100">
								<button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-read">
									<i class="icon-circle-down2"></i>
								</button>
							</div>

							<div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-read">
								<div class="mt-3 mt-lg-0 mr-lg-3">
									<div class="btn-group">
										<?php if($details[0]->is_reply == 0){ ?>
										<button type="button" style="margin-right: 5px;" class="btn btn-light" data-toggle="modal" data-target="#reply">
											<i class="fa fa-reply"></i><span class="d-none d-lg-inline-block ml-2">Reply</span>
										</button>
										<?php }else{ ?>
										<button type="button" style="margin-right: 5px;" class="btn btn-light" onclick="return confirm('Reply already done');">
											<i class="fa fa-reply"></i><span class="d-none d-lg-inline-block ml-2">Reply</span>
										</button>
										<?php } ?>
										<a href="<?=base_url()?>admin/Enquery/delete_enquery_single/<?=$details[0]->id?>">
					                    	<button type="button" onclick="return confirm('Are you want to deleted ?');" class="btn btn-light">
					                    		<i class="icon-bin"></i><span class="d-none d-lg-inline-block ml-2">Delete</span>
				                    		</button>
			                    		</a>
									</div>
								</div>
								<div class="navbar-text ml-lg-auto"><?=date('m F Y h:i A', strtotime($details[0]->date))?></div>
							</div>
						</div>

						<div class="card-body">
							<div class="media flex-column flex-md-row">
								<a href="#" class="d-none d-md-block mr-md-3 mb-3 mb-md-0">
									<span class="btn bg-teal-400 btn-icon btn-lg rounded-round">
										<span class="letter-icon"></span>
									</span>
								</a>
								<div class="media-body">
									<h6 class="mb-0"><?=$details[0]->subject?></h6>
									<div class="letter-icon-title font-weight-semibold"><?=$details[0]->name?> <a href="#">&lt;<?=$details[0]->email?>&gt;</a></div>
								</div>								
							</div>
						</div>

						<div class="card-body">
							<div class="overflow-auto mw-100">
								<?=$details[0]->message?>
							</div>
						</div>
						<?php if($details[0]->reply_message !=''){ ?>
						<div class="card-body">
							<div class="overflow-auto mw-100">
								<span style="color: red; font-weight: 600;">Reply Message :</span> <?=$details[0]->reply_message?>
							</div>
						</div>
						<?php } ?>

						<div class="card-body border-top">	
							<ul class="list-inline mb-0">
								<li class="list-inline-item">
									<?php if($details[0]->is_reply == 0){ ?>
									<button class="btn btn-success" data-toggle="modal" data-target="#reply"><i class="fa fa-reply"></i>&nbsp;&nbsp; Reply</button>
									<?php }else{ ?>
									<button class="btn btn-success" onclick="return confirm('Reply already done');"><i class="fa fa-reply"></i>&nbsp;&nbsp; Reply</button>
									<?php } ?>
								</li>
								<li class="list-inline-item">
									<a href="<?=base_url()?>admin/Enquery/delete_enquery_single/<?=$details[0]->id?>"><button class="btn btn-danger" onclick="return confirm('Are you want to deleted ?');"><i class="fa fa-trash"></i>&nbsp;&nbsp; Delete</button></a>
								</li>
							</ul>
						</div>
					</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Reply To : <?=$details[0]->email?></h5>
	      </div>
	      <form class="form-validate-jquery" action="<?=base_url()?>admin/Enquery/enquery_reply/<?=$details[0]->id?>" method="post">	
		       <div class="modal-body">
				    <div class="form-group">
						<label>Email To </label>						
						<input type="email" name="email" readonly value="<?=$details[0]->email?>" class="form-control" required placeholder="Title">
					</div>
					<div class="form-group">
						<label>Subject </label>						
						<input type="text" name="subject" readonly value="Re : <?=$details[0]->subject?>" class="form-control" required placeholder="Title">
					</div>
					<div class="form-group">
						<label>Message </label>						
						<textarea class="form-control" name="reply_message" required></textarea>						
					</div>
	      	  	</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-primary">Send Reply</button>
		      </div>
	  	  </form>
	    </div>
	  </div>
	</div>