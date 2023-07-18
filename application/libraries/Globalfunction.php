<?php 

if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Globalfunction
{ 
    public function __construct()
    {
        $this->CI =& get_instance();
    } 

    public function convert_custom_date($date)
    {
    	$data = date('Y-m-d', strtotime($date));
    	return $data;
    }

    public function convert_custom_date_time($date_time)
    {
    	$data = date('Y-m-d H:i:s', strtotime($date_time));
    	return $data;
    }

    public function convert_custom_time($time)
    {
    	$data = date('H:i:s', strtotime($time));
    	return $data;
    }

    public function create_custom_date()
    {
        $data = date('Y-m-d');
        return $data;
    }

    public function create_custom_date_time()
    {
        $data = date('Y-m-d H:i:s');
        return $data;
    }

    public function create_custom_time()
    {
        $data = date('H:i:s');
        return $data;
    }

    public function upload_file($types, $field_name, $return_path)
    {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = $types;
        $config['max_size']      = 3096;

        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);

        if($this->CI->upload->do_upload($field_name))
        {
            $data     = $this->CI->upload->data();
            $filename = $data['file_name'];

            return $filename;
        }
        else
        {
            $error = $this->CI->upload->display_errors();

            if($error)
            {
                $this->CI->session->set_flashdata("error", "You are not allowed to upload file more than 2 MB of size or file type doesn't match");

                redirect($return_path);
            }
        }
    }
}