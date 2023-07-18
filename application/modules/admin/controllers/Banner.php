<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Banner extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
    }

    public function index()
    {
    	$data['banner'] = $this->BlankModel->customQuery("SELECT bd.*, bp.* FROM banner_details as bd INNER JOIN banner_page as bp ON bd.page_id=bp.id AND bd.is_deleted=0");

    	$data['page'] = $this->BlankModel->customQuery("select * from banner_page");

    	common_viewloader('admin/Banner/banner_lists', $data);
    }

    public function add_banner()
    {
    	$data['page'] = $this->BlankModel->customQuery("select * from banner_page");

    	common_viewloader('admin/Banner/add_banner', $data);
    }

    public function check_exists()
    {
    	$page_id = $this->input->post('page_id');

    	$data = $this->BlankModel->customQuery("select * from banner_details where page_id='$page_id' and is_deleted=0");

    	if(count($data))
    	{
    		echo "1";
    	}
    	else
    	{
    		echo "0";
    	}
    }

    public function add_banner_details()
    {
    	$data = $this->input->post();

    	$types       = 'jpg|jpeg|png|';
        $field_name  = 'image';
        $return_path = 'admin/Banner/add_banner';

        $data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

        $data['added_on']   = $this->globalfunction->create_custom_date_time();
    	$data['updated_on'] = $this->globalfunction->create_custom_date_time();

    	$insert_data = $this->BlankModel->insertData("banner_details", $data);

    	if($insert_data)
    	{
    		$this->session->set_flashdata("success", "Banner add successfully done");

    		redirect($this->agent->referrer());
    	}
    	else
    	{
    		$this->session->set_flashdata("error", "Something went wrong with insert data");

    		redirect($this->agent->referrer());
    	}
    }

    public function update_banner($id)
    {
    	$old_image = $this->input->post('old_image');

    	$condition['id'] = $id;

    	if($_FILES['image']['name'] == '')
    	{
    		$data['image'] = $old_image;
    	}
    	else
    	{
    		$types       = 'jpg|jpeg|png|';
	        $field_name  = 'image';
	        $return_path = 'admin/Banner';

	        $data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

	        unlink('./uploads/'. $old_image);
    	}

    	$data['updated_on'] = $this->globalfunction->create_custom_date_time();

    	$update_data = $this->BlankModel->updateData("banner_details", $data, $condition);

    	if($update_data)
    	{
    		$this->session->set_flashdata("success", "Banner update successfully done");

    		redirect($this->agent->referrer());
    	}
    	else
    	{
    		$this->session->set_flashdata("error", "Something went wrong with update data");

    		redirect($this->agent->referrer());
    	}
    }
}