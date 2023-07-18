<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Pages extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();
    }

    public function register()
    {
    	$data = $this->input->post();

    	$saved_data['name']      = $data['name'];
    	$saved_data['username']  = $data['username'];
    	$saved_data['email']     = $data['email'];
    	$saved_data['mobile']    = $data['mobile'];
    	$saved_data['password']  = base64_encode($data['c_password']);
    	$saved_data['user_type'] = 1;

        $insert_data = $this->BlankModel->insertData("users", $saved_data);

        if($insert_data)
        {
        	$mail_data['email']    = $data['email'];
        	$mail_data['name']     = $data['name'];
        	$mail_data['mobile']   = $data['mobile'];
        	$mail_data['base_url'] = base_url();

        	$this->custommailweb->register_email_user($mail_data);

        	$this->custommailweb->register_email_admin($mail_data);

        	$this->session->set_flashdata('success', 'Register successfully done');

        	redirect($this->agent->referrer());
        }
        else
        {
        	$this->session->set_flashdata('error', 'Something went wrong');

        	redirect($this->agent->referrer());
        }
    }

    public function login()
    {
    	$data = $this->input->post();

    	$detail   = $data['detail'];
    	$password = base64_encode($data['password']);

    	$query = $this->db->query("select * from users where (email='$detail' OR mobile='$detail') and password='$password'")->row();

    	if(empty($query))
    	{
    		$this->session->set_flashdata("error", "Login credential does not match");

    		redirect($this->agent->referrer());
    	}
    	else
    	{
    		if($query->is_active == 1 && $query->is_deleted == 0)
            {
                $this->set_user_session($query);

                $products = $this->cart->contents();

                if(count($products)>0)
                {
                    $user_id = $this->session->user->id;

                    foreach($products as $p)
                    {
                        $product_id = $p['id'];
                        $rowid = $p['rowid'];

                        $check_details = $this->BlankModel->customQuery("select product_id from cart where user_id='$user_id' and product_id='$product_id'");

                        if(count($check_details)>0)
                        {
                            $condition = array(
                                'user_id'    => $user_id,
                                'product_id' => $product_id
                            );

                            $update_data['quantity'] = $p['qty'];

                            $this->BlankModel->updateData("cart", $update_data, $condition);
                        }
                        else
                        {
                            $cart_data['product_id'] = $p['id'];
                            $cart_data['user_id']    = $user_id;
                            $cart_data['quantity']   = $p['qty'];
                            $cart_data['added_on']   = $this->globalfunction->create_custom_date_time();

                            $this->BlankModel->insertData("cart", $cart_data);
                        }  

                        $this->cart->remove($rowid);                
                    }
                }

                redirect($this->agent->referrer());
            }
            else
            {
                $this->session->set_flashdata('error', 'Please contact admin to login your account');

                redirect($this->agent->referrer());
            } 
    	}
    }

    public function logout() 
    {
        $this->destroy_user_session(); 
        $this->session->set_flashdata('success', 'Logout successfully done');
        redirect(base_url());
    }

    public function search()
    {
    	$product_name = $this->input->get('product_name');

    	$data['details'] = $this->BlankModel->customQuery("select * from products where product_name like '%$product_name%'");

    	web_viewloader('website/product/search', $data);
    }

    public function update_profile($user_id)
    {
        $data = $this->input->post();

        $condition['id'] = $user_id;

        $update_data = $this->BlankModel->updateData("users", $data, $condition);

        if($update_data)
        {
            $this->session->set_flashdata("success", 'Profile information update successfully');

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata('error', 'Something went wrong');

            redirect($this->agent->referrer());
        }
    }

    public function add_address()
    {
        $data = $this->input->post();

        $data['user_id']    = $this->session->user->id;
        $data['added_on']   = $this->globalfunction->create_custom_date_time();
        $data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $insert_data = $this->BlankModel->insertData("user_address", $data);

        if($insert_data)
        {
            $this->session->set_flashdata("success", "You have successfully added your address");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata('error', 'Something went wrong');

            redirect($this->agent->referrer());
        }
    }

    public function update_address($id)
    {
        $data = $this->input->post();

        $condition['id'] = $id;

        $data['user_id']    = $this->session->user->id;
        $data['added_on']   = $this->globalfunction->create_custom_date_time();
        $data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $update_data = $this->BlankModel->updateData("user_address", $data, $condition);

        if($update_data)
        {
            $this->session->set_flashdata("success", "You have successfully updated your address");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata('error', 'Something went wrong');

            redirect($this->agent->referrer());
        }
    }

    public function delete_address($id)
    {
        $condition['id'] = $id;

        $data['is_deleted'] = 1;

        $update_data = $this->BlankModel->updateData("user_address", $data, $condition);

        if($update_data)
        {
            $this->session->set_flashdata("success", "You have successfully delete your address");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata('error', 'Something went wrong');

            redirect($this->agent->referrer());
        }
    }

    public function submit_enquiry()
    {
        $data = $this->input->post();

        $data['date'] = $this->globalfunction->create_custom_date_time();

        $insert_data = $this->BlankModel->insertData("enquery", $data);

        if($insert_data)
        {
            $mail_data['name']     = $data['name'];
            $mail_data['email']    = $data['email'];
            $mail_data['mobile']   = $data['mobile'];
            $mail_data['subject']  = $data['subject'];
            $mail_data['message']  = $data['message'];
            $mail_data['base_url'] = base_url();

            $this->custommailweb->enquiry($mail_data);

            $this->session->set_flashdata("success", "Your enquery submit successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong");

            redirect($this->agent->referrer());
        }
    }    

    public function add_blog()
    {
        $data = $this->input->post();   

        $saved_data['category']         = $data['category'];
        $saved_data['title']            = $data['title'];
        $saved_data['slug']             = $data['slug'];
        $saved_data['tags']             = implode(',', json_decode($data['tags']));
        $saved_data['short_desc']       = $data['short_desc'];
        $saved_data['content']          = $data['content'];
        $saved_data['meta_title']       = $data['meta_title'];
        $saved_data['meta_keywords']    = $data['meta_keywords'];
        $saved_data['meta_description'] = $data['meta_description'];

        if($_FILES['image']['name'] == '')
        {
            $saved_data['image'] = '';
        }
        else
        {
            $types       = 'jpg|jpeg|png|';
            $field_name  = 'image';
            $return_path = '$this->agent->referrer()';

            $saved_data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);
        }

        $saved_data['added_on']   = $this->globalfunction->create_custom_date_time();
        $saved_data['updated_on'] = $this->globalfunction->create_custom_date_time();
        $saved_data['writer']     = $this->session->user->id;

        $insert_data = $this->BlankModel->insertData("blogs", $saved_data);

        if($insert_data)
        {
            $mail_data['name']     = $this->session->user->name;
            $mail_data['email']    = $this->session->user->email;
            $mail_data['blog']     = $data['title'];
            $mail_data['added_on'] = $this->globalfunction->create_custom_date_time();
            $mail_data['base_url'] = base_url();

            $this->custommailweb->blog_notify($mail_data);

            $this->session->set_flashdata("success", "Blog added successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong");

            redirect($this->agent->referrer());
        }
    }

    public function update_blog($id)
    {
        $data = $this->input->post();   

        $condition['id'] = $id;

        $saved_data['category']         = $data['category'];
        $saved_data['title']            = $data['title'];
        $saved_data['slug']             = $data['slug'];
        $saved_data['tags']             = $data['tags'];
        $saved_data['short_desc']       = $data['short_desc'];
        $saved_data['content']          = $data['content'];
        $saved_data['meta_title']       = $data['meta_title'];
        $saved_data['meta_keywords']    = $data['meta_keywords'];
        $saved_data['meta_description'] = $data['meta_description'];
        $saved_data['is_approve']       = 0;

        if($_FILES['image']['name'] == '')
        {
            $saved_data['image'] = $data['old_image'];
        }
        else
        {
            $types       = 'jpg|jpeg|png|';
            $field_name  = 'image';
            $return_path = '$this->agent->referrer()';

            $saved_data['image'] = $this->globalfunction->upload_file($types, $field_name, $return_path);

            unlink('./uploads/'. $data['old_image']);
        }

        $saved_data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $update_data = $this->BlankModel->updateData("blogs", $saved_data, $condition);

        if($update_data)
        {
            $mail_data['name']       = $this->session->user->name;
            $mail_data['email']      = $this->session->user->email;
            $mail_data['blog']       = $data['title'];
            $mail_data['updated_on'] = $this->globalfunction->create_custom_date_time();
            $mail_data['base_url']   = base_url();

            $this->custommailweb->blog_update_notify($mail_data);

            $this->session->set_flashdata("success", "Blog update successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong");

            redirect($this->agent->referrer());
        }
    }

    public function blog_comment($blog_id)
    {
        $data['blog_id']  = $blog_id;
        $data['user_id']  = $this->session->user->id;
        $data['comment']  = $this->input->post('comment');
        $data['added_on'] = $this->globalfunction->create_custom_date_time();

        $insert_data = $this->BlankModel->insertData("blog_comments", $data);

        if($insert_data)
        {
            $this->session->set_flashdata("success", "Your comment has been posted");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata('error', 'Something went wrong');

            redirect($this->agent->referrer());
        }
    }
}