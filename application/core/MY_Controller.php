<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class MY_Controller extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();

        $this->load->model('admin/Blank_model', 'BlankModel');
        $this->load->model('website/Blank_model', 'BlankModel');

        $this->data['config'] = $this->get_config(); 
    }

    public function set_admin_session($admindata = array()) 
    {
        $admin_id = 0;

        if (!empty($admindata)) 
        {
            if (is_object($admindata)) 
            {
                $admin_id = $admindata->id;
            } 
            else if (is_array($admindata)) 
            {
                $admin_id = $admindata['admin_id'];
            }

            if ($admin_id > 0) {
                $this->session->set_userdata('admin', $admindata);
            }
        }
    }

    public function destroy_admin_session() 
    {
        if ($this->session->has_userdata('admin')) 
        {
            $this->session->unset_userdata('admin');
        }
    }

    public function admin_session_checked($is_active_session = 1) 
    {
        if ($is_active_session) 
        {
            if (!$this->session->has_userdata('admin')) 
            {
                redirect('admin');
            }
        } 
        else 
        {
            if ($this->session->has_userdata('admin')) 
            {
                redirect('admin/Admins/index');
            }
        }
    }	

    //=========================================CUSTOMER SESSION=============================================//

    public function set_user_session($userdata = array()) 
    {
        $user_id = 0;

        if (!empty($userdata)) 
        {
            if (is_object($userdata)) 
            {
                $user_id = $userdata->id;
            } 
            else if (is_array($userdata)) 
            {
                $user_id = $userdata['user_id'];
            }

            if ($user_id > 0) 
            {
                $this->session->set_userdata('user', $userdata);
            }
        }
    }

    public function destroy_user_session() 
    {
        if ($this->session->has_userdata('user')) 
        {
            $this->session->unset_userdata('user');
        }
    }

    public function user_session_checked($is_active_session = 1) 
    {
        if ($is_active_session) 
        {
            if (!$this->session->has_userdata('user')) 
            {
                $this->session->set_flashdata('error', "Please login your account");
                
                redirect(base_url());
            }
        } 
        else 
        {
            if ($this->session->has_userdata('user')) 
            {
                redirect('website/Home');
            }
        }
    }   

    public function get_config()
    {
        $result = $this->BlankModel->customQuery("select * from general_settings where is_active=1 and is_deleted=0");

        $data = array();

        foreach($result as $r)
        {
            $data[$r->title] = array(
                'name'  => $r->name,
                'value' => $r->value,
                'icon'  => $r->icon
            );
        }

        return $data;
    }
}

?>