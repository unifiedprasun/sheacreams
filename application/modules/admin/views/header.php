<?php defined('BASEPATH') OR exit('No direct script access allowed');

$basepath = base_url('assets/admin/');

$slug = $this->uri->segment(2);

if($slug == 'Enquery')
{
    $class = 'sidebar-xs';
    $class1 = '';
}
else
{
    $class = 'navbar-top';
    $class1 = 'fixed-top';
}

$unread = $this->BlankModel->customQuery("select * from enquery where is_read=0 and is_deleted=0");

?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="BASE_URL" content="<?=base_url()?>">
  <title><?=ADMIN_DASHBOARD_TITLE?></title>

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  
  <link href="<?=base_url()?>assets/admin/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>assets/admin/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>assets/admin/css/layout.min.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>assets/admin/css/components.min.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>assets/admin/css/colors.min.css" rel="stylesheet" type="text/css">  
  <link href="<?=base_url()?>assets/admin/tagsinput.css" rel="stylesheet" type="text/css">  
  <link href="<?=base_url()?>assets/admin/custom.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>assets/admin/summernote/summernote-bs4.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" rel="stylesheet"/>  

  <script src="<?=base_url()?>assets/admin/global_assets/js/main/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/admin/jquery-ui.min.js"></script>
  <script src="<?=base_url()?>assets/admin/global_assets/js/main/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/admin/global_assets/js/plugins/loaders/blockui.min.js"></script>
  <script src="<?=base_url()?>assets/admin/global_assets/js/plugins/forms/validation/validate.min.js"></script>
  <script src="<?=base_url()?>assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
  <script src="<?=base_url()?>assets/admin/global_assets/js/plugins/extensions/rowlink.js"></script>
  <script src="<?=base_url()?>assets/admin/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
  <script src="<?=base_url()?>assets/admin/js/app.js"></script>
  <script src="<?=base_url()?>assets/admin/global_assets/js/demo_pages/form_validation.js"></script>
  <script src="<?=base_url()?>assets/admin/global_assets/js/demo_pages/mail_list.js"></script>
  <script src="<?=base_url()?>assets/admin/global_assets/js/demo_pages/datatables_advanced.js"></script>
  <script src="<?=base_url()?>assets/admin/admin_custom.js"></script>
  <script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>   
  <script src="<?=base_url()?>assets/admin/tagsinput.js"></script>
  <script src="<?=base_url()?>assets/admin/summernote/summernote-bs4.js"></script>
  <script src="<?=base_url()?>assets/admin/summernote/summernote.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


</head>

<body class="<?=$class?>">

  <div id="PopupMessages"></div>

  <div class="navbar navbar-expand-md navbar-dark <?=$class1?>">
    <div class="navbar-brand">
      <a href="javascript:void(0)" class="d-inline-block">
        <!-- <img src="<?=base_url()?>assets/admin/global_assets/images/logo_light.png" alt=""> -->
      </a>
    </div>

    <div class="d-md-none">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
        <i class="icon-tree5"></i>
      </button>
      <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
        <i class="icon-paragraph-justify3"></i>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="javascript:void(0)" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
            <i class="icon-paragraph-justify3"></i>
          </a>
        </li>

      </ul>
      
      <?php if($this->session->admin->id){ ?>
          <span class="badge bg-success ml-md-3 mr-md-auto">You are Online</span>
      <?php }else{ ?>
          <span class="badge bg-danger ml-md-3 mr-md-auto">You are Offline</span>
      <?php } ?>     

      <ul class="navbar-nav">

        <li class="nav-item dropdown">
          <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
            <i class="icon-bubbles4"></i>
            <span class="d-md-none ml-2">Messages</span>
            <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0"><?=count($unread)?></span>
          </a>
          
          <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
            <div class="dropdown-content-header">
              <span class="font-weight-semibold">Messages</span>
              <a href="<?=base_url()?>admin/Enquery" class="text-default"><i class="fa fa-eye"></i></a>
            </div>
            <hr style="margin-bottom: 0 !important;">
            <div class="dropdown-content-body dropdown-scrollable">
              <?php if(count($unread)>0){ ?>
                <ul class="media-list">
                  <?php foreach($unread as $u){ ?>
                    <li class="media">
                      <div class="mr-3 position-relative">
                        <img src="<?=base_url()?>assets/admin/user.png" width="36" height="36" class="rounded-circle" alt="">
                      </div>
                      <div class="media-body">
                        <div class="media-title">
                          <a href="<?=base_url()?>admin/Enquery/view_enquery/<?=$u->id?>">
                            <span class="font-weight-semibold"><?=$u->name?></span>
                            <span class="text-muted float-right font-size-sm"><?=date('d F Y h:i A', strtotime($u->date))?></span>
                          </a>
                        </div>
                        <!-- <span class="text-muted"><?=substr($u->message, 0, 25);?>...</span> -->
                      </div>
                    </li>
                  <?php } ?>
                </ul>
              <?php }else{ ?>                
                  <span style="color:blue; font-weight: 600; color: #718884; font-size: 16px;">No Messages Found</span>                
              <?php } ?>
            </div>

            <div class="dropdown-content-footer justify-content-center p-0">
              <a href="<?=base_url()?>admin/Enquery" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="View All Details"><i class="icon-menu7 d-block top-0"></i></a>
            </div>

          </div>
        </li>

        <li class="nav-item dropdown dropdown-user">
          <a href="javascript:void(0)" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
            <?php if(empty($this->session->admin->image)){ ?>
                <img src="<?=base_url()?>assets/admin/global_assets/images/demo/users/face11.jpg" height="34" class="rounded-circle mr-2" alt="">
            <?php }else{ ?>
                <img src="<?=base_url()?>uploads/<?=$this->session->admin->image?>" height="34" class="rounded-circle mr-2" alt="">
            <?php } ?> 
            <span><?=$this->session->admin->username?></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <a href="<?=base_url()?>admin/Admins/my_profile" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
            <a href="<?=base_url()?>admin/Enquery" class="dropdown-item"><i class="fa fa-envelope"></i> Messages <span class="badge badge-pill bg-blue ml-auto"><?=count($unread)?></span></a>
            <div class="dropdown-divider"></div>            
            <a href="<?=base_url()?>admin/Admins/logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
          </div>
        </li>
              
      </ul>

    </div>
  </div>

  <div class="page-content">

    <div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

      <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
          <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
          <i class="icon-screen-full"></i>
          <i class="icon-screen-normal"></i>
        </a>
      </div>

      <div class="sidebar-content">

        <div class="sidebar-user">
          <div class="card-body">
            <div class="media">
              <div class="mr-3">
                <a href="javascript:void(0)">
                  <?php if(empty($this->session->admin->image)){ ?>
                      <img src="<?=base_url()?>assets/admin/global_assets/images/demo/users/face11.jpg" width="38" height="38" class="rounded-circle" alt="">
                  <?php }else{ ?>
                      <img src="<?=base_url()?>uploads/<?=$this->session->admin->image?>" width="38" height="38" class="rounded-circle" alt="">
                  <?php } ?>                  
                </a>
              </div>

              <div class="media-body">
                <div class="media-title font-weight-semibold"><?=$this->session->admin->name?></div>
                <div class="font-size-xs opacity-50">
                  <i class="icon-pin font-size-sm"></i> &nbsp;<?=$this->session->admin->position?>
                </div>
              </div>

              <div class="ml-3 align-self-center">
                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
              </div>
            </div>
          </div>
        </div><hr>
      
