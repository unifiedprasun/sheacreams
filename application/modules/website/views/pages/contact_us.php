    <style type="text/css">
        .contact_add_reset p{
            margin-bottom: 5px;
        }
    </style>


    <div class="hero banner_2" style="background-image: url(<?=base_url()?>uploads/<?=$banner?>);">
        <div class="hero-content">
            
        </div>
    </div>

    <div class="">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
      </nav>
    </div>

    <div class="container-fluid">
        <h4 class="bg-light p-3 mb-4">Contact Us</h4>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-md-3 mb-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2486.202504071653!2d-0.122289084693809!3d51.45443832239584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760440f95290f1%3A0x55eca282bc2f9408!2s102%20Brixton%20Hill%2C%20London%20SW2%201AH%2C%20UK!5e0!3m2!1sen!2sin!4v1571996334916!5m2!1sen!2sin" height="182" frameborder="0" style="border:0; width:100%;" allowfullscreen="" class="d-block"></iframe>

                        <div class="card-body contact_add_reset">
                            <?=config('STORE_ADDRESS_ONE', 'value')?>
                        </div>
                    </div>


                    <div class="card mb-md-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2486.202504071653!2d-0.122289084693809!3d51.45443832239584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760440f95290f1%3A0x55eca282bc2f9408!2s102%20Brixton%20Hill%2C%20London%20SW2%201AH%2C%20UK!5e0!3m2!1sen!2sin!4v1571996334916!5m2!1sen!2sin" height="182" frameborder="0" style="border:0; width:100%;" allowfullscreen="" class="d-block"></iframe>

                        <div class="card-body contact_add_reset">
                            <?=config('STORE_ADDRESS_ONE', 'value')?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="card">
                      <div class="card-header">
                        <b>Write to us</b>
                      </div>
                      <div class="card-body">
                        <form action="<?=base_url()?>website/Pages/submit_enquiry" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Full Name</label>
                                        <input type="text" required name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" required name="email" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Contact Number</label>
                                        <input type="text" required name="mobile" class="form-control"> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" required name="subject" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea cols="40" rows="5" required name="message" class="form-control"></textarea>
                                    </div>
                                </div>  
                            </div>                            

                            <div class="text-right">
                                <button type="submit" class="btn nav-btn browse-btn">SUBMIT</button>
                            </div>
                        </form>
                      </div>
                    </div>


                    
                </div>
           </div>
        </div>
    </div>