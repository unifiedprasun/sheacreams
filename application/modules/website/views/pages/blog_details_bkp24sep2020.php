<div class="">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
      <li class="breadcrumb-item active" aria-current="page"><?=$details[0]->title?></li>
    </ol>
  </nav>
</div>

<div class="container">

    <div class="row">

      <div class="col-lg-8">

        <h1 class="mt-4"><?=$details[0]->title?></h1>

        <hr>

        <p>
          <span class="mr-3">
            Written by
            <a href="#"><?=$details[0]->writer_name?></a>
          </span>
          Posted on <?=date('F d Y, h:i A', strtotime($details[0]->added_on))?>
        </p>

        <hr>

        <img class="img-fluid rounded" src="<?=base_url()?>uploads/<?=$details[0]->image?>" alt="">

        <hr>        

        <p class="text-justify"><?=$details[0]->content?></p>

        <hr>

        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="<?=base_url()?>website/Pages/blog_comment/<?=$details[0]->id?>" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" value="<?=$this->session->user->name?>" readonly class="form-control" placeholder="Name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" value="<?=$this->session->user->email?>" readonly class="form-control" placeholder="Email ID">
                  </div>
                </div>

                <div class="col-md-6"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control pt-2" name="comment" rows="3" placeholder="Enter your comment here"></textarea>
              </div>
              <div class="text-right">
                <?php if($this->session->user->id){ ?>
                  <button type="submit" class="btn nav-btn">Submit</button>
                <?php }else{ ?>
                  <button type="button" onclick="return login_alert();" class="btn nav-btn">Submit</button>
                <?php } ?>
                
              </div>
            </form>
          </div>
        </div>

        <?php foreach($comment as $c){ ?>
        <div class="media mb-4">
          <?php if($c->user_image){ ?>
            <img class="d-flex mr-3 rounded-circle" width="50" height="50" src="<?=base_url()?>uploads/<?=$c->user_image?>" alt="">
          <?php }else{ ?>
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <?php } ?>           
          
          <div class="media-body">
            <h5 class="mt-0"><?=$c->name?></h5>
            <?=$c->comment?>
          </div>
        </div>
        <?php } ?>        

      </div>

      <div class="col-md-4">

        <div class="my-4">
          <form action="<?=base_url()?>blogs" method="get">
            <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="Search by blog name">
                <span class="input-group-append">
                  <button class="btn btn-secondary" type="submit">Search</button>
                </span>
            </div>
          </form>
        </div>

        <div class="card profile_card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body p-0">
            <ul class="list-group list-group-flush">
              <?php foreach($category as $c){ ?>
                <li class="list-group-item">
                  <a href="<?=base_url()?>blogs?category=<?=$c->slug?>">
                    <?=$c->name?>
                  </a>
                </li>
              <?php } ?>              
            </ul>  
          </div>
        </div>

        <div class="card profile_card my-4">
          <h5 class="card-header">Related Post</h5>
          <div class="card-body p-0">
            <ul class="list-group list-group-flush">
              <?php foreach($related as $r){ ?>
                <li class="list-group-item">
                  <div class="media pro_blog">
                    <img class="d-flex mr-3" src="<?=base_url()?>uploads/<?=$r->image?>" alt="">

                    <div class="media-body ">
                        <a href="<?=base_url()?>blog-details/<?=$r->slug?>">
                            <?=$r->title?>
                        </a>

                        <div>
                          <span class="text-muted"><?=date('F d Y h:i A', strtotime($r->added_on))?></span>
                        </div>
                    </div>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>

        <div class="card profile_card my-4">
          <h5 class="card-header">Tags</h5>
          <div class="card-body">
            <?php foreach($tags as $t){ ?>
            <a href="<?=base_url()?>blogs?tags=<?=$t?>"><button type="button" class="btn btn-info m-1"><?=$t?></button></a>
            <?php } ?>            
          </div>
        </div>
      </div>

    </div>
  </div>