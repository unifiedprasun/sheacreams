<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Menu extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
    }

    public function add_menu()
    {
    	common_viewloader('admin/Cms/Menu/add_menu');
    }
}