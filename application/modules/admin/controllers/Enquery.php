<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Enquery extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
    }

    public function index()
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from enquery where is_deleted=0");

    	$data['count']   = $this->BlankModel->customQuery("select * from enquery where is_deleted=0 and is_read=0");

    	common_viewloader('admin/Enquery/enquery_lists', $data);
    }

    public function view_enquery($id)
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from enquery where id='$id'");    	

    	$condition['id'] = $id;

    	$updatedata['is_read'] = 1;

    	$this->BlankModel->updateData("enquery", $updatedata, $condition);

    	$data['count']   = $this->BlankModel->customQuery("select * from enquery where is_deleted=0 and is_read=0");

    	common_viewloader('admin/Enquery/read_enquery', $data);
    }

    public function delete_enquery_single($id)
    {
    	$condition['id'] = $id;

    	$updatedata['is_deleted'] = 1;

    	$this->BlankModel->updateData("enquery", $updatedata, $condition);

    	redirect('admin/Enquery');
    }

    public function read_enquery($id, $is_read=0)
    {
    	$condition['id'] = $id;
    	$data['is_read'] = $is_read;

    	$this->BlankModel->updateData("enquery", $data, $condition);

    	redirect($this->agent->referrer());
    }

    public function star_enquery($id, $is_star=0)
    {
    	$condition['id'] = $id;
    	$data['is_star'] = $is_star;

    	$this->BlankModel->updateData("enquery", $data, $condition);

    	redirect($this->agent->referrer());
    }

    public function delete_enquery_details($id)
    {
        $ids = explode('-', $id);

        $query = $this->db->set('is_deleted', 1)
                          ->where_in('id', $ids)
                          ->update('enquery');

        if($query)
        {
            $status['status'] = 1;
        }
        else
        {
            $status['status'] = 0;
        }
        
        echo json_encode($status);
    }

    public function undo_trash_lists($id)
    {
        $ids = explode('-', $id);

        $query = $this->db->set('is_deleted', 0)
                          ->where_in('id', $ids)
                          ->update('enquery');

        if($query)
        {
            $status['status'] = 1;
        }
        else
        {
            $status['status'] = 0;
        }
        
        echo json_encode($status);
    }

    public function star_lists()
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from enquery where is_deleted=0 and is_star=1");

    	$data['count']   = $this->BlankModel->customQuery("select * from enquery where is_deleted=0 and is_read=0");

    	common_viewloader('admin/Enquery/star_lists', $data);
    }

    public function trash_lists()
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from enquery where is_deleted=1");

    	$data['count']   = $this->BlankModel->customQuery("select * from enquery where is_deleted=0 and is_read=0");

    	common_viewloader('admin/Enquery/trash', $data);
    }

    public function enquery_reply($id)
    {
        $details = $this->input->post();  

        $condition['id'] = $id; 

        $data['is_reply']      = 1;
        $data['reply_message'] = $details['reply_message'];
        $data['reply_date']    = $this->globalfunction->create_custom_date_time();

        $update_data = $this->BlankModel->updatetData("enquery", $data, $condition);

        if($update_data)
        {
            $mail_data['name']     = $details['name'];
            $mail_data['email']    = $details['email'];
            $mail_data['message']  = $details['reply_message'];
            $mail_data['subject']  = $details['subject'];
            $mail_data['baseurl']  = base_url();

            $this->custommailadmin->enquery_reply($mail_data);

            $this->session->set_flashdata("success", "Reply send successfully done");
            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("success", "Email not send");
            redirect($this->agent->referrer());
        }        
    }

    public function compose_lists()
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from compose_mail where is_deleted=0");

    	$data['count']   = $this->BlankModel->customQuery("select * from enquery where is_deleted=0 and is_read=0");

    	common_viewloader('admin/Enquery/compose_lists', $data);
    }

    public function read_compose($id, $is_read=0)
    {
    	$condition['id'] = $id;
    	$data['is_read'] = $is_read;

    	$this->BlankModel->updateData("compose_mail", $data, $condition);

    	redirect($this->agent->referrer());
    }

    public function delete_compose_lists($id)
    {
        $ids = explode('-', $id);

        $query = $this->db->set('is_deleted', 1)
                          ->where_in('id', $ids)
                          ->update('compose_mail');

        if($query)
        {
            $status['status'] = 1;
        }
        else
        {
            $status['status'] = 0;
        }
        
        echo json_encode($status);
    }

    public function view_compose($id)
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from compose_mail where id='$id'");    	

    	$condition['id'] = $id;

    	$updatedata['is_read'] = 1;

    	$this->BlankModel->updateData("compose_mail", $updatedata, $condition);

    	$data['count']   = $this->BlankModel->customQuery("select * from enquery where is_deleted=0 and is_read=0");

    	common_viewloader('admin/Enquery/read_compose', $data);
    }

    public function delete_compose_single($id)
    {
    	$condition['id'] = $id;

    	$updatedata['is_deleted'] = 1;

    	$this->BlankModel->updateData("compose_mail", $updatedata, $condition);

    	redirect('admin/Enquery/compose_lists');
    }

    public function compose_mail()
    {
        $data = $this->input->post();

        $data['sent_date'] = $this->globalfunction->create_custom_date_time();

        $insert_data = $this->BlankModel->insertData("compose_mail", $data);

        if($insert_data)
        {
            $mail_data['email']    = $data['email'];
            $mail_data['message']  = $data['message'];
            $mail_data['subject']  = $data['subject'];
            $mail_data['baseurl']  = base_url();

            $this->custommailadmin->compose_email($mail_data);

            $this->session->set_flashdata("success", "Email successfully send");
            redirect($this->agent->referrer());
        }
        else
        {
            $this->session->set_flashdata("success", "Email not send");
            redirect($this->agent->referrer());
        }  
    }
}