<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Cms extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();
    }

    public function about_us()
    {
        $data['details'] = $this->BlankModel->customQuery("select * from cms where slug='about-us'");

        web_viewloader('website/pages/about_us', $data);
    }

    public function terms_conditions()
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from cms where slug='terms-and-conditions'");

        web_viewloader('website/pages/terms_conditions', $data);
    }

    public function shop()
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from products where is_active=1 and is_deleted=0");

    	web_viewloader('website/product/shop', $data);
    }

    public function shop_by_concern()
    {
        web_viewloader('website/product/shop_by_concern', $data);
    }

    public function shop_by_skin_type()
    {
    	$data['category'] = $this->BlankModel->customQuery("select * from category where is_active=1 and is_deleted=0 and category_for=1");

        web_viewloader('website/product/shop_by_skin_type', $data);
    }

    public function customer_service()
    {
    	web_viewloader('website/pages/customer_service');
    }

    public function delivery()
    {
    	web_viewloader('website/pages/delivery');
    }

    public function returns()
    {
    	web_viewloader('website/pages/return');
    }

    public function sustainability_commitment()
    {
    	web_viewloader('website/pages/sustainability_commitment');
    }

    public function environmental_policy()
    {
    	web_viewloader('website/pages/environmental_policy');
    }

    public function find_store()
    {
    	web_viewloader('website/pages/find_store');
    }

    public function contact_us()
    {
    	web_viewloader('website/pages/contact_us');
    }

    public function cart()
    {
        $user_id = $this->session->user->id;

        if($user_id == '')
        {
            $details = $this->cart->contents();

            foreach($details as $d)
            {
                $product_id = $d['id'];

                $products = $this->BlankModel->customQuery("SELECT * FROM products WHERE id='$product_id' AND is_Active=1 AND is_deleted=0");

                $p_details[] = array(
                    'product_name'  => $products[0]->product_name,
                    'feature_image' => $products[0]->feature_image,
                    'sku_code'      => $products[0]->sku_code,
                    'cart_id'       => $d['rowid'],
                    'quantity'      => $d['qty']
                );
            }

            $data['details'] = $p_details;
        }
        else
        {
            $products = $this->BlankModel->customQuery("SELECT c.*, c.id as cart_id, p.* FROM cart as c INNER JOIN products as p ON c.product_id=p.id AND c.user_id='$user_id' AND c.is_deleted=0");

            foreach($products as $p)
            {   
                $p_details[] = array(
                    'product_name'  => $p->product_name,
                    'feature_image' => $p->feature_image,
                    'sku_code'      => $p->sku_code,
                    'cart_id'       => $p->cart_id,
                    'quantity'      => $p->quantity
                );
            }            

            $data['details'] = $p_details;
        }

        web_viewloader('website/pages/cart', $data);
    }

    public function free_sample()
    {
        web_viewloader('website/pages/free_sample');
    }

    public function product_details($slug)
    {
        $data['details'] = $this->BlankModel->customQuery("select * from products where product_slug='$slug'");

        $product_id = $data['details'][0]->id;

        $data['category'] = $this->BlankModel->customQuery("SELECT c.name as cat_name, c.id as cat_id FROM product_category as pc INNER JOIN category as c ON c.id=pc.category AND pc.product_id='$product_id' AND pc.is_active=1 AND pc.is_deleted=0 AND c.category_for=1");

        $tags = $data['details'][0]->tags;

        $data['tags'] = explode(',', $tags);

        foreach($data['category'] as $c)
        {
            $category[] = $c->cat_id;
        }

        $category = implode("','", $category);

        $data['related'] = $this->BlankModel->customQuery("SELECT p.* FROM product_category as pc INNER JOIN products as p ON p.id=pc.product_id AND pc.category IN ('$category') AND pc.is_active=1 AND pc.is_deleted=0 AND p.is_active=1 AND p.is_deleted=0 GROUP BY pc.product_id");

        web_viewloader('website/product/product_details', $data);
    }

    public function my_profile()
    {
        $this->user_session_checked($is_active_session = 1);
        
        $user_id = $this->session->user->id;

        $data['details'] = $this->BlankModel->customQuery("select * from users where id='$user_id'");

        $data['address'] = $this->BlankModel->customQuery("select * from user_address where user_id='$user_id' and is_active=1 and is_deleted=0");

        $data['category'] = $this->BlankModel->customQuery("select * from category where category_for=2 and is_active=1 and is_deleted=0");

        $data['blogs'] = $this->BlankModel->customQuery("SELECT b.*, c.name FROM blogs as b INNER JOIN category as c ON c.id=b.category AND b.writer='$user_id'");

        web_viewloader('website/pages/profile', $data);
    }

    public function blog_lists()
    {
        $category = $this->input->get('category');
        $tag      = $this->input->get('tags');
        $keyword  = $this->input->get('keyword'); 

        if($category != '')
        {
            $details = $this->BlankModel->customQuery("select id from category where slug='$category'");

            $cat_id = $details[0]->id;

            $data['details'] = $this->BlankModel->customQuery("SELECT b.*, c.name FROM blogs as b INNER JOIN category as c ON c.id=b.category AND b.is_active=1 AND b.is_deleted=0 AND b.is_approve=1 AND b.category='$cat_id' ORDER BY b.id DESC");  
        }
        else if($tag !='')
        {
            $data['details'] = $this->BlankModel->customQuery("SELECT b.*, c.name FROM blogs as b INNER JOIN category as c ON c.id=b.category AND b.is_active=1 AND b.is_deleted=0 AND b.is_approve=1 AND b.tags LIKE '%$tag%' ORDER BY b.id DESC"); 
        }
        else if($keyword !='')
        {
            $data['details'] = $this->BlankModel->customQuery("SELECT b.*, c.name FROM blogs as b INNER JOIN category as c ON c.id=b.category AND b.is_active=1 AND b.is_deleted=0 AND b.is_approve=1 AND b.title LIKE '%$keyword%' ORDER BY b.id DESC"); 
        }
        else
        {
            $data['details'] = $this->BlankModel->customQuery("SELECT b.*, c.name FROM blogs as b INNER JOIN category as c ON c.id=b.category AND b.is_active=1 AND b.is_deleted=0 AND b.is_approve=1 ORDER BY b.id DESC");
        }        

        web_viewloader('website/pages/blog_lists', $data);
    }

    public function blog_details($slug)
    {
        $data['category'] = $this->BlankModel->customQuery("select * from category where is_Active=1 and is_deleted=0 and category_for=2");

        $data['details']  = $this->BlankModel->customQuery("SELECT b.*, u.name as writer_name FROM blogs as b INNER JOIN users as u ON u.id=b.writer AND b.slug='$slug'");

        $tags = $data['details'][0]->tags;

        $category = $data['details'][0]->category;

        $data['tags'] = explode(',', $tags);

        $blog_id = $data['details'][0]->id;

        $check_count = $this->BlankModel->customQuery("select * from blog_count where blog_id='$blog_id'");

        if(count($check_count)>0)
        {
            $count = $check_count[0]->view;

            $saved_data['view'] = $count+1;

            $condition['blog_id'] = $blog_id;

            $this->BlankModel->updateData("blog_count", $saved_data, $condition);
        }
        else
        {
            $saved_data['blog_id'] = $blog_id;
            $saved_data['view']    = 1;

            $this->db->insert('blog_count', $saved_data);
        }

        $data['related'] = $this->BlankModel->customQuery("select * from blogs where category='$category' and id !='$blog_id' limit 5");

        $data['comment'] = $this->BlankModel->customQuery("SELECT bc.*, u.name, u.image as user_image FROM blog_comments as bc INNER JOIN users as u ON u.id=bc.user_id AND bc.blog_id='$blog_id'");

        web_viewloader('website/pages/blog_details', $data);
    }
}
