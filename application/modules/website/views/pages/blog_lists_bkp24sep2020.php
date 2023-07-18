<div class="">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Blog Lists</li>
    </ol>
  </nav>
</div>

<div class="container">
    <div class="row bottom_minus_margin_30px">
        <?php if(count($details)>0){ ?>
          <?php foreach($details as $d){ 
          $blog_id = $d->id;
          $view = $this->BlankModel->customQuery("select * from blog_count where blog_id='$blog_id'");
          ?>
              <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                  <div class="card blog_card">
                      <img class="card-img" src="<?=base_url()?>uploads/<?=$d->image?>" alt="">
                      <div class="card-img-overlay">
                        <a href="javascript:void(0);" class="btn btn-light btn-sm"><?=$d->name?></a>
                      </div>
                      <div class="card-body" style="z-index: 1;">
                          <a href="<?=base_url()?>blog-details/<?=$d->slug?>" class="text-info"><h4 class="card-title"><?=$d->title?></h4></a>
                          <p class="card-text"><?=substr($d->short_desc, 0, 74)?></p>                      
                      </div>
                      <div class="card-footer text-muted d-flex justify-content-between bg-transparent">
                        <div class="views">
                          <i class="fa fa-clock-o text-info"></i>
                          <?=date('M d, h:i A', strtotime($d->added_on))?>
                        </div>
                        <div class="stats">
                          <?php if(!empty($view)){ ?>
                            <i class="fa fa-eye text-info"></i> <?=$view[0]->view?>
                          <?php }else{ ?>
                            <i class="fa fa-eye text-info"></i> 0
                          <?php } ?>
                          <i class="fa fa-comment-o text-info"></i> 12
                        </div>
                      </div>
                  </div>
              </div>
          <?php } ?>
        <?php }else{ ?>
          <div class="col-12 col-sm-8 col-md-6 col-lg-12">
            <div class="card blog_card">
              <p class="m-3 font-weight-bold text-center">No data found</p>
            </div>
          </div>
        <?php } ?>
    </div>    
</div>  
