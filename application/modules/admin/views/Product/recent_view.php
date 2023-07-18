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
					<a href="javascript:void(0)" class="breadcrumb-item">Product Statistics</a>
					<span class="breadcrumb-item active">Recent View</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Recent View</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Product Name</th>
						<th>Product Category</th>
						<th>IP Address</th>
						<th>View Date</th>
					</tr>
				</thead>
				<tbody>	
					<?php if($details){ 
					$i=1; foreach($details as $d) { ?>
					<tr>
						<td><?=$i?></td>	
						<td><?=$d->product_name?></td>
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
						<td><?=$d->ip_address?></td>
						<td><?=date('d F Y', strtotime($d->date))?></td>						
					</tr>
					<?php $i++; } } ?>						
				</tbody>
			</table>
		</div>
	</div>