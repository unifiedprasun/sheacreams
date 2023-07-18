<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Admins extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        $this->admin_session_checked($is_active_session = 1);

        common_viewloader('admin/Admins/dashboard');
    }

    public function login()
    {
        $this->admin_session_checked($is_active_session = 0);

        load_login('admin/Admins/login');
    }

    public function admin_login() 
    {
        $data = $this->input->post();

        $email = $data['email'];

        $query = $this->BlankModel->customQuery("select * from admins where email='$email'");

        $admin_type = $query[0]->type;

        if($admin_type == 1)
        {
            $conditions['email']    = $data['email'];
            $conditions['password'] = md5($data['password']);
        }
        else
        {
            $conditions['email']    = $data['email'];
            $conditions['password'] = base64_encode($data['password']);
        } 

        $select_fields   = '';
        $is_multy_result = 0;

        $admin = $this->BlankModel->getData('admins', $conditions, $select_fields, $is_multy_result);

        if(!empty($admin)) 
        {            
            if($admin->is_active == 1 && $admin->is_deleted == 0)
            {
                $this->set_admin_session($admin);

                redirect('admin/Admins/index');
            }
            else
            {
                $this->session->set_flashdata('error', 'Please contact admin to login your account');

                redirect($this->agent->referrer());
            }                     
        } 
        else 
        {
            $this->session->set_flashdata('error', 'Email or password does not matched');

            redirect($this->agent->referrer());
        }
    }

    public function logout() 
    {
        $this->destroy_admin_session(); 
        $this->session->set_flashdata('success', 'Logout successfully done');
        redirect('admin');
    }

    //===============================================Admin Profile=============================================//
    
    public function my_profile()
    {
        $this->admin_session_checked($is_active_session = 1);
        
    	$admin_id = $this->session->admin->id;

    	$data['details'] = $this->BlankModel->customQuery("select * from admins where id='$admin_id' and is_active=1 and is_deleted=0");

    	common_viewloader('admin/Admins/profile', $data);
    }

    public function fetch_password()
    {
        $password = md5($this->input->post('old_pass'));

        $sql = "select password from admins where password='$password'";

        $result = $this->BlankModel->customQuery($sql);

        if(count($result)>0)
        {
            echo '1';
        }
    }

    public function update_profile($id)
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
            $return_path = 'admin/Admins/my_profile';

            $saved_data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            unlink('./uploads/'.$old_image);
        }

        $saved_data['name']           = $data['name'];
        $saved_data['username']       = $data['username'];
        $saved_data['email']          = $data['email'];
        $saved_data['contact_number'] = $data['contact_number'];
        $saved_data['position']       = $data['position'];
        $saved_data['updated_on']     = $this->globalfunction->create_custom_date_time();

        $update_data = $this->BlankModel->updateData("admins", $saved_data, $condition);

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

    public function update_password($id)
    {
        $condition['id'] = $id;

        $data = $this->input->post();

        $old_pass = md5($data['old_pass']);

        $check_password = $this->BlankModel->customQuery("select password from admins where id='$id' and password='$old_pass'");

        if(count($check_password)>0)
        {
            if($data['con_pass'] == $data['new_pass'])
            {
                $saved_data['password'] = md5($data['con_pass']);

                $update_data = $this->BlankModel->updateData("admins", $saved_data, $condition);

                if($update_data)
                {
                    $this->session->set_flashdata("success", 'Password update successfully done');

                    redirect($this->agent->referrer());
                }
                else
                {
                    $this->session->set_flashdata("error", 'Something went wrong with update password');

                    redirect($this->agent->referrer());
                }
            }
            else
            {
                $this->session->set_flashdata("error", 'Confirm password does not match');

                redirect($this->agent->referrer());
            }
        }
        else
        {
            $this->session->set_flashdata("error", 'Old password does not match');

            redirect($this->agent->referrer());
        }
    } 
}

?>