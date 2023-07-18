<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Cms extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->load->library('upload');

        $this->admin_session_checked($is_active_session = 1);
    }

    public function upload_image()
    {
        if(isset($_FILES["image"]["name"]))
        {
            $config['upload_path']   = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|';
            $config['max_size']      = 2048;

            $this->upload->initialize($config);

            if(!$this->upload->do_upload('image'))
            {
                $this->upload->display_errors();

                return FALSE;
            }
            else
            {
                $data = $this->upload->data();

                $config['image_library']  = 'gd2';
                $config['source_image']   ='./assets/images/'.$data['file_name'];
                $config['create_thumb']   = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality']        = '100%';
                $config['new_image']      = './assets/images/'.$data['file_name'];

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

                echo base_url().'assets/images/'.$data['file_name'];
            }
        }
    }

    public function delete_image()
    {
        $src = $this->input->post('src');

        $file_name = str_replace(base_url(), '', $src);

        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

    public function add_page()
    {
    	common_viewloader('admin/Cms/add_page');
    }

    public function get_details()
    {
        $name = $this->input->post('page_title');

        $text = preg_replace('~[^\pL\d]+~u', '-', $name);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text); 
        $text = $text;        

        $check_slug = $this->BlankModel->customQuery("select slug from cms where slug='$text' and is_deleted=0");

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

    public function add_page_details()
    {
    	$data = $this->input->post();

    	$saved_data['name']              = $data['name'];
    	$saved_data['title']             = $data['title'];
    	$saved_data['content']           = $data['content'];
    	$saved_data['slug']              = $data['slug'];
        $saved_data['meta_title']        = $data['meta_title'];
        $saved_data['content']           = $data['content'];
        $saved_data['meta_description']  = $data['meta_description'];
    	$saved_data['added_on']          = $this->globalfunction->create_custom_date_time();
    	$saved_data['updated_on']        = $this->globalfunction->create_custom_date_time();

        $types       = 'jpg|jpeg|png|';
        $field_name  = 'banner_image';
        $return_path = 'admin/Cms/add_page';

        $saved_data['banner_image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

    	$insert_data = $this->BlankModel->insertData("cms", $saved_data);

        if($insert_data)
        {
            $this->session->set_flashdata("success", "Insert successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with insert data");

            redirect($this->agent->referrer());
        }
    }

    public function page_lists()
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from cms where is_deleted=0");

    	common_viewloader('admin/Cms/page_lists', $data);
    }

    public function active_page($id, $value)
    {
        $update_data = $this->db->set('is_active', $value)->where('id', $id)->update('cms');

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

    public function delete_page($id)
    {
        $update_data = $this->db->set('is_deleted', 1)->where('id', $id)->update('cms');

        if($update_data)
        {
            $this->session->set_flashdata("success", "Page delete successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with delete slider");

            redirect($this->agent->referrer());
        }
    }

    public function update_page($id)
    {
    	$data = $this->input->post();
    	
    	$condition['id'] = $id;

        $saved_data['name']             = $data['name'];
        $saved_data['title']            = $data['title'];
        $saved_data['slug']             = $data['slug'];
        $saved_data['content']          = $data['content'];
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
            $types       = 'jpg|jpeg|png|';
            $field_name  = 'banner_image';
            $return_path = 'admin/Cms/edit_page/'.$id;

            $saved_data['banner_image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            unlink('./uploads/'.$data['old_banner_image']);
        }

    	$update_data = $this->BlankModel->updateData("cms", $saved_data, $condition);

    	if($update_data)
    	{
    		$this->session->set_flashdata("success", "Update successfully done");

    		redirect($this->agent->referrer());
    	}
    	else
    	{
    		$this->session->set_flashdata("error", "Something went wrong with update data");

    		redirect($this->agent->referrer());
    	}
    }

    public function edit_page($id)
    {
        $data['details'] = $this->BlankModel->customQuery("select * from cms where id='$id'");

        common_viewloader('admin/Cms/edit_page', $data);
    }

    public function add_content_one()
    {
        $data['details'] = $this->BlankModel->customQuery("select * from home_content_one where is_deleted=0");

        common_viewloader('admin/Cms/Home/content_one', $data);
    }

    public function add_content_one_details($row_id = NULL)
    {
        if($row_id !='')
        {
            $condition['id'] = $row_id;

            $data = $this->input->post();

            $old_image1 = $data['old_image1'];
            $old_image2 = $data['old_image2'];
            $old_image3 = $data['old_image3'];

            $saved_data['content_title'] = $data['content_title'];
            $saved_data['content1']      = $data['content1'];
            $saved_data['content2']      = $data['content2'];
            $saved_data['content3']      = $data['content3'];
            $saved_data['content4']      = $data['content4'];

            if($_FILES['image1']['name'] == '')
            {
                $saved_data['image1'] = $old_image1;
            }
            else
            {
                $types       = 'jpg|jpeg|png|';
                $field_name  = 'image1';
                $return_path = 'admin/Cms/add_content_one';

                $data['image1'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

                unlink('./uploads/'.$old_image1);
            }

            if($_FILES['image1']['name'] == '')
            {
                $saved_data['image2'] = $old_image2;
            }
            else
            {
                $types       = 'jpg|jpeg|png|';
                $field_name  = 'image2';
                $return_path = 'admin/Cms/add_content_one';

                $data['image2'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

                unlink('./uploads/'.$old_image2);
            }

            if($_FILES['image1']['name'] == '')
            {
                $saved_data['image3'] = $old_image3;
            }
            else
            {
                $types       = 'jpg|jpeg|png|';
                $field_name  = 'image3';
                $return_path = 'admin/Cms/add_content_one';

                $data['image3'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

                unlink('./uploads/'.$old_image3);
            }

            $update_data = $this->BlankModel->updateData("home_content_one", $saved_data, $condition);

            if($update_data)
            {
                $this->session->set_flashdata("success", "Update successfully done");

                redirect($this->agent->referrer());
            }
            else
            {
                $this->session->set_flashdata("error", "Something went wrong with insert data");

                redirect($this->agent->referrer());
            }
        }
        else
        {
            $data = $this->input->post();

            $data['added_on']   = $this->globalfunction->create_custom_date_time();
            $data['updated_on'] = $this->globalfunction->create_custom_date_time();

            $types       = 'jpg|jpeg|png|';
            $field_name  = 'image1';
            $return_path = 'admin/Cms/add_content_one';

            $data['image1'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            $types       = 'jpg|jpeg|png|';
            $field_name  = 'image2';
            $return_path = 'admin/Cms/add_content_one';

            $data['image2'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            $types       = 'jpg|jpeg|png|';
            $field_name  = 'image3';
            $return_path = 'admin/Cms/add_content_one';

            $data['image3'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            $insert_data = $this->BlankModel->insertData("home_content_one", $data);

            if($insert_data)
            {
                $this->session->set_flashdata("success", "Insert successfully done");

                redirect($this->agent->referrer());
            }
            else
            {
                $this->session->set_flashdata("error", "Something went wrong with insert data");

                redirect($this->agent->referrer());
            }
        }        
    }

    public function add_content_two()
    {
        $data['details'] = $this->BlankModel->customQuery("select * from home_content_two where is_deleted=0");

        common_viewloader('admin/Cms/Home/content_two', $data);
    }

    public function add_content_two_details()
    {
        $data = $this->input->post();

        $data['added_on']   = $this->globalfunction->create_custom_date_time();
        $data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $types       = 'jpg|jpeg|png|';
        $field_name  = 'image';
        $return_path = 'admin/Cms/add_content_two';

        $data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

        $insert_data = $this->BlankModel->insertData("home_content_two", $data);

        if($insert_data)
        {
            $this->session->set_flashdata("success", "Insert successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with insert data");

            redirect($this->agent->referrer());
        }
    }

    public function update_content_two($id)
    {
        $data = $this->input->post();

        $condition['id'] = $id;

        $saved_data['content_title'] = $data['content_title'];
        $saved_data['content']       = $data['content']; 
        $saved_data['updated_on']    = $this->globalfunction->create_custom_date_time();

        if($_FILES['image']['name'] =='')
        {
            $saved_data['image'] = $data['old_image'];
        }
        else
        {
            $types       = 'jpg|jpeg|png|';
            $field_name  = 'image';
            $return_path = 'admin/Cms/add_content_two';

            $saved_data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            unlink('./uploads/'.$data['old_image']);
        }        

        $update_data = $this->BlankModel->updateData("home_content_two", $saved_data, $condition);

        if($update_data)
        {
            $this->session->set_flashdata("success", "Insert successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with insert data");

            redirect($this->agent->referrer());
        }
    }

    public function add_content_three()
    {
        $data['details'] = $this->BlankModel->customQuery("select * from home_content_three where is_deleted=0");

        common_viewloader('admin/Cms/Home/content_three', $data);
    }

    public function add_content_three_details()
    {
        $data = $this->input->post();

        $data['added_on']   = $this->globalfunction->create_custom_date_time();
        $data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $types       = 'jpg|jpeg|png|';
        $field_name  = 'image';
        $return_path = 'admin/Cms/add_content_three';

        $data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

        $insert_data = $this->BlankModel->insertData("home_content_three", $data);

        if($insert_data)
        {
            $this->session->set_flashdata("success", "Insert successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with insert data");

            redirect($this->agent->referrer());
        }
    }

    public function update_content_three($id)
    {
        $data = $this->input->post();

        $condition['id'] = $id;

        $saved_data['content_title'] = $data['content_title'];
        $saved_data['url']           = $data['url']; 
        $saved_data['updated_on']    = $this->globalfunction->create_custom_date_time();

        if($_FILES['image']['name'] =='')
        {
            $saved_data['image'] = $data['old_image'];
        }
        else
        {
            $types       = 'jpg|jpeg|png|';
            $field_name  = 'image';
            $return_path = 'admin/Cms/add_content_three';

            $saved_data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            unlink('./uploads/'.$data['old_image']);
        }        

        $update_data = $this->BlankModel->updateData("home_content_three", $saved_data, $condition);

        if($update_data)
        {
            $this->session->set_flashdata("success", "Insert successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with insert data");

            redirect($this->agent->referrer());
        }
    }
}