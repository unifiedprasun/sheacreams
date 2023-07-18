<div class="container pt-6">        
    <div class="address">
         <div class="address-box">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <p>
                <b>Shea Creams</b> - <?=config('FOOTER_ADDRESS_ONE', 'value')?>      
            </p>
         </div>
         <div class="address-box">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <p>
                <b>Shea Creams</b> - <?=config('FOOTER_ADDRESS_TWO', 'value')?>
            </p>
         </div>
         <div class="address-box">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <p>
                <b>Email us</b> - <?=config('FOOTER_EMAIL', 'value')?>
            </p>
         </div>
    </div>
</div>

<footer class="mt-4" style="background-color:#404040; color:#FFFFFF;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-3">
                <h5>How can we Help</h5>
                <ul class="footer-menu list-unstyled pl-0">
                    <li><a href="<?=base_url()?>customer-service">Customer Service</a></li>
                    <li><a href="<?=base_url()?>delivery">Delivery</a></li>
                    <li><a href="<?=base_url()?>returns">Returns</a></li>
                    <li><a href="<?=base_url()?>terms-and-conditions">Terms &amp; Conditions, Privacy Policy</a></li>
                    <li><a href="<?=base_url()?>sustainability-commitment">Sustainability</a></li>
                    <li><a href="<?=base_url()?>environmental-policy">Environmental Policy</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="<?=base_url()?>contact-us">Contact Us</a></li>
                </ul>
            </div>
           
            <div class="col-md-4 pt-3">
                <h5>Shop</h5>
                <ul class="footer-menu list-unstyled pl-0">
                    <li><a href="<?=base_url()?>shop-by-concerns">Shop by concerns</a></li>
                    <li><a href="<?=base_url()?>shop-by-skin-type">Shop by skin type</a></li>
                    <li><a href="<?=base_url()?>free-sample">Free sample</a></li>
                    <li><a href="<?=base_url()?>shop">All products</a></li>
                </ul>
            </div>

            <div class="col-md-4 pt-3">
                <h5>Sign Up</h5>
                <div class="emaillist">
                   
                    <label for="subscribe" class="mb-1">Email</label>
                    <div class="input-group mb-3">
                      <input type="email" name="email" id="sub_email" class="form-control" placeholder="" id="subscribe">
                      <div class="input-group-append">
                        <button class="btn btn-sub" onclick="return subscription();" type="button">Subscribe</button>
                      </div>
                    </div>
                   
                </div>
       
                <p class="text_fu mb-1">How do we use your data?</p>
                <div class="social">
                    <a href="<?=strip_tags(config('FACEBOOK_LINK', 'value'))?>" target="_blank"><i class="fa fa-facebook"></i></a>                  
                    <a href="<?=strip_tags(config('INSTAGRAM_LINK', 'value'))?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="<?=strip_tags(config('TWITTER_LINK', 'value'))?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="<?=strip_tags(config('PINTEREST_LINK', 'value'))?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                </div>
           </div>
        </div>
    </div>        

    <div class="footer-bottom mt-5">
        <p><span>Sheacreams</span> &copy All right reserved. </p>
    </div>
</footer>

<?php if($this->uri->segment(1)=='profile'){ ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<?php }else{ ?>
    <script src="<?=base_url()?>assets/website/js/jquery-3.2.1.min.js"></script>
<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="<?=base_url()?>assets/website/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/website/js/isotope.pkgd.min.js"></script>
<script src="<?=base_url()?>assets/website/js/slick.min.js"></script>
<script src="<?=base_url()?>assets/website/js/jquery.elevatezoom.js"></script>
<script src="<?=base_url()?>assets/admin/tagsinput.js"></script>
<script src="<?=base_url()?>assets/website/custom.js"></script>
<script src="<?=base_url()?>assets/website/autopopulate_tags.js"></script>

<script>
  <?php if ($this->session->flashdata('success')) {?>
      openModel("<?= $this->session->flashdata('success')?>");
  <?php }elseif ($this->session->flashdata('error')) {?>
      openModel("<?= $this->session->flashdata('error')?>");
  <?php } ?>
</script>

<div class="modal fade" id="know_your_sking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">KNOW YOUR SKIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="">
                    <div class="form-group">
                        <label> What is your skin type? *</label>
                        <select class="form-control" id="skin_type" required>
                            <option value="">Select Skin Type</option>
                            <option value="Normal skin">Normal skin</option>
                            <option value="Dry skin">Dry skin</option>
                            <option value="Oily skin">Oily skin</option>
                            <option value="Sensitive skin">Sensitive skin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> What are your skin concerns? *</label>
                        <input type="text" id="skin_concern" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="data_for" id="data_for" class="form-control" value="1">
                  </div>

                    <div class="form-group">
                        <label>What do you look for when choosing a moisturiser</label>
                        <textarea id="message" cols="40" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label> Name *</label>
                        <input type="text" id="name" class="form-control" required> 
                    </div>

                    <div class="form-group">
                        <label> Phone no *</label>
                        <input type="text" id="mobile" class="form-control" required> 
                    </div>

                    <div class="form-group">
                        <label> Email ID *</label>
                        <input type="email" id="email" class="form-control" required> 
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea  cols="40" id="address" rows="5" class="form-control"></textarea>
                    </div>

                    <button type="button" onclick="return know_your_skin();" class="btn nav-btn browse-btn">SUBMIT</button>

                </form>
            </div>
        </div>
    </div>
</div>
    
</body>

</html>