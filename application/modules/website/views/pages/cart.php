
<section class="container cart-sec pt-6">
    <div class="row">
        <?php if(count($details)>0){ ?>
        <div class="col-lg-8 col-md-12">
            <div class="cart-box shadow-sm">
                <div class="cart-box-head">
                    <h4>
                    My Cart
                    [ <span><?=count($details)?></span> ]
                    </h4>
                </div>
                <div class="cart-box-pro">
                    <?php if(count($details)>0){ ?>
                        <?php foreach($details as $d){ ?>
                            <div class="row cart-pro-item">
                                <div class="col-md-4">
                                    <div class="cart-item-img">
                                        <img src="<?=base_url()?>uploads/<?=$d['feature_image']?>" alt="">
                                        <div class="pro-d-qun cart-item-qun">
                                            <i class="fa fa-minus" onclick="decreaseValue(<?=$d['cart_id']?>)" value="Decrease Value" aria-hidden="true"></i>
                                                <input type="text" id="cart_qty<?=$d['cart_id']?>" value="<?=$d['quantity']?>">
                                            <i class="fa fa-plus" onclick="increaseValue(<?=$d['cart_id']?>)" value="Increase Value" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="cart-item-detail">
                                        <div class="row cart-d-row">
                                            <div class="col-md-6">
                                                <a href="javascript:void(0);" class="pro-nm cart-item-nm">
                                                    <?=$d['product_name']?>
                                                </a>
                                                <p class="pro-d-id cart-item-id">
                                                    <span>Product ID :</span> <?=$d['sku_code']?>
                                                </p>
                                                <p class="pro-price cart-item-pri">$399.00</p>
                                            </div>
                                            <div class="col-md-6">

                                                <?php $delivery_days = config('DELIVERY_DAYS', 'value'); ?>

                                                <p class="dilivery-c">Delivery within <?=$delivery_days?> days | $80.00</p>

                                                <div class="sav-remv text-right">
                                                    <a href="javascript:void(0)" onclick="update_cart('<?=$d['cart_id']?>');" class="sav-ltr">Update</a>
                                                    <a href="javascript:void(0)" onclick="remove_cart('<?=$d['cart_id']?>');" class="remv">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php }else{ ?>
                        <div class="row cart-pro-item pl-2">
                            <span>Your cart is empty</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="cart-pri-dtls  shadow-sm">
                <div class="cart-box-head">
                    <h4>Basket totals</h4>
                </div>
                <div class="cart-pri-list position-relative">
                    <p>Subtotal (3 item)<span>$399.00</span></p>
                    <p>Shipping <span>$40.00</span></p>
                    <p>
                    Weight Based Shipping: $14.35 <br> Shipping to United States (US).

                    <a href="javascript:;" class="changeAdd">Change address</a>
                    </p>

                    <form action="" class="card-body changeAddForm shadow-sm" style="display: none;">
                        <div class="form-group">
                            <select class="form-control">
                                <option value="">United State [us]</option>
                                <option value="">United Kingdom [uk]</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control">
                                <option value="">Select an option…</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                                <option value="AA">Armed Forces (AA)</option>
                                <option value="AE">Armed Forces (AE)</option>
                                <option value="AP">Armed Forces (AP)</option>
                            </select>
                        </div>

                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="City">
                        </div>

                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Postcode / ZIP">
                        </div>


                        <div class="text-right">
                        <button type="submit" class="btn nav-btn browse-btn">
                        Submit
                        </button>
                        </div>
                    </form>
                </div>
                <p class="total">Total Payable <span>$160.00</span></p>
            </div>
        </div>

        <div class="col-md-8">
            <div class="text-right">
                <a href="" class="btn pink-btn mt-4">Continue Shopping</a>
                <?php if($this->session->user->id){ ?>
                    <a href="#" class="btn nav-btn browse-btn mt-4">Place Order</a>
                <?php }else{ ?>
                    <!-- <a href="javascript:void(0);" onclick="return login_alert();" class="btn nav-btn browse-btn mt-4">Place Order</a> -->
                         <a href="javascript:void(0);" data-toggle="modal" data-target="#sign-in" class="btn nav-btn browse-btn mt-4">Place Order</a>
                <?php } ?>
            </div>
        </div>
        <?php }else{ ?>
        <div class="col-lg-12 col-md-12">
            <div class="cart-box shadow-sm">
                <div class="cart-box-head">
                    <h4>
                    My Cart
                    [ <span><?=count($details)?></span> ]
                    </h4>
                </div>
                <div class="cart-box-pro">
                    <div class="cart-pro-item pl-2">
                        <p class="cart-text">Your cart is empty</p>
                    </div>                    
                </div>
            </div>
            <div class="text-right mt-3">
                <a href="<?=base_url()?>shop"><button class="btn nav-btn nav-smpl-btn">Continue Shopping</button></a>
            </div>
        </div>
        <?php } ?>
    </div>
</section>