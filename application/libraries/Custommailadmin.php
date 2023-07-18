<?php 

if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Custommailadmin 
{ 
    public function __construct()
    {
        $this->CI =& get_instance();
    }    

    private function _send_mail($to, $from, $subject, $body)
    {
        $config['smtp_host'] = '';
        $config['smtp_port'] = '';
        $config['smtp_user'] = '';
        $config['smtp_pass'] = '';
        $config['mailtype']  = 'html'; 
        $config['charset']   = 'utf-8'; 

        $this->CI->load->library('email', $config);
        $this->CI->email->initialize($config);
        
        $this->CI->email->from($from);
        $this->CI->email->to($to);
        $this->CI->email->subject($subject);
        $this->CI->email->message($body);
        $this->CI->email->send();
    }  

    public function customer_registration($mail_data)
    {
        $body         = $this->CI->load->view('admin/Email/customer_registration', $mail_data, TRUE);
        $receiver     = $mail_data['email'];
        $from         = ''; 
        $subject      = 'Account Credentials - '.PROJECT_NAME;

        $this->_send_mail($receiver, $from, $subject, $body);
    }

    public function writer_registration($mail_data)
    {
        $body         = $this->CI->load->view('admin/Email/writer_registration', $mail_data, TRUE);
        $receiver     = $mail_data['email'];
        $from         = ''; 
        $subject      = 'Account Credentials - '.PROJECT_NAME;

        $this->_send_mail($receiver, $from, $subject, $body);
    }

    public function writer_password($mail_data)
    {
        $body         = $this->CI->load->view('admin/Email/writer_password', $mail_data, TRUE);
        $receiver     = $mail_data['email'];
        $from         = ''; 
        $subject      = 'Password Details - '.PROJECT_NAME;

        $this->_send_mail($receiver, $from, $subject, $body);
    } 

    public function enquery_reply($mail_data)
    {
        $body         = $this->CI->load->view('admin/Email/enquery_reply', $mail_data, TRUE);
        $receiver     = $mail_data['email'];
        $from         = ''; 
        $subject      = $mail_data['subject'].' - '.PROJECT_NAME; 

        $this->_send_mail($receiver, $from, $subject, $body);
    } 

    public function compose_email($mail_data)
    {
        $body         = $this->CI->load->view('admin/Email/compose_email', $mail_data, TRUE);
        $receiver     = $mail_data['email'];
        $from         = ''; 
        $subject      = $mail_data['subject'].' - '.PROJECT_NAME;

        $this->_send_mail($receiver, $from, $subject, $body);
    } 

    public function newsletter_mail($mail_data)
    {
        $body         = $this->CI->load->view('admin/Email/newsletter_mail', $mail_data, TRUE);
        $receiver     = $mail_data['email'];
        $from         = ''; 
        $subject      = 'Newsletter Details - '.PROJECT_NAME;

        $this->_send_mail($receiver, $from, $subject, $body);
    } 

    public function blog_approve($mail_data)
    {
        $body         = $this->CI->load->view('admin/Email/blog_approve', $mail_data, TRUE);
        $receiver     = $mail_data['email'];
        $from         = ''; 
        $subject      = 'Blog Approval - '.PROJECT_NAME;

        $this->_send_mail($receiver, $from, $subject, $body);
    }

    public function blog_reject($mail_data)
    {
        $body         = $this->CI->load->view('admin/Email/blog_reject', $mail_data, TRUE);
        $receiver     = $mail_data['email'];
        $from         = ''; 
        $subject      = 'Blog Approval - '.PROJECT_NAME;

        $this->_send_mail($receiver, $from, $subject, $body);
    } 
}

