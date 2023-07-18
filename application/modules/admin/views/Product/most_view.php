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
					<span class="breadcrumb-item active">Most View</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Most View</h5>
			</div>
			<table class="table datatable-show-all">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>Product Name</th>
						<th>Product Category</th>
						<th>Total Count</th>
					</tr>
				</thead>
				<tbody>	
					<?php if($details){ 
					$i=1; foreach($details as $d) { ?>
					<tr>
						<?php 
						$product_id  = $d->product_id;						
						$product_details  = $this->BlankModel->customQuery("select product_name,category from products where id='$product_id'");
						$category_id = $product_details[0]->category;
						$category_details = $this->BlankModel->customQuery("select name from category where id='$category_id'");?>
						
						<td><?=$i?></td>	
						<td><?=$product_details[0]->product_name?></td>
						<td><?=$category_details[0]->name?></td>	
						<td><?=$d->total?></td>					
					</tr>
					<?php $i++; } } ?>						
				</tbody>
			</table>
		</div>
	</div>