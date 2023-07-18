<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Settings extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
    }

    public function user_credentials()
    {
    	$data['users']    = $this->BlankModel->customQuery("select * from users where is_deleted=0");

    	common_viewloader('admin/Settings/user_credentials', $data);
    }

    //===============================General Settings============================//

    public function general_settings()
    {
        common_viewloader('admin/Settings/general_settings');
    }

    public function general_settings_lists()
    {
        $data['details'] = $this->BlankModel->customQuery("select * from general_settings where is_deleted=0");

        common_viewloader('admin/Settings/general_settings_lists', $data);
    }

    public function add_general_settings()
    {
        $data = $this->input->post();

        $data['added_on']   = $this->globalfunction->create_custom_date_time();
        $data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $insert_data = $this->BlankModel->insertData("general_settings", $data);

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

    public function update_general_settings($id)
    {
        $data = $this->input->post();

        $condition['id'] = $id;

        $data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $update_data = $this->BlankModel->updateData("general_settings", $data, $condition);

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

    public function active_settings($id, $value)
    {
        $update_data = $this->db->set('is_active', $value)->where('id', $id)->update('general_settings');

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

    public function delete_settings($id)
    {
        $update_data = $this->db->set('is_deleted', 1)->where('id', $id)->update('general_settings');

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

    //================================Home Banner==================================//

    public function home_banner()
    {
        $data['details'] = $this->BlankModel->customQuery("select * from home_banner where is_deleted=0");

        common_viewloader('admin/Settings/home_banner', $data);
    }

    public function add_home_banner()
    {
        $data = $this->input->post();

        $data['added_on']   = $this->globalfunction->create_custom_date_time();
        $data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $types       = 'jpg|jpeg|png|';
        $field_name  = 'banner_image';
        $return_path = 'admin/Settings/home_banner';

        $data['banner_image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

        $insert_data = $this->BlankModel->insertData("home_banner", $data);

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

    public function update_home_banner($id)
    {
        $data = $this->input->post();

        $condition['id'] = $id;

        $saved_data['banner_title'] = $data['banner_title'];

        $saved_data['updated_on'] = $this->globalfunction->create_custom_date_time();

        if($_FILES['banner_image']['name'] == '')
        {
            $saved_data['banner_image'] = $data['old_banner_image'];
        }
        else
        {
            $types       = 'jpg|jpeg|png|';
            $field_name  = 'banner_image';
            $return_path = 'admin/Settings/home_banner';

            $saved_data['banner_image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            unlink('./uploads/'.$data['old_banner_image']);
        }

        $update_data = $this->BlankModel->updateData("home_banner", $saved_data, $condition);

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

    public function active_home_banner($id, $value)
    {
        $update_data = $this->db->set('is_active', $value)->where('id', $id)->update('home_banner');

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

    public function delete_home_banner($id)
    {
        $update_data = $this->db->set('is_deleted', 1)->where('id', $id)->update('home_banner');

        if($update_data)
        {
            $this->session->set_flashdata("success", "Banner delete successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with delete data");

            redirect($this->agent->referrer());
        }
    }
}