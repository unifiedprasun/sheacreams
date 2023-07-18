<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Product extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
    }

    public function update_best_selling()
    {
        $best_selling = $this->input->post('best_selling');
        $product_id   = $this->input->post('product_id');

        $data['best_selling'] = $best_selling;

        $condition['id'] = $product_id;

        $update_data = $this->BlankModel->updateData("products", $data, $condition);

        if($update_data)
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
    }

    public function update_popular()
    {
        $is_popular = $this->input->post('is_popular');
        $product_id = $this->input->post('product_id');

        $data['is_popular'] = $is_popular;

        $condition['id'] = $product_id;

        $update_data = $this->BlankModel->updateData("products", $data, $condition);

        if($update_data)
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
    }

    public function get_details()
    {
        $product_name = $this->input->post('product_name');

        $text = preg_replace('~[^\pL\d]+~u', '-', $product_name);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text); 

        $check_slug = $this->BlankModel->customQuery("select product_slug from products where product_slug='$text' and is_deleted=0");

        if(count($check_slug)>0)
        {
            header('Content-Type:application/json');

            die(json_encode(array("status"=>"0","message"=>"Failed"))); 
        }    
        else
        {
            header('Content-Type:application/json');

            die(json_encode(array("status"=>"1","message"=>"Success","slug"=>$text))); 
        }           
    } 

    public function get_sku()
    {
        $sku_code = $this->input->post('sku_code');     

        $check_sku = $this->BlankModel->customQuery("select sku_code from products where sku_code='$sku_code' and is_deleted=0");

        if(count($check_sku)>0)
        {
            header('Content-Type:application/json');

            die(json_encode(array("status"=>"0","message"=>"Failed"))); 
        }    
        else
        {
            header('Content-Type:application/json');

            die(json_encode(array("status"=>"1","message"=>"Success"))); 
        }          
    } 

    public function add_product()
    {
    	$data['category'] = $this->BlankModel->customQuery("select * from category where is_active=1 and is_deleted=0 and category_for=1");

    	common_viewloader('admin/Product/add_product', $data);
    }

    public function add_product_details()
    {
    	$data = $this->input->post();

        $saved_data['product_name']     = $data['product_name'];
        $saved_data['product_slug']     = $data['product_slug'];
        $saved_data['sku_code']         = $data['sku_code'];
        $saved_data['usd_price']        = $data['usd_price'];
        $saved_data['gbp_price']        = $data['gbp_price'];
        $saved_data['usd_offer_price']  = $data['usd_offer_price'];
        $saved_data['gbp_offer_price']  = $data['gbp_offer_price'];
        $saved_data['short_desc']       = $data['short_desc'];
        $saved_data['long_desc']        = $data['long_desc'];
        $saved_data['aditional_info']   = $data['aditional_info'];
        $saved_data['tags']             = $data['tags'];
        $saved_data['meta_title']       = $data['meta_title'];
        $saved_data['meta_keywords']    = $data['meta_keywords'];
        $saved_data['meta_description'] = $data['meta_description'];
    	$saved_data['added_on']         = $this->globalfunction->create_custom_date_time();
    	$saved_data['updated_on']       = $this->globalfunction->create_custom_date_time();

        $types       = 'jpg|jpeg|png|';
        $field_name  = 'feature_image';
        $return_path = 'admin/Product/add_product';

        $saved_data['feature_image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

    	$insert_data = $this->BlankModel->insertData("products", $saved_data);

    	if($insert_data)
    	{
            $product_id = $this->db->insert_id();

            $category = $data['category'];

            foreach($category as $c)
            {
                $cat_data['category'] = $c;
                $cat_data['product_id'] = $product_id;

                $this->BlankModel->insertData("product_category", $cat_data);
            }

    		$this->session->set_flashdata("success", "Product add successfully done");

    		redirect($this->agent->referrer());
    	}
    	else
    	{
    		$this->session->set_flashdata("error", "Something went wrong with insert data");

    		redirect($this->agent->referrer());
    	}
    }

    public function product_lists()
    { 
        $data['details'] = $this->BlankModel->customQuery("SELECT * FROM products WHERE is_deleted=0");

    	common_viewloader('admin/Product/product_lists', $data);
    }

    public function active_product($id, $value)
    {
        $update_data = $this->db->set('is_active', $value)->where('id', $id)->update('products');

        if($update_data)
        {
            if($value == 0)
            {
                $this->db->set('is_active', 0)->where('product_id', $id)->update('product_category');
            }
            else
            {
                $this->db->set('is_active', 1)->where('product_id', $id)->update('product_category');
            }

            $this->session->set_flashdata("success", "Status update successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with update status");

            redirect($this->agent->referrer());
        }
    }

    public function delete_product($id)
    {
        $update_data = $this->db->set('is_deleted', 1)->where('id', $id)->update('products');

        if($update_data)
        {
            $this->db->set('is_deleted', 1)->where('product_id', $id)->update('product_category');

            $this->session->set_flashdata("success", "Product delete successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with delete product");

            redirect($this->agent->referrer());
        }
    }

    public function edit_product($id)
    {
        $data['details'] = $this->BlankModel->customQuery("select * from products where id='$id'"); 

    	$data['category'] = $this->BlankModel->customQuery("select * from category where is_active=1 and is_deleted=0 and category_for=1");     	

    	common_viewloader('admin/Product/edit_product', $data);
    }

    public function update_product($id)
    {
        $data = $this->input->post();

        $data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $condition['id'] = $id;

        $old_image = $data['old_feature_image'];

        if($_FILES['feature_image']['name'] == '')
        {
            $saved_data['feature_image'] = $old_image;
        }
        else
        {
            $types       = 'jpg|jpeg|png|';
            $field_name  = 'feature_image';
            $return_path = 'admin/Product/edit_product/<?=$id?>';

            $saved_data['feature_image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            unlink('./uploads/'.$old_image);
        }

        $saved_data['product_name']     = $data['product_name'];
        $saved_data['product_slug']     = $data['product_slug'];
        $saved_data['sku_code']         = $data['sku_code'];
        $saved_data['usd_price']        = $data['usd_price'];
        $saved_data['gbp_price']        = $data['gbp_price'];
        $saved_data['usd_offer_price']  = $data['usd_offer_price'];
        $saved_data['gbp_offer_price']  = $data['gbp_offer_price'];
        $saved_data['short_desc']       = $data['short_desc'];
        $saved_data['long_desc']        = $data['long_desc'];
        $saved_data['aditional_info']   = $data['aditional_info'];
        $saved_data['tags']             = $data['tags'];
        $saved_data['meta_title']       = $data['meta_title'];
        $saved_data['meta_keywords']    = $data['meta_keywords'];
        $saved_data['meta_description'] = $data['meta_description'];
        $saved_data['updated_on']       = $this->globalfunction->create_custom_date_time();

        $update_data = $this->BlankModel->updateData("products", $saved_data, $condition);

        if($update_data)
        {
            $category = $data['category'];

            $this->db->where('product_id', $id);
            $this->db->delete('product_category');

            foreach($category as $c)
            {  
                $cat_data['category'] = $c;
                $cat_data['product_id'] = $id;

                $this->BlankModel->insertData("product_category", $cat_data);
            }
            $this->session->set_flashdata("success", "Product update successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with update data");

            redirect($this->agent->referrer());
        }
    } 

    public function recent_view()
    {
        $data['details'] = $this->BlankModel->customQuery("SELECT rv.*, p.product_name FROM recent_view as rv INNER JOIN products as p ON rv.product_id=p.id ORDER BY date DESC");

        common_viewloader('admin/Product/recent_view', $data);
    }

    public function most_view()
    {
        common_viewloader('admin/Product/most_view', $data);
    }

    public function best_sell()
    {
        common_viewloader('admin/Product/best_sell');
    }

    public function most_review()
    {
        common_viewloader('admin/Product/most_review');
    }
}