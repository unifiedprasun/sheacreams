    <div class="hero banner_2" style="background-image: url(<?=base_url()?>uploads/<?=$banner?>);">
        <div class="hero-content">
            
        </div>
    </div>


    <div class="">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Free Sample</li>
        </ol>
      </nav>
    </div>


    <div class="container-fluid">
        <h4 class="bg-light p-3 mb-4">Free Sample</h4>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Enjoy a complimentary Shea Cream sample of your choice with your first purchase.</h3>
                    <p class="text-center">Just sign up and be the first to discover new arrivals, exclusive offers and limited editions.</p>
                    <div class="form-group">
                        <label> What is your skin type? *</label>
                        <select class="form-control" id="skintype" required>
                            <option value="">Select Skin Type</option>
                            <option value="Normal skin">Normal skin</option>
                            <option value="Dry skin">Dry skin</option>
                            <option value="Oily skin">Oily skin</option>
                            <option value="Sensitive skin">Sensitive skin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="datafor" name="data_for" class="form-control" value="2">
                    </div>

                    <div class="form-group">
                        <label> What are your skin concerns? *</label>
                        <input type="text" id="skinconcern" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>What do you look for when choosing a moisturiser</label>
                        <textarea id="messages" cols="40" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label> Name *</label>
                        <input type="text" id="names" class="form-control" required> 
                    </div>

                    <div class="form-group">
                        <label> Phone no *</label>
                        <input type="text" id="mobiles" class="form-control" required> 
                    </div>

                    <div class="form-group">
                        <label> Email ID *</label>
                        <input type="email" id="emails" class="form-control" required> 
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea  cols="40" id="addresss" rows="5" class="form-control"></textarea>
                    </div>

                    <button type="button" onclick="return free_sample();" class="btn nav-btn browse-btn">SUBMIT</button>

                </div>
           </div>
        </div>
    </div>