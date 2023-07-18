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
					<a href="javascript:void(0)" class="breadcrumb-item">Settings Management</a>
					<span class="breadcrumb-item active">User Credentials</span>
				</div>
				<a href="javascript:void(0)" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header header-elements-inline">
						<h6 class="card-title">User Credentials</h6>					
					</div>
					<table class="table datatable-show-all">
						<thead>
							<tr>
								<th>SL NO</th>
								<th>Name</th>
								<th>Email Address</th>
								<th>Contact Number</th>
								<th>Status</th>
								<th>Password</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($users)>0){ ?>
								<?php $i=1;foreach($users as $a){ ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$a->name?></td>
										<td><?=$a->email?></td>
										<td><?=$a->mobile?></td>
										<td>
											<?php if($a->is_active == 0){ ?>
												<button class="btn btn-warning" style="border-radius: 20px;">Inactive</button>
											<?php }else{ ?>
												<button class="btn btn-success" style="border-radius: 20px;">Active</button>
											<?php } ?>
										</td>
										<td><?=base64_decode($a->password)?></td>
									</tr>	
								<?php $i++;} ?>	
							<?php } ?>													
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>