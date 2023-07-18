<?php 

if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Custommailweb
{ 
    public function __construct()
    {
        $this->CI =& get_instance();
    }    

    private function _send_mail($receiver, $from, $subject, $body)
    {
        $config['smtp_host'] = 'mail.mridayadevstudio.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'ghra@mridayadevstudio.com';
        $config['smtp_pass'] = 'Ghra@803#';
        $config['mailtype']  = 'html'; 
        $config['charset']   = 'utf-8';  

        $this->CI->load->library('email', $config);
        $this->CI->email->initialize($config);        

        $this->CI->email->from($from, PROJECT_NAME);
        $this->CI->email->to($receiver);
        $this->CI->email->subject($subject);
        $this->CI->email->message($body);
        $this->CI->email->send();
    }  

    public function subscription($mail_data)
    {
        $body      = $this->CI->load->view('website/mail/admin_subscription', $mail_data, TRUE);
        $receiver  = '';
        $from      = $mail_data['email']; 
        $subject   = 'Newsletter Subscription - '.PROJECT_NAME;
    
        $this->_send_mail($receiver, $from, $subject, $body);
    } 

    public function know_your_skin($mail_data)
    {
        $body      = $this->CI->load->view('website/mail/admin_know_your_skin', $mail_data, TRUE);
        $receiver  = '';
        $from      = $mail_data['email']; 
        $subject   = 'Know Your Skin - '.PROJECT_NAME;
    
        $this->_send_mail($receiver, $from, $subject, $body);
    } 

    public function free_sample($mail_data)
    {
        $body      = $this->CI->load->view('website/mail/admin_free_sample', $mail_data, TRUE);
        $receiver  = '';
        $from      = $mail_data['email']; 
        $subject   = 'Free Sample - '.PROJECT_NAME;
    
        $this->_send_mail($receiver, $from, $subject, $body);
    }

    public function register_email_user($mail_data)
    {
        $body      = $this->CI->load->view('website/mail/register_email_user', $mail_data, TRUE);
        $receiver  = $mail_data['email']; 
        $from      = ''; 
        $subject   = 'Account Registration - '.PROJECT_NAME;
    
        $this->_send_mail($receiver, $from, $subject, $body);
    } 

    public function register_email_admin($mail_data)
    {
        $body      = $this->CI->load->view('website/mail/register_email_admin', $mail_data, TRUE);
        $receiver  = '';
        $from      = $mail_data['email']; 
        $subject   = 'Account Registration - '.PROJECT_NAME;
    
        $this->_send_mail($receiver, $from, $subject, $body);
    }

    public function enquiry($mail_data)
    {
        $body      = $this->CI->load->view('website/mail/admin_enquiry', $mail_data, TRUE);
        $receiver  = '';
        $from      = $mail_data['email']; 
        $subject   = 'Enquery Details - '.PROJECT_NAME;
    
        $this->_send_mail($receiver, $from, $subject, $body);
    }

    public function blog_notify($mail_data)
    {
        $body      = $this->CI->load->view('website/mail/blog_notify', $mail_data, TRUE);
        $receiver  = '';
        $from      = $mail_data['email']; 
        $subject   = 'New Blog Details - '.PROJECT_NAME;
    
        $this->_send_mail($receiver, $from, $subject, $body);
    }

    public function blog_update_notify($mail_data)
    {
        $body      = $this->CI->load->view('website/mail/blog_update_notify', $mail_data, TRUE);
        $receiver  = '';
        $from      = $mail_data['email']; 
        $subject   = 'New Blog Details - '.PROJECT_NAME;
    
        $this->_send_mail($receiver, $from, $subject, $body);
    }
}



