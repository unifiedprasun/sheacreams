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
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Shop By Skin Type</li>
    </ol>
  </nav>
</div>

<div class="container">
  <div class="col-md-12 text-center">
    <?=config('SHOP_BY_SKIN_TYPE', 'value')?>
  </div>
</div>

<div class="container-fluid pt-4">
  
    <h4 class="bg-light p-3 mb-4">Shop by skin type</h4>

    <div class="card">
      <article class="card-group-item">
        <div class="filter-content">
          <div class="card-body p-2 px-3">
            <form class="row">
              <div class="col-lg-2 col-md-3 filter_heading">
                Filter by Skin
              </div>
              
              <div class="col-lg-8 col-md-6">
                <div class="row h-100 col-align_center">
                  <?php foreach($category as $c){ ?>
                    <div class="col-lg-3 col-md-6 col-6">
                      <label class="form-check">
                        <input class="form-check-input Common-Selector category" type="checkbox" value="<?=$c->id?>">
                        <span class="form-check-label">
                          <?=$c->name?>
                        </span>
                      </label> 
                    </div>
                  <?php } ?>

                </div>
              </div>

              <div class="col-lg-2 col-md-3 select_col">
                <form class="" method="">
                  <!-- <select class="form-control mb-0 p-1">
                      <option value="menu_order" selected="selected">Default sorting</option>
                      <option value="popularity">Sort by popularity</option>
                      <option value="rating">Sort by average rating</option>
                      <option value="date">Sort by latest</option>
                      <option value="price">Sort by price: low to high</option>
                      <option value="price-desc">Sort by price: high to low</option>
                  </select> -->
                  <select class="form-control mb-0 p-1" id="sorting_by_skin_type">
                    <option value="0" selected="selected">Default sorting</option>
                    <option value="1">Sort by popularity</option>
                    <!-- <option value="rating">Sort by average rating</option> -->
                    <option value="2">Sort by latest</option>
                    <option value="3">Sort by price: low to high</option>
                    <option value="4">Sort by price: high to low</option>
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
        <div class="row Filter-Data">
            
        </div>
      </div>
    </div>

</div>