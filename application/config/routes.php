<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
$route['default_controller']    = 'website/Home/home';

//======================================ADMIN======================================//

$route['admin']  = 'admin/Admins/login';

$route['about-us']             = 'website/Cms/about_us';
$route['terms-and-conditions'] = 'website/Cms/terms_conditions';
$route['shop']                 = 'website/Cms/shop';
$route['shop-by-concerns']     = 'website/Cms/shop_by_concern';
$route['shop-by-skin-type']    = 'website/Cms/shop_by_skin_type';
$route['customer-service']     = 'website/Cms/customer_service';
$route['delivery']             = 'website/Cms/delivery';
$route['returns']              = 'website/Cms/returns';

$route['sustainability-commitment'] = 'website/Cms/sustainability_commitment';
$route['environmental-policy']      = 'website/Cms/environmental_policy';
$route['find-a-store']              = 'website/Cms/find_store';
$route['contact-us']                = 'website/Cms/contact_us';
$route['cart']                      = 'website/Cms/cart';
$route['free-sample']               = 'website/Cms/free_sample';

$route['product-details/(:any)']    = 'website/Cms/product_details/$1';

$route['logout']               = 'website/Pages/logout';

$route['search']               = 'website/Pages/search';

$route['profile']              = 'website/Cms/my_profile';

$route['blogs']                = 'website/Cms/blog_lists';

$route['blog-details/(:any)']  = 'website/Cms/blog_details/$1';





