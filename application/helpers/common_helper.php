<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

function common_viewloader($viewfilepath = '', $param = array(),$title='') 
{
    $CI   = &get_instance();
    $data = array();

    $data['title'] = $title;

    $CI->load->view('header',$data);
    $CI->load->view('sidepanel');

    if ($viewfilepath != '') 
    {
        $CI->load->view($viewfilepath, $param);
    }

    $CI->load->view('footer');
}

function web_viewloader($viewfilepath = '', $param = array(),$title='') 
{
    $CI   = &get_instance();
    $data = array();

    $data['title'] = $title;

    $slug = $CI->uri->segment(1);

    $details = $CI->BlankModel->customQuery("SELECT bd.* FROM banner_details as bd INNER JOIN banner_page as bp ON bp.id=bd.page_id AND bp.page_slug='$slug'");

    $data['banner'] = $details[0]->image;
    
    $CI->load->view('header',$data);

    if ($viewfilepath != '') 
    {
        $CI->load->view($viewfilepath, $param);
    }

    $CI->load->view('footer');
}

function load_login($viewfilepath = '', $param = array())
{
    $CI = &get_instance();
    
    if ($viewfilepath != '') 
    {
        $CI->load->view($viewfilepath, $param);
    }
}

if(!function_exists('pr')) 
{
    function pr($display_data = array()) 
    {
        if (!empty($display_data)) 
        {
            echo "<pre>";
            print_r($display_data);
            echo "</pre>";
        }
    }
}

function config($key, $column)
{
    $CI = &get_instance();

    $config = $CI->data['config'];

    $exists = array_key_exists($key, $config);

    if($exists)
    {
        $column = $config[$key][$column];

        return $column;
    }
    else
    {
        return ;
    }
}


?>