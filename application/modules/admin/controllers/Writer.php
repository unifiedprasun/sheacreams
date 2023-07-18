<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Writer extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
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
        $contact_number = $this->input->post('contact_number');

        $sql = "select mobile from users where mobile='$contact_number' and is_deleted=0";
        
        $result = $this->BlankModel->customQuery($sql);

        if(count($result)>0)
        {
            echo '1';
        }
    }

    public function add_writer()
    {
        common_viewloader('admin/Writer/add_writer');
    }

    public function add_writer_details()
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
                if($_FILES['image']['name'] == '')
                {
                    $saved_data['image'] = '';
                }
                else
                {
                    $types       = 'jpg|jpeg|png|';
                    $field_name  = 'image';
                    $return_path = 'admin/Writer/add_writer';

                    $saved_data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);
                }

                $saved_data['name']           = $data['name'];
                $saved_data['username']       = $data['username'];
                $saved_data['email']          = $data['email'];
                $saved_data['mobile']         = $data['mobile'];
                $saved_data['password']       = base64_encode($data['con_pass']);
                $saved_data['added_on']       = $this->globalfunction->create_custom_date_time();
                $saved_data['updated_on']     = $this->globalfunction->create_custom_date_time();
                $saved_data['user_type']      = 2;

                $insert_data = $this->BlankModel->insertData("users", $saved_data);

                if($insert_data)
                {
                    $mail_data['email']    = $data['email'];
                    $mail_data['password'] = $data['con_pass'];
                    $mail_data['baseurl']  = base_url();

                    $this->custommailadmin->writer_registration($mail_data);

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

    public function update_writer($id)
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
            $return_path = 'admin/Writer/writer_lists';

            $saved_data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            unlink('./uploads/'.$old_image);
        }

        $saved_data['name']           = $data['name'];
        $saved_data['username']       = $data['username'];
        $saved_data['email']          = $data['email'];
        $saved_data['mobile']         = $data['mobile'];
        $saved_data['updated_on']     = $this->globalfunction->create_custom_date_time();

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

    public function writer_lists()
    {
        $data['details'] = $this->BlankModel->customQuery("select * from users where is_deleted=0 and user_type=2");

        common_viewloader('admin/Writer/writer_lists', $data);
    }

    public function active_writer($id, $value)
    {
        $check_blogs = $this->BlankModel->customQuery("select * from blogs where writer='$id' and is_deleted=0");

        if(count($check_blogs)>0)
        {
            $this->session->set_flashdata("error", "You can't change status for this writer");

            redirect($this->agent->referrer());
        }
        else
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
    }

    public function delete_writer($id)
    {
        $check_blogs = $this->BlankModel->customQuery("select * from blogs where writer='$id' and is_deleted=0");

        if(count($check_blogs)>0)
        {
            $this->session->set_flashdata("error", "You can't delete this writer");

            redirect($this->agent->referrer());
        }
        else
        {
            $update_data = $this->db->set('is_deleted', 1)->where('id', $id)->update('users');

            if($update_data)
            {
                $this->session->set_flashdata("success", "Writer delete successfully done");

                redirect($this->agent->referrer());
            }
            else
            {
                $this->session->set_flashdata("error", "Something went wrong with delete employee");

                redirect($this->agent->referrer());
            }
        }        
    }

    public function update_password($id)
    {
        $condition['id'] = $id;

        $new_pass = $this->input->post('new_pass');
        $con_pass = $this->input->post('con_pass');

        if($con_pass == $new_pass)
        {
            $data['password'] = base64_encode($con_pass);

            $update_data = $this->BlankModel->updateData("users", $data, $condition);

            if($update_data)
            {
                $mail_data['name']     = $this->input->post('name');
                $mail_data['email']    = $this->input->post('email');
                $mail_data['password'] = $con_pass;
                $mail_data['baseurl']  = base_url();

                $this->custommailadmin->writer_password($mail_data);
                
                $this->session->set_flashdata("success", "Password update successfully done");

                redirect($this->agent->referrer());
            }
            else
            {
                $this->session->set_flashdata("error", "Something went wrong with update data");

                redirect($this->agent->referrer());
            }
        }
        else
        {
            $this->session->set_flashdata("error", "Confirm password does not match");

            redirect($this->agent->referrer());
        }
    }
}