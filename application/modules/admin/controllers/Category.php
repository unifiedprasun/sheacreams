<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Category extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
    }

    public function get_details()
    {
        $name = $this->input->post('name');

        $text = preg_replace('~[^\pL\d]+~u', '-', $name);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text); 
        $text = $text;        

        $check_slug = $this->BlankModel->customQuery("select slug from category where slug='$text' and is_deleted=0");

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

    public function category_lists()
    {
        $category_for = $this->uri->segment(4);

    	$data['category'] = $this->BlankModel->customQuery("select * from category where is_deleted=0 and category_for='$category_for'");

        foreach ($data['category'] as $subcat)
        {
            $data['subcategory'][$subcat->id] = $this->BlankModel->customQuery("select * from category where id='$subcat->parent_id' and is_deleted=0");
        }

    	common_viewloader('admin/Category/category_lists', $data);
    }

    public function add_category()
    {
    	common_viewloader('admin/Category/add_category');
    }

    public function add_category_details()
    {
        $data = $this->input->post();

        $saved_data['name']             = $data['name'];
        $saved_data['slug']             = $data['slug'];
        $saved_data['meta_title']       = $data['meta_title'];
        $saved_data['meta_keywords']    = $data['meta_keywords'];
        $saved_data['meta_description'] = $data['meta_description'];
        $saved_data['category_for']     = $this->uri->segment(4);

        $saved_data['added_on']   = $this->globalfunction->create_custom_date_time();
        $saved_data['updated_on'] = $this->globalfunction->create_custom_date_time();

        if($_FILES['banner_image']['name'] !='')
        {
            $types_1       = 'jpg|jpeg|png|';
            $field_name_1  = 'banner_image';
            $return_path_1 = 'admin/Category/add_category';

            $saved_data['banner_image'] = $this->globalfunction->upload_file($types_1, $field_name_1, $return_path_1);
        }
        
        if($_FILES['icon']['name'] !='')
        {
            $types_2       = 'jpg|jpeg|png|';
            $field_name_2  = 'icon';
            $return_path_2 = 'admin/Category/add_category';

            $saved_data['icon'] = $this->globalfunction->upload_file($types_2, $field_name_2, $return_path_2);
        }        

        $insert_data = $this->BlankModel->insertData("category", $saved_data);

        $last_id = $this->db->insert_id();

        if($insert_data)
        {
            $tags = $data['tags'];

            if($tags !='')
            {
                $tags = explode(',', $tags);

                foreach($tags as $t)
                {
                    $tag_data['tag']        = $t;
                    $tag_data['category']   = $last_id;
                    $tag_data['added_on']   = $this->globalfunction->create_custom_date_time();
                    $tag_data['updated_on'] = $this->globalfunction->create_custom_date_time();

                    $this->BlankModel->insertData("tags", $tag_data);
                }
            }            

            $this->session->set_flashdata("success", "Insert successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with insert data");

            redirect($this->agent->referrer());
        }
    }

    public function edit_category($id)
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from category where id='$id'");

        $tags = $this->BlankModel->customQuery("select * from tags where category='$id'");

        $tag = array();

        foreach($tags as $t)
        {
            $tag[] = $t->tag;
        }

        $tags = implode(',', $tag);

        $data['tags'] = $tags;

        common_viewloader('admin/Category/edit_category', $data);
    }

    public function update_category_details($id)
    {
        $data = $this->input->post();

        $condition['id'] = $id;

        $saved_data['name']             = $data['name'];
        $saved_data['slug']             = $data['slug'];
        $saved_data['meta_title']       = $data['meta_title'];
        $saved_data['meta_keywords']    = $data['meta_keywords'];
        $saved_data['meta_description'] = $data['meta_description'];
        $saved_data['updated_on']       = $this->globalfunction->create_custom_date_time();

        if($_FILES['banner_image']['name'] == '')
        {
            $saved_data['banner_image'] = $data['old_banner_image'];
        }
        else
        {
            $types_1       = 'jpg|jpeg|png|';
            $field_name_1  = 'banner_image';
            $return_path_1 = 'admin/Category/add_category';

            $saved_data['banner_image'] = $this->globalfunction->upload_file($types_1, $field_name_1, $return_path_1); 

            unlink('./uploads/'.$data['old_banner_image']);
        }

        if($_FILES['icon']['name'] == '')
        {
            $saved_data['icon'] = $data['old_icon'];
        }
        else
        {
            $types_1       = 'jpg|jpeg|png|';
            $field_name_1  = 'icon';
            $return_path_1 = 'admin/Category/add_category';

            $saved_data['icon'] = $this->globalfunction->upload_file($types_1, $field_name_1, $return_path_1); 

            unlink('./uploads/'.$data['old_icon']);
        }

        $update_data = $this->BlankModel->updateData("category", $saved_data, $condition);

        if($update_data)
        {
            $tags = $data['tags'];

            if($tags !='')
            {
                $this->db->where('category', $id);
                $this->db->delete('tags');

                $tags = explode(',', $tags);

                foreach($tags as $t)
                {
                    $tag_data['tag']        = $t;
                    $tag_data['category']   = $id;
                    $tag_data['added_on']   = $this->globalfunction->create_custom_date_time();
                    $tag_data['updated_on'] = $this->globalfunction->create_custom_date_time();

                    $this->BlankModel->insertData("tags", $tag_data);
                }
            }

            $this->session->set_flashdata("success", "Update successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with insert data");

            redirect($this->agent->referrer());
        }
    }    

    public function active_category($id, $value, $category_for)
    {
        if($category_for == 1)
        {
            $check_category = $this->BlankModel->customQuery("select * from product_category where category='$id' and is_deleted=0");
        }
        else
        {
            $check_category = $this->BlankModel->customQuery("select * from blogs where category='$id' and is_deleted=0");
        }        

        if(count($check_category)>0)
        {
            $this->session->set_flashdata("error", "Sorry!!! you can't change status for this category");

            redirect($this->agent->referrer());
        }
        else
        {
            $update_data = $this->db->set('is_active', $value)->where('id', $id)->update('category');

            if($update_data)
            {
                $this->session->set_flashdata("success", "Status update successfully done");

                redirect($this->agent->referrer());
            }
            else
            {
                $this->session->set_flashdata("error", "Something went wrong with update status");

                redirect($this->agent->referrer());
            }
        }        
    } 

    public function delete_category($id, $category_for)
    {
        if($category_for == 1)
        {
            $check_category = $this->BlankModel->customQuery("select * from product_category where category='$id' and is_deleted=0");
        }
        else
        {
            $check_category = $this->BlankModel->customQuery("select * from blogs where category='$id' and is_deleted=0");
        }

        if(count($check_category)>0)
        {
            $this->session->set_flashdata("error", "Sorry!!! you can't delete this category");

            redirect($this->agent->referrer());
        }
        else
        {
            $update_data = $this->db->set('is_deleted', 1)->where('id', $id)->update('category');

            if($update_data)
            {
                $this->session->set_flashdata("success", "General settings delete successfully done");

                redirect($this->agent->referrer());
            }
            else
            {
                $this->session->set_flashdata("error", "Something went wrong with delete data");

                redirect($this->agent->referrer());
            }
        } 
    }
}