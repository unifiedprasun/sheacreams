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
					<span class="breadcrumb-item active">Comment Details</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>				
			<a href="<?=base_url()?>admin/Blog/blog_lists"><button class="btn btn-warning" type="button" style="padding: 5px !important;">Blog Details</button></a>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Comment Details</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Name</th>
						<th>Email</th>
						<th style="width: 480px;">Comment</th>
						<th>Comment Date</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($details)>0){ ?>
						<?php $i=1;foreach($details as $d){ ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$d->name?></td>
								<td><?=$d->email?></td>
								<td><?=$d->comment?></td>
								<td><?=date('d F Y', strtotime($d->added_on))?></td>								
							</tr>
						<?php $i++;} ?>	
					<?php } ?>					
				</tbody>
			</table>
		</div>
	</div>		