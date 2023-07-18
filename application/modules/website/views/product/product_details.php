<?php
    $product_id = $details[0]->id;
    $user_id    = $this->session->user->id;
    $check_cart = $this->BlankModel->customQuery("select product_id from cart where product_id='$product_id' and user_id='$user_id'");
?>

<section class="product-details pt-5">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="pro-img-zoom">
                    <img class="pro_zoom" src='<?=base_url()?>uploads/<?=$details[0]->feature_image?>' data-zoom-image="<?=base_url()?>uploads/<?=$details[0]->feature_image?>"/>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 pb-4">
                <div class="pro-d-info">
                    <h2 class="pro-d-nm">
                        <?=$details[0]->product_name?>
                    </h2>

                    <div class="row">
                        <div class="col-md-5">
                            <p class="pro-d-id mb-0">
                                <span>Product ID :</span> <?=$details[0]->sku_code?>
                            </p>
                        </div> 
                        <div class="col-md-6">
                            <div class="quick_pro_rate">
                                <div class="rate">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>

                                    <span>4.5 <a href=""> 642 reviews</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="pro-d-ca mb-md-0">
                                <span>Product Category :</span> 
                                <?php foreach($category as $key => $c){ ?>
                                    <a href="javascript:void(0);" title=""><?=$c->cat_name?></a>
                                <?php } ?>
                            </p>

                            <p class="tagged_as">
                                Tags: 
                                <?php foreach($tags as $t){ ?>
                                    <a href="javascript:void(0);" rel="tag"><?=$t?></a>
                                <?php } ?>                                
                            </p>
                        </div>
                    </div>

                    <div class="quick_pro_rate">
                        <p class="pro-d-desc">
                            <?=$details[0]->short_desc?>
                        </p>

                        <h2 class="quick_pro_pri">$399.00</h2>

                        <p class="pro-d-deliver-chrg">
                            Delivery fees applicable 
                            <a href="">Know charges</a>
                        </p>
                        <!-- <p class="pro-d-stock">In stock</p> -->
                        <div class="btn-ground">                                                        
                            <?php if(count($check_cart)>0){ ?>
                                <a href="<?=base_url()?>cart">
                                <button type="button" class="btn nav-btn">
                                    <span class="fa fa-shopping-cart"></span> GO TO BASKET
                                </button></a>
                            <?php }else{ ?>
                                <div class="pro-d-qun">
                                    <i class="fa fa-minus" onclick="decrease_Value()" value="Decrease Value" aria-hidden="true"></i>
                                        <input type="text" id="qty" value="1">
                                    <i class="fa fa-plus" onclick="increase_Value()" value="Increase Value" aria-hidden="true"></i>
                                </div>
                                <button type="button" onclick="return add_to_cart(<?=$details[0]->id?>);" class="btn nav-btn">
                                    <span class="fa fa-shopping-cart"></span> ADD TO BASKET
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <hr>

        <section class="pro-d-v-tab pt-4 pb-4">
            <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    DESCRIPTION
                </a>

                <!-- <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#spec" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    SPECIFICATION
                </a> -->

                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">ADDITIONAL INFORMATION</a>

                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                      REVIEWS (3)
                </a>
            </div>

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane p-3 fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <?=$details[0]->long_desc?>
                </div>

                <!-- <div class="tab-pane p-3 fade" id="spec" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                </div> -->

                <div class="tab-pane p-3 fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <?=$details[0]->aditional_info?>
                </div>

                <div class="tab-pane p-3 fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="text-right mb-3">
                        <button type="button" class="btn nav-btn" data-toggle="modal" data-target="#add_comment_mdl">
                            RATE PRODUCT
                        </button>
                    </div>
                    <ul class="review_list list-unstyled mb-0">
                        <li>
                            <div class="rev_img">
                                <img src="<?=base_url()?>assets/website/image/user_rev.png" alt="">
                            </div>

                            <p class="mb-0">
                                <b>shaecreams</b> - 12th November 2019
                            </p>

                            <div class="cus_rev" role="img" aria-label="Rated 3.67 out of 5">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>

                            <p class="mb-0 mt-2">
                                Amazing amazing – just embraces my daily moisturising needs organic and natural without any of those nastie chemicals Keep up the good work guys
                            </p>
                        </li>


                        <li>
                            <div class="rev_img">
                                <img src="<?=base_url()?>assets/website/image/user_rev.png" alt="">
                            </div>

                            <p class="mb-0">
                                <b>shaecreams</b> - 12th November 2019
                            </p>

                            <div class="cus_rev" role="img" aria-label="Rated 3.67 out of 5">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>

                            <p class="mb-0 mt-2">
                                Amazing amazing – just embraces my daily moisturising needs organic and natural without any of those nastie chemicals Keep up the good work guys
                            </p>
                        </li>


                        <li>
                            <div class="rev_img">
                                <img src="<?=base_url()?>assets/website/image/user_rev.png" alt="">
                            </div>

                            <p class="mb-0">
                                <b>shaecreams</b> - 12th November 2019
                            </p>

                            <div class="cus_rev" role="img" aria-label="Rated 3.67 out of 5">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>

                            <p class="mb-0 mt-2">
                                Amazing amazing – just embraces my daily moisturising needs organic and natural without any of those nastie chemicals Keep up the good work guys
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="pt-4">

            <h4 class="bg-light p-3 mb-4">Related Products</h4>

            <div class="oth-pro-slider">
                <?php foreach($related as $r){ ?>
                    <div class="pro-box">
                        <div class="pro-img">
                            <img src="<?=base_url()?>uploads/<?=$r->feature_image?>" alt="">
                            
                        </div>
                        <div class="pro-dtls">
                            <a class="pro-nm" href="<?=base_url()?>product-details/<?=$r->product_slug?>"><?=$r->product_name?></a>
                            <div class="pro-rate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                            </div>
                            <p class="pro-price">$399</p>
                            <div class="text-center">
                                <a href="javascript:void(0);" class="add-cart">ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>

    </div>
</section>