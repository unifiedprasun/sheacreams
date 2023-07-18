<style>
  #loading
  {
      text-align:center; 
      background: url('<?=base_url()?>assets/website/loader.gif') no-repeat center; 
      height: 150px;
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
      <li class="breadcrumb-item active" aria-current="page">Shop By Concerns</li>
    </ol>
  </nav>
</div>

<div class="container">
  <div class="col-md-12 text-center">
    <?=config('SHOP_BY_CONCERNS', 'value')?>
  </div>
</div>

<div class="container-fluid pt-4">
  
    <h4 class="bg-light p-3 mb-4">Shop by concerns</h4>

    <div class="card">
      <article class="card-group-item">
        <!-- <header class="card-header">
          <h6 class="title mb-0 font-weight-bold">Filter by Skin</h6>
        </header> -->
        <div class="filter-content">
          <div class="card-body p-2 px-3">
            <form class="row">
              <div class="col-lg-2 col-md-3 filter_heading">
                Filter by concerns
              </div>
              
              <div class="col-lg-8 col-md-6">
                <div class="row h-100 col-align_center">

                  <div class="col-lg-3 col-md-6 col-6">
                    <label class="form-check">
                      <input class="form-check-input common_selector tag" type="checkbox" value="Anti-Aging">
                      <span class="form-check-label">
                        Anti-Aging
                      </span>
                    </label>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-6">
                    <label class="form-check">
                      <input class="form-check-input common_selector tag" type="checkbox" value="Cuticles">
                      <span class="form-check-label">
                        Cuticles
                      </span>
                    </label>
                  </div>

                  <div class="col-lg-3 col-md-6 col-6">  
                    <label class="form-check">
                      <input class="form-check-input common_selector tag" type="checkbox" value="Ezcema">
                      <span class="form-check-label">
                        Ezcema
                      </span>
                    </label>
                  </div>

                  <div class="col-lg-3 col-md-6 col-6">
                    <label class="form-check">
                      <input class="form-check-input common_selector tag" type="checkbox" value="Skin-Toning">
                      <span class="form-check-label">
                        Skin Toning
                      </span>
                    </label>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-6">
                    <label class="form-check">
                      <input class="form-check-input common_selector tag" type="checkbox" value="Stretch-Marks-Scars">
                      <span class="form-check-label">
                        Stretch Marks / Scars
                      </span>
                    </label>
                  </div>

                  <div class="col-lg-3 col-md-6 col-6">  
                    <label class="form-check">
                      <input class="form-check-input common_selector tag" type="checkbox" value="Sun-Damaged">
                      <span class="form-check-label">
                        Sun Damaged
                      </span>
                    </label>
                  </div>

                  <div class="col-lg-3 col-md-6 col-6">
                    <label class="form-check">
                      <input class="form-check-input common_selector tag" onclick="return ffilter_by_tags(this.value);" type="checkbox" value="Tanning">
                      <span class="form-check-label">
                        Tanning
                      </span>
                    </label>
                  </div>

                </div>
              </div>

              <div class="col-lg-2 col-md-3 select_col">
                <form class="" method="">
                  <select class="form-control mb-0 p-1">
                      <option value="menu_order" selected="selected">Default sorting</option>
                      <option value="popularity">Sort by popularity</option>
                      <option value="rating">Sort by average rating</option>
                      <option value="date">Sort by latest</option>
                      <option value="price">Sort by price: low to high</option>
                      <option value="price-desc">Sort by price: high to low</option>
                  </select>
                </form>
              </div>
            </form>
          </div> <!-- card-body.// -->
        </div>
      </article> <!-- card-group-item.// -->
    </div>

    <div class="row">

      <div class="col-lg-12 col-md-12">
        <div class="row filter_data">          

        </div>
      </div>
    </div>

</div>