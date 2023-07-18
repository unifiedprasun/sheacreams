<?php defined('BASEPATH') OR exit('No direct script access allowed');

$basepath = base_url('assets/admin/assets/');

?>
<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <li class="nav-item">
            <a href="<?=base_url()?>admin/Admins" class="nav-link active">
                <i class="icon-home4"></i>
                <span>Dashboard</span>
            </a>
        </li>         

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="fa fa-user-circle"></i> <span>Customer Management</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">                
                <li class="nav-item"><a href="<?=base_url()?>admin/Customer/add_customer" class="nav-link"><i class="fa fa-bars"></i> Add Customer</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Customer/customer_lists" class="nav-link"><i class="fa fa-bars"></i> Customer Details</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="fa fa-users"></i> <span>Author Management</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">                
                <li class="nav-item"><a href="<?=base_url()?>admin/Writer/add_writer" class="nav-link"><i class="fa fa-bars"></i> Add Author</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Writer/writer_lists" class="nav-link"><i class="fa fa-bars"></i> Author Details</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="fa fa-file-o"></i> <span>Content Management</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">                
                <li class="nav-item"><a href="<?=base_url()?>admin/Cms/add_page" class="nav-link"><i class="fa fa-file"></i> Add Page</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Cms/page_lists" class="nav-link"><i class="fa fa-file"></i> Page Details</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Settings/general_settings_lists" class="nav-link"><i class="fa fa-gear"></i> Manage Widget</a></li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="fa fa-home"></i> <span>Home Content</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">                
                        <li class="nav-item"><a href="<?=base_url()?>admin/Cms/add_content_one" class="nav-link"><i class="fa fa-bars"></i> Content One</a></li>
                        <li class="nav-item"><a href="<?=base_url()?>admin/Cms/add_content_two" class="nav-link"><i class="fa fa-bars"></i> Content Two</a></li>
                        <li class="nav-item"><a href="<?=base_url()?>admin/Cms/add_content_three" class="nav-link"><i class="fa fa-bars"></i> Content Three</a></li>
                    </ul>
                </li>
            </ul>
        </li>   

        <li class="nav-item">
            <a href="<?=base_url()?>admin/Menu/add_menu" class="nav-link">
                <i class="fa fa-bars"></i>
                <span>Menu Management</span>
            </a>
        </li>     

        <!-- <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="fa fa-bars"></i> <span>Category Management</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">                
                <li class="nav-item"><a href="<?=base_url()?>admin/Category/add_category" class="nav-link"><i class="fa fa-bars"></i> Add Category</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Category/category_lists" class="nav-link"><i class="fa fa-bars"></i> Category Details</a></li>
            </ul>
        </li> -->

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="fa fa-product-hunt"></i> <span>Product Management</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">       
                <li class="nav-item"><a href="<?=base_url()?>admin/Category/category_lists/1" class="nav-link"><i class="fa fa-bars"></i> Manage Category</a></li>         
                <li class="nav-item"><a href="<?=base_url()?>admin/Product/add_product" class="nav-link"><i class="fa fa-bars"></i> Add Product</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Product/product_lists" class="nav-link"><i class="fa fa-bars"></i> Product Details</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bars"></i> Product Review</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="fa fa-bars"></i> <span>Product Statistics </span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">                
                <li class="nav-item"><a href="<?=base_url()?>admin/Product/recent_view" class="nav-link"><i class="fa fa-bars"></i> Recently Viewed</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Product/most_view" class="nav-link"><i class="fa fa-bars"></i> Most Viewed</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Product/best_sell" class="nav-link"><i class="fa fa-bars"></i>Best Selling</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Product/most_review" class="nav-link"><i class="fa fa-bars"></i>Most Reviews</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="fa fa-money"></i><span>Transaction Management</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">  
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bars"></i> Order Transaction </a></li>  
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="fa fa-bars"></i><span>Order Management</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">  
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bars"></i> New Order Details </a></li>    
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bars"></i> All Order Details </a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bars"></i> Return Order</a></li> 
            </ul>
        </li>

        <li class="nav-item nav-item-submenu <?=$nav_item_3?>">
            <a href="#" class="nav-link"><i class="fa fa-rss"></i> <span>Blog Management</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts"> 
                <li class="nav-item"><a href="<?=base_url()?>admin/Category/category_lists/2" class="nav-link"><i class="fa fa-bars"></i> Manage Category</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Blog/blog_lists" class="nav-link"><i class="fa fa-bars"></i> Blog Details</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="fa fa-gear"></i> <span>Settings Management</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">      
                <li class="nav-item"><a href="<?=base_url()?>admin/Settings/user_credentials" class="nav-link"><i class="fa fa-lock"></i> Manage Credentials</a></li>                
                <li class="nav-item"><a href="<?=base_url()?>admin/Settings/home_banner" class="nav-link"><i class="fa fa-image"></i> Manage Slider</a></li>
                <li class="nav-item"><a href="<?=base_url()?>admin/Banner" class="nav-link"><i class="fa fa-image"></i> Banner Management</a></li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="fa fa-user"></i> <span>User Management</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">                
                        <li class="nav-item"><a href="<?=base_url()?>admin/Admins/my_profile" class="nav-link"><i class="fa fa-bars"></i> My Profile</a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bars"></i> User Details</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="<?=base_url()?>admin/Newsletter" class="nav-link">
                <i class="fa fa-envelope"></i>
                <span>Newsletters Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?=base_url()?>admin/Enquery" class="nav-link">
                <i class="fa fa-comments"></i>
                <span>Enquery Management</span>
            </a>
        </li>

    </ul>
</div>
</div>
</div>
