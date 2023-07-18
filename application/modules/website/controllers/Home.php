<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Home extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();
    }

    public function home()
    {
    	$data['home_banner']   = $this->BlankModel->customQuery("select * from home_banner where is_active=1 and is_deleted=0");
    	$data['content_one']   = $this->BlankModel->customQuery("select * from home_content_one where is_active=1 and is_deleted=0");
    	$data['content_two']   = $this->BlankModel->customQuery("select * from home_content_two where is_active=1 and is_deleted=0");
        $data['content_three'] = $this->BlankModel->customQuery("select * from home_content_three where is_active=1 and is_deleted=0");
    	$data['all_product']   = $this->BlankModel->customQuery("select * from products where is_active=1 and is_deleted=0");
        $data['bestsell']      = $this->BlankModel->customQuery("select * from products where is_active=1 and is_deleted=0 and best_selling=1");
        $data['popular']       = $this->BlankModel->customQuery("select * from products where is_active=1 and is_deleted=0 and is_popular=1");

    	web_viewloader('website/index', $data);
    }
}
