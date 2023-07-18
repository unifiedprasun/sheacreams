<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Blog extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
    }

    public function blog_lists()
    {
    	$data['details'] = $this->BlankModel->customQuery("SELECT b.*, c.name, w.name as w_name FROM blogs as b INNER JOIN category as c ON b.category=c.id INNER JOIN users as w ON w.id=b.writer AND b.is_deleted=0 AND b.is_approve!=2 ORDER BY b.updated_on DESC");

    	common_viewloader('admin/Blog/blog_lists', $data);
    }

    public function view_blog($id)
    {
    	$data['details'] = $this->BlankModel->customQuery("SELECT b.*, w.name as w_name FROM blogs as b INNER JOIN users as w ON w.id=b.writer AND b.id='$id'");

    	$data['category'] = $this->BlankModel->customQuery("select * from category where is_active=1 and is_deleted=0 and category_for=2");

    	common_viewloader('admin/Blog/view_blog', $data);
    }

    public function active_blog($id, $value)
    {
        $update_data = $this->db->set('is_active', $value)->where('id', $id)->update('blogs');

        if($update_data)
        {
            $this->db->set('is_active', $value)->where('id', $id)->update('blog_comments');

            $this->session->set_flashdata("success", "Status update successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with update status");

            redirect($this->agent->referrer());
        }
    }

    public function delete_blog($id)
    {
        $update_data = $this->db->set('is_deleted', 1)->where('id', $id)->update('blogs');

        if($update_data)
        {
            $this->db->set('is_deleted', 1)->where('id', $id)->update('blog_comments');
            
            $this->session->set_flashdata("success", "Blog delete successfully done");

            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("error", "Something went wrong with delete data");

            redirect($this->agent->referrer());
        }
    }

    public function approve_blog($id, $value)
    {
        $writer = $this->BlankModel->customQuery("select writer from blogs where id='$id'");

        $writer_id = $writer[0]->writer;

        $writer_details = $this->BlankModel->customQuery("select * from users where id='$writer_id'");

        $writer_email = $writer_details[0]->email;

        $update_data = $this->db->set('is_approve', $value)->where('id', $id)->update('blogs');

        if($update_data)
        {
            if($value == 1)
            {
                $mail_data['email']    = $email;
                $mail_data['base_url'] = base_url();

                $this->custommailadmin->blog_approve($mail_data); 
            }
            else
            {
                $mail_data['email']    = $email;
                $mail_data['base_url'] = base_url();

                $this->custommailadmin->blog_reject($mail_data); 
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

    public function get_comments($id)
    {
        $data['details'] = $this->BlankModel->customQuery("SELECT bc.*, u.* FROM blog_comments as bc INNER JOIN users as u ON bc.user_id=u.id AND bc.blog_id='$id'");

        common_viewloader('admin/Blog/comments', $data);
    }

    public function update_meta_tags($id)
    {
        $data = $this->input->post();

        $condition['id'] = $id;

        $update_data = $this->BlankModel->updateData("blogs", $data, $condition);

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

    public function tags_lists()
    {
        $data['category'] = $this->BlankModel->customQuery("select * from category where category_for=2 and is_active=1 and is_deleted=0");

        $data['tags'] = $this->BlankModel->customQuery("SELECT t.*, c.name as cat_name FROM tags as t INNER JOIN category as c ON t.category=c.id AND c.category_for=2 AND t.is_deleted=0");

        common_viewloader('admin/Blog/add_tags', $data);
    }

    public function add_tags()
    {
        $data = $this->input->post();

        $category = $data['category'];
        $tags = $data['tag'];
        $tags = explode(',', $tags);

        $saved_data['added_on']   = $this->globalfunction->create_custom_date_time();
        $saved_data['updated_on'] = $this->globalfunction->create_custom_date_time();

        foreach($tags as $t)
        {
            $saved_data['tag'] = $t;
            $saved_data['category'] = $category;

            $this->BlankModel->insertData("tags", $saved_data);
        }

        $this->session->set_flashdata('success', 'Tags added successfully done');

        redirect($this->agent->referrer());
    }

    public function update_tag($id)
    {
        $data = $this->input->post();

        $condition['id'] = $id;

        $data['updated_on'] = $this->globalfunction->create_custom_date_time();

        $update_data = $this->BlankModel->updateData("tags", $data, $condition);

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
}