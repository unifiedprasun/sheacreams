<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sheacrems</title>

    <!-- font-family: 'Athiti', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Athiti:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- font-family: 'Roboto', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <!-- BootStrap 4.3.1 -->
    <link href="<?=base_url()?>assets/website/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?=base_url()?>assets/website/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="<?=base_url()?>assets/website/css/slick.css" type="text/css" rel="stylesheet">
    <link href="<?=base_url()?>assets/website/css/slick-theme.css" type="text/css" rel="stylesheet">
    <link href="<?=base_url()?>assets/website/css/main.css" type="text/css" rel="stylesheet">
    <link href="<?=base_url()?>assets/website/css/responsive.css" type="text/css" rel="stylesheet">
    <link href="<?=base_url()?>assets/website/custom.css" type="text/css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/tagsinput.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/website/autopopulate_tags.css" type="text/css" rel="stylesheet">

    <?php 
    $slug = $this->uri->segment(1);
    if($slug == '')
    {
        $class1 = 'active';
    }
    else if($slug == 'about-us')
    {
        $class2 = 'active';
    }

    $user_id = $this->session->user->id;
    $cart_qty = $this->BlankModel->customQuery("select * from cart where user_id='$user_id'");
    ?>
</head>
<body>
    <div id="PopupMessages"></div>
    <div class="header">
        <div class="header-top">
            <a href="<?=base_url()?>" class="brand logo">
                <img src="<?=base_url()?>assets/website/image/SheaCreams_Logo.png" alt="">
            </a>
            <div class="header-top-right">
                <div class="srch-box">
                    <form class="form-inline" action="<?=base_url()?>search" method="get">
                      <input class="form-control form-control" type="text" name="product_name" placeholder="Search by product"
                        aria-label="Search">
                      <button type="submit" class="srch-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div>
                    <div class="my-dropdown d-inline-block">
                        <a href="javascript:void(0);" class="signin">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </a>
                        <?php if($this->session->user->id !=''){ ?>
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?=base_url()?>profile"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>logout"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a>
                            </li>
                        </ul>
                        <?php }else{ ?>
                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#sign-in"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#sign-up"><i class="fa fa-sign-in" aria-hidden="true"></i>Register</a>
                            </li>
                        </ul>
                        <?php } ?>

                    </div>
                    
                    <a href="<?=base_url()?>cart" class="cart">
                        <?php if($this->session->user->id){ ?>
                            <i class="fa fa-shopping-cart" aria-hidden="true"> (<?=count($cart_qty)?>)</i>
                        <?php }else{ ?>
                            <i class="fa fa-shopping-cart" aria-hidden="true"> (<?=$this->cart->total_items()?>)</i>
                        <?php } ?>                        
                    </a>
                </div>
            </div>
        </div>

        <div class="header-menu">
            <nav class="navbar navbar-expand-lg navbar-light nav_bg">
                <a class="navbar-brand" href="#" style="display: none">
                    <img src="<?=base_url()?>assets/website/image/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item <?=$class1?>">
                        <a class="nav-link" href="<?=base_url()?>">HOME</a>
                      </li>
                      <li class="nav-item <?=$class2?>">
                        <a class="nav-link" href="<?=base_url()?>about-us">ABOUT US</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>shop-by-concerns">SHOP BY CONCERNS</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>shop-by-skin-type">SHOP BY SKIN TYPE</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>blogs">BLOG</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>find-a-store">FIND A STORE</a>
                      </li>
                    </ul>
                </div>
                <a href="" class="btn nav-btn nav-smpl-btn" data-toggle="modal" data-target="#know_your_sking">KNOW YOUR SKIN</a>
            </nav>
        </div>

        <!--========================================Sign Up Modal=================================-->

        <div class="modal fade" id="sign-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?=base_url()?>website/pages/register" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Register Your Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">                            
                                <input type="text" name="name" required class="form-control" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">                            
                                <input type="text" name="username" required class="form-control" placeholder="Enter Your Username">
                            </div>
                            <div class="form-group">                           
                                <input type="email" name="email" onkeyup="return register_email_validate(this.value);" class="form-control" placeholder="Enter Your Email Address">
                                <div class="pt-2" id="email_alert"></div>
                            </div>
                            <div class="form-group">                           
                                <input type="number" onkeyup="return register_mobile_validate(this.value);" name="mobile" required class="form-control" placeholder="Enter Your Contact Number">
                                <div class="pt-2" id="mobile_alert"></div>
                            </div>                            
                            <div class="form-group">                            
                                <input type="password" name="password" id="password" required class="form-control" placeholder="Password">
                                <div class="pt-2" id="password_alert"></div>
                            </div>
                            <div class="form-group">                          
                                <input type="password" id="c_password" name="c_password" required class="form-control" placeholder="Confirm Password">
                                <div class="pt-2" id="cpassword_alert"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" onclick="return validate_register();">Register</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>

        <!--========================================Sign In Modal=================================-->

        <div class="modal fade" id="sign-in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?=base_url()?>website/pages/login" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sign In Your Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="mb-0" style="font-size: 14px;">Email Address OR Mobile Number</label>                           
                                <input type="text" name="detail" required class="form-control" placeholder="Email Address OR Mobile Number">
                            </div>
                            <div class="form-group"> 
                                <label class="mb-0">Password</label>                           
                                <input type="password" name="password" required class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>