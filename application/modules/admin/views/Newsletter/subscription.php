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
					<a href="javascript:void(0)" class="breadcrumb-item">Subscription Management</a>
					<span class="breadcrumb-item active">Subscription Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Subscription Details</h5>
			</div>

			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Email Address</th>		
						<th>Subscription Date</th>						
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>	
					<?php if ($details){ 
					$i=1; foreach ($details as $d) {?>
					<tr>
						<td>
							<?php if($d->is_subscribe == 1){ ?>
							<input type="checkbox" name="all" value="<?=$d->email?>">
							<?php } ?>
						</td>
						<td><?=$d->email?></td>	
						<td><?=date('d F Y :: h:i A', strtotime($d->subscription_date))?></td>														
						<td>
							<?php if ($d->is_subscribe == 1){?>
								<button class="btn btn-success">Subscribed</button>
							<?php } else{?>
								<button class="btn btn-danger">Unsubscribe</button>
							<?php } ?>
						</td>
						<td>
							<?php if($d->is_subscribe == 1){ ?>
								<a href="<?=base_url()?>admin/Newsletter/unsubscribe/<?=$d->id?>" onclick="return confirm('Are you want to remove from subscription lists ?');" class="btn btn-warning">Unsubscribe Here</a>
							<?php }else{ ?>
								<p style="font-weight: 600; font-size: 13px; color: red">Unsubscribe on : <?=date('d F Y :: h:i A', strtotime($d->unsubscribe_date))?></p>
							<?php } ?>
						</td>
					</tr>

					<?php $i++; } } ?>						
				</tbody>
			</table>
			<div>
				<table class="checkTrashTbl">
					<tr>
						<td>
							<input type="checkbox" onclick='check_uncheck_checkbox(this.checked)'>
						</td>
						<td>								
							<a href="javascript:void(0)"><i class="fa fa-reply" id="subscription_reply"> Reply All</i></a>								
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="reply_all_subscriber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Subscription Message</h5>
	      </div>
	      <form class="form-validate-jquery" action="<?=base_url()?>admin/Newsletter/reply_all" method="post">	
		       <div class="modal-body">		       		
				    <div class="form-group">
						<label>Email To </label>						
						<input type="text" name="email_to" id="result" class="form-control" readonly placeholder="Title">
					</div>
					<div class="form-group">
						<label>Subject </label>						
						<input type="text" name="subject" class="form-control"  placeholder="Title">
					</div>
					<div class="form-group">
						<label>Message </label>						
						<textarea class="form-control" name="message"  placeholder="Write Your Message"></textarea>						
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

	<style type="text/css">
		thead {
		    background: #eef4f7;
		}
		.inbox ul.inbox-nav i {
		    color: #ffffff;
	    	background: #8b969c !important;
		}
		.inbox .inbox-nav li.active a, .inbox .inbox-nav li.active:hover a {
		    color: #fff;
		    background: #8b969c !important;
		}
		.inbox .inbox-nav li:hover a {
		    color: #ffffff;
		    background: #8b969c !important;	}
		.inbox .inbox-nav li a {
			color: #fff;
		    background: #fff;
		}
		.checkTrashTbl td {
		    padding: 5px;
		    border: 1px solid #ccc;
		    width: 35px;
		    text-align: center;
		}
		.checkTrashTbl td i{
			color: #fff;
			font-size: 14px !important;
		}
		tr.unread.odd {
		    font-weight: 600 !important;
		    color: #000;
		}
		tr.unread.even {
		    font-weight: 600 !important;
		    color: #000;
		}
		.checkTrashTbl td {
		    padding: 5px;
		    border: 1px solid #776464;
		    width: auto;
		    text-align: center;
		    background: #32414894;
		}
		input[type=checkbox], input[type=radio] {
		    height: 20px;
		    width: 20px;
		}
	</style>