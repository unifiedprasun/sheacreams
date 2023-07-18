<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Customer extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
    }

    public function fetch_user($limit, $start) 
    {
        $query = $this->db->select('*')
                          ->from('users')
                          ->where('is_deleted', '0')
                          ->where('user_type', 1)
                          ->limit($limit, $start)
                          ->order_by('id', 'desc')
                          ->get()
                          ->result();
        return $query;
    }

    public function customer_lists()
    {
    	$details = $this->BlankModel->customQuery("select * from users where is_deleted=0 and user_type=1");

        $config["base_url"]             = base_url() . "admin/Customer/customer_lists";
        $config["total_rows"]           = count($details);
        $config["per_page"]             = 12;
        $config['use_page_numbers']     = TRUE;
        $config['num_links']            = 2;
        $config['page_query_string']    = FALSE;
        $config['query_string_segment'] = '';
        $config['full_tag_open']        = '<ul class="pagination pagination-sm">';
        $config['full_tag_close']       = '</ul><!--pagination-->';
        $config['first_link']           = '&laquo; First';
        $config['first_tag_open']       = '<li class="prev page">';
        $config['first_tag_close']      = '</li>';
        $config['last_link']            = 'Last &raquo;';
        $config['last_tag_open']        = '<li class="next page">';
        $config['last_tag_close']       = '</li>';
        $config['next_link']            = 'Next';
        $config['next_tag_open']        = '<li class="next page">';
        $config['next_tag_close']       = '</li>';
        $config['prev_link']            = 'Previous';
        $config['prev_tag_open']        = '<li class="prev page">';
        $config['prev_tag_close']       = '</li>';
        $config['cur_tag_open']         = '<li class="active"><a href="">';
        $config['cur_tag_close']        = '</a></li>';
        $config['num_tag_open']         = '<li class="page">';
        $config['num_tag_close']        = '</li>';
        $config['anchor_class']         = 'follow_link';  

        $this->pagination->initialize($config);

        if($this->uri->segment(4))
        {
            $page = ($this->uri->segment(4));
            $start = ($page*$config["per_page"])-$config["per_page"];
        }
        else
        {
            $start = 0;
        }

        $data['details']   = $this->fetch_user($config["per_page"], $start);
        $str_links         = $this->pagination->create_links();
        $data['links']     = $str_links;

    	common_viewloader('admin/Customer/customer', $data);
    }

    public function add_customer()
    {
        common_viewloader('admin/Customer/add_customer');
    }

    public function fetch_email()
    {
        $email = $this->input->post('email');

        $sql = "select email from users where email='$email' and is_deleted=0";

        $result = $this->BlankModel->customQuery($sql);

        if(count($result)>0)
        {
            echo '1';
        }
    }

    public function fetch_mobile()
    {
        $mobile = $this->input->post('mobile');

        $sql = "select mobile from users where mobile='$mobile' and is_deleted=0";
        
        $result = $this->BlankModel->customQuery($sql);

        if(count($result)>0)
        {
            echo '1';
        }
    }

    public function add_customer_details()
    {
        $data = $this->input->post();

        $email    = $data['email'];
        $mobile   = $data['mobile'];
        $password = $data['password'];
        $con_pass = $data['con_pass'];

        $check_email  = $this->BlankModel->customQuery("select email from users where email='$email' and is_deleted=0");
        $check_mobile = $this->BlankModel->customQuery("select mobile from users where mobile='$mobile' and is_deleted=0");

        if(count($check_email)>0)
        {
            $this->session->set_flashdata("error", "This email address already exists");

            redirect($this->agent->referrer());
        }
        else if(count($check_mobile)>0)
        {
            $this->session->set_flashdata("error", "This mobile number already exists");

            redirect($this->agent->referrer());
        }
        else
        {
            if($con_pass == $password)
            {
                $saved_data['is_validate'] = 1;

                if($_FILES['image']['name'] == '')
                {
                    $saved_data['image'] = '';
                }
                else
                {
                    $types       = 'jpg|jpeg|png|';
                    $field_name  = 'image';
                    $return_path = 'admin/Customer/add_customer';

                    $saved_data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);
                }

                $saved_data['name']         = $data['name'];
                $saved_data['username']     = $data['username'];
                $saved_data['email']        = $data['email'];
                $saved_data['mobile']       = $data['mobile'];
                $saved_data['password']     = base64_encode($data['con_pass']);
                $saved_data['added_on']     = $this->globalfunction->create_custom_date_time();
                $saved_data['updated_on']   = $this->globalfunction->create_custom_date_time();
                $saved_data['user_type']    = 1;

                $insert_data = $this->BlankModel->insertData("users", $saved_data);

                if($insert_data)
                {
                    $mail_data['email']    = $data['email'];
                    $mail_data['password'] = $data['con_pass'];
                    $mail_data['baseurl']  = base_url();

                    $this->custommailadmin->customer_registration($mail_data);

                    $this->session->set_flashdata("success", "Insert successfully done");

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
                $this->session->set_flashdata("error", "Password doesn't match");

                redirect($this->agent->referrer());
            }
        }        
    }

    public function update_user($id)
    {
    	$data = $this->input->post();

    	$condition['id'] = $id;

    	$old_image = $data['old_image'];

    	if($_FILES['image']['name'] == '')
    	{
    		$saved_data['image'] = $old_image;
    	}
    	else
    	{
    		$types       = 'jpg|jpeg|png|';
    		$field_name  = 'image';
    		$return_path = 'admin/Customer/customer_lists';

    		$saved_data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

    		unlink('./uploads/'.$old_image);
    	}

    	$saved_data['name']       = $data['name'];
    	$saved_data['username']   = $data['username'];
    	$saved_data['email']      = $data['email'];
    	$saved_data['mobile']     = $data['mobile'];
        $saved_data['updated_on'] = $this->globalfunction->create_custom_date_time();

    	$update_data = $this->BlankModel->updateData("users", $saved_data, $condition);

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

    public function active_user($id, $value)
    {
        $update_data = $this->db->set('is_active', $value)->where('id', $id)->update('users');

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

    public function delete_user($id)
    {
        $update_data = $this->db->set('is_deleted', 1)->where('id', $id)->update('users');

        if($update_data)
        {
            $this->session->set_flashdata("success", "User delete successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with delete slider");

            redirect($this->agent->referrer());
        }
    }
}