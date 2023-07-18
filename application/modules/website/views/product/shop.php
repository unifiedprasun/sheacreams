    <div class="hero banner_2" style="background-image: url(<?=base_url()?>uploads/<?=$banner?>);">
        <div class="hero-content">
            
        </div>
    </div>

    <div class="">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Search</li>
        </ol>
      </nav>
    </div>

    <div class="container-fluid pt-4">
      <h4 class="bg-light p-3 mb-4">Shop</h4>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="row">
            <?php foreach($details as $d){ 
            $product_id = $d->id;
            $user_id    = $this->session->user->id;
            $check_cart = $this->BlankModel->customQuery("select product_id from cart where product_id='$product_id' and user_id='$user_id'");
            ?>
                <div class="col-lg-3 col-md-6 col-6">
                  <div class="pro-box">
                      <div class="pro-img">
                          <img src="<?=base_url()?>uploads/<?=$d->feature_image?>" alt="">
                      </div>
                      <div class="pro-dtls">
                          <a class="pro-nm" href="<?=base_url()?>product-details/<?=$d->product_slug?>"><?=$d->product_name?></a>
                          <div class="pro-rate">
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star-half-o" aria-hidden="true"></i>
                          </div>
                          <p class="pro-price">$399</p>
                          <div class="text-center">
                              <?php if(count($check_cart)>0){ ?>
                                  <a href="<?=base_url()?>cart" class="add-cart">GO TO BASKET</a>
                              <?php }else{ ?>
                                  <a href="javascript:void(0);" onclick="return add_to_cart(<?=$d->id?>);" class="add-cart">ADD TO BASKET</a>
                              <?php } ?>
                          </div>
                      </div>
                  </div>
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>