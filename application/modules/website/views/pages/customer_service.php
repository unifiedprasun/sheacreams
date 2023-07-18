    <div class="hero banner_2" style="background-image: url(<?=base_url()?>uploads/<?=$banner?>);">
        <div class="hero-content">
            
        </div>
    </div>


    <div class="">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Customer Service</li>
        </ol>
      </nav>
    </div>


    <div class="container-fluid">
        <h4 class="bg-light p-3 mb-4">Customer Service</h4>


        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center mt-3">
                   <div class="card pb-4">
                     <i class="fa fa-envelope-o mt-4" aria-hidden="true" style="font-size: 30px;"></i>
                     <div class="card-body">
                       <h3>EMAIL</h3>
                       <?=config('CUSTOMER_SERVICE_EMAIL', 'value')?>
                     </div>
                   </div>
                </div>
                <div class="col-md-6 text-center mt-3">
                   <div class="card pb-4">
                     <i class="fa fa-volume-control-phone mt-4" aria-hidden="true" style="font-size: 30px;"></i>
                     <div class="card-body">
                       <h3>CUSTOMER CARE</h3>
                       <?=config('CUSTOMER_SERVICE_CALL', 'value')?>
                     </div>
                   </div>
                </div>
           </div>
        </div>
    </div>