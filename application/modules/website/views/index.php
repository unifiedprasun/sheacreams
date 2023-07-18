       
        
        <div class="hero" style="background-image: url(<?=base_url()?>uploads/<?=$home_banner[0]->banner_image?>);">
            <div class="hero-content">
                <a href="javascript:void(0);" class="shop-now">Shop now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>


        <section class="pt-6 shcrem" style="background: url(<?=base_url()?>assets/website/image/smoke1.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="shcrem-dtls">
                            <h1 class="heading-font"><?=$content_one[0]->content_title?></h1>
                            <div class="para_bg">
                                <?=$content_one[0]->content1?>
                            </div>
                            <h4>24 hour Moisturizer for Body, Hands and Feet Designed for Men and Women</h4>

                            <div class="row m-0  justify-content-center">
                                <ul class="proCatList col-lg-7 col-md-4 col-6">
                                    <li><b>BENEFITS</b></li>
                                    <?=$content_one[0]->content3?>
                                </ul>
                                <ul class="proCatList col-lg-5 col-md-4 col-6">
                                    <li><b>CONCERNS</b></li>
                                    <?=$content_one[0]->content4?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center h-100 aftr-hero-img">
                                    <a href="javascript:void(0);">
                                        <div class="img-box shadow-sm mb-4">
                                            <img src="<?=base_url()?>uploads/<?=$content_one[0]->image1?>" alt="">
                                            <p>Best sellings</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="aftr-hero-img">
                                    <a href="javascript:void(0);">
                                        <div class="img-box shadow-sm mb-4">
                                            <img src="<?=base_url()?>uploads/<?=$content_one[0]->image2?>" alt="">
                                            <p>Know your skin</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="aftr-hero-img">
                                    <a href="javascript:void(0);">
                                        <div class="img-box shadow-sm">
                                            <img src="<?=base_url()?>uploads/<?=$content_one[0]->image3?>" alt="">
                                            <p>Popular sellings</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    


    <section class="pt-6">
        <div class="container">
            <div class="mb-5">
                <h1 class="heading-font text-center sec-heading">Our Products</h1>
            </div>

            <ul class="nav nav-tabs justify-content-center our_pro_tab" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ALL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                    BEST SELLING
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                    POPULAR SELLING
                </a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <?php foreach($all_product as $ap){ 
                        $product_id = $ap->id;
                        $user_id    = $this->session->user->id;
                        $check_cart = $this->BlankModel->customQuery("select product_id from cart where product_id='$product_id' and user_id='$user_id'");
                        ?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="pro-box">
                                    <div class="pro-img">
                                        <img src="<?=base_url()?>uploads/<?=$ap->feature_image?>" alt="">
                                    </div>
                                    <div class="pro-dtls">
                                        <a class="pro-nm" href="<?=base_url()?>product-details/<?=$ap->product_slug?>"><?=$ap->product_name?></a>
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
                                                <a href="javascript:void(0);" onclick="return add_to_cart(<?=$ap->id?>);" class="add-cart">ADD TO BASKET</a>
                                            <?php } ?>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <?php foreach($bestsell as $ap){ ?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="pro-box">
                                    <div class="pro-img">
                                        <img src="<?=base_url()?>uploads/<?=$ap->feature_image?>" alt="">
                                    </div>
                                    <div class="pro-dtls">
                                        <a class="pro-nm" href="<?=base_url()?>product-details/<?=$ap->product_slug?>"><?=$ap->product_name?></a>
                                        <div class="pro-rate">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                        </div>
                                        <p class="pro-price">$399</p>
                                        <div class="text-center">
                                            <a href="javascript:void(0);" onclick="return add_to_cart(<?=$ap->id?>);" class="add-cart">ADD TO BASKET</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <?php foreach($popular as $ap){ ?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="pro-box">
                                    <div class="pro-img">
                                        <img src="<?=base_url()?>uploads/<?=$ap->feature_image?>" alt="">
                                    </div>
                                    <div class="pro-dtls">
                                        <a class="pro-nm" href="<?=base_url()?>product-details/<?=$ap->product_slug?>"><?=$ap->product_name?></a>
                                        <div class="pro-rate">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                        </div>
                                        <p class="pro-price">$399</p>
                                        <div class="text-center">
                                            <a href="javascript:void(0);" onclick="return add_to_cart(<?=$ap->id?>);" class="add-cart">ADD TO BASKET</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </section>





    <section class="pt-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <h1 class="heading-font text-center">Natural Origin Cosmetics</h1>
                  <p class="af-heading text-center">Customers Satisfaction</p>
                </div>
                <?php foreach($content_two as $c){ ?>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="gen-cos-list">
                            <img src="<?=base_url()?>uploads/<?=$c->image?>" alt="">
                            <h4 class="text-center mb-2"><?=$c->content_title?></h4>
                            <p class="text-center"><?=$c->content?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="pt-6 brand_slider_con">
        <div class="container">
            <div class="row">
                <div class="col-md-3 brand-right">
                    <h4><?=config('FOOTER_SLIDER_TEXT', 'value')?></h4>
                </div>
                <div class="col-md-9">
                    <div class="brand-slider">
                        <?php foreach($content_three as $c){ ?>
                            <a href="<?=$c->url?>">
                                <div class="brand-img-box">
                                    <div class="inner"  style="background: url('<?=base_url()?>uploads/<?=$c->image?>')">
                                        <p><?=$c->content_title?></p>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>