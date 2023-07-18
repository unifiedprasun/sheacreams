<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Newsletter extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->admin_session_checked($is_active_session = 1);
    }

    public function index()
    {
    	$data['details'] = $this->BlankModel->customQuery("select * from newsletters");

    	common_viewloader('admin/Newsletter/subscription', $data);
    }

    public function unsubscribe($id)
    {
    	$condition['id'] = $id;

    	$data['is_subscribe'] = 0;
    	$data['unsubscribe_date'] = date('Y-m-d H:i:s');

    	$update_data = $this->BlankModel->updateData("newsletters", $data, $condition);

    	redirect($this->agent->referrer());
    }

    public function reply_all()
    {
    	$data = $this->input->post();

    	$email = $data['email_to'];

    	$all_emails = explode(',', $email);

    	$subject = $data['subject'];
    	$message = $data['message'];

    	foreach($all_emails as $e)
    	{
    		$mail_data['email']    = $e;
    		$mail_data['subject']  = $subject;
    		$mail_data['message']  = $message;
    		$mail_data['baseurl']  = base_url();

    		$this->custommailadmin->newsletter_mail($mail_data);
    	}

    	$this->session->set_flashdata("success", "Email send successfully done");

    	redirect($this->agent->referrer());
    }
}
