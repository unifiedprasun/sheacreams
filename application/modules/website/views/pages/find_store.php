    <div class="hero banner_2" style="background-image: url(<?=base_url()?>uploads/<?=$banner?>);">
        <div class="hero-content">
            
        </div>
    </div>


    <div class="">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Find A Store</li>
        </ol>
      </nav>
    </div>


    <div class="container-fluid">
        <h4 class="bg-light p-3 mb-4">Find A Store</h4>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-md-0 mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2486.202504071653!2d-0.122289084693809!3d51.45443832239584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760440f95290f1%3A0x55eca282bc2f9408!2s102%20Brixton%20Hill%2C%20London%20SW2%201AH%2C%20UK!5e0!3m2!1sen!2sin!4v1571996334916!5m2!1sen!2sin" height="182" frameborder="0" style="border:0; width:100%;" allowfullscreen="" class="d-block"></iframe>
                            </div>
                            <div class="col-md-6 text-left py-3 px-md-2 px-4">
                                <?=config('STORE_ADDRESS_ONE', 'value')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-md-0 mb-3">
                        <div class="row">
                        <div class="col-md-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.341842647223!2d-0.2393004846916395!3d51.50694421855818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760e2ce349c231%3A0xcdd4608d3af32f3b!2s10%20Adelaide%20Grove%2C%20Shepherd's%20Bush%2C%20London%2C%20UK!5e0!3m2!1sen!2sin!4v1571995440664!5m2!1sen!2sin" height="182" frameborder="0" style="border:0; width:100%;" allowfullscreen="" class="d-block"></iframe>
                        </div>
                        <div class="col-md-6 text-left py-3 px-md-2 px-4">
                            <?=config('STORE_ADDRESS_TWO', 'value')?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>