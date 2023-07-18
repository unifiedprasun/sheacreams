<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Ajax_Function extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();
    }

    public function get_products()
    {
    	$tag_filter = $_POST["tag"];

      echo $sorting_value=$this->input->post('sorting_value');

    	if(count($tag_filter)>0)
    	{
    		$sql = "SELECT * FROM products WHERE ";
        if($sorting_value=='1')
        {  
          $sql .= " is_popular='1' AND (";
        }
        else if($sorting_value=='0')
        {
          $sql .= "";
        }  
    		foreach($tag_filter as $key => $tf)
	    	{
	    		if($key != 0 && $key != count($tag_filter))
	    		{
	    			$sql .= " OR ";
	    		}
	    		
	    		$sql .= "tags LIKE '%$tf%'";
	    	}
        if($sorting_value=='1')
        {  
          $sql .=")";
        }
        else if($sorting_value=='0')
        {
          $sql .="";
        }   	
        echo $sql;
	    	$product = $this->db->query($sql)->result();

	    	$data['details'] = $product;

	    	$this->load->view('website/ajax_view/filter_by_tags', $data);     
    	}
    	else
    	{
        $sql="select * from products where is_active=1 and is_deleted=0";
        if($sorting_value=='1')
        {  
          $sql .= " and is_popular='1'";
        }
        else if($sorting_value=='0')
        {
          $sql .="";
        }
        echo $sql;
    		//$data['details'] = $this->BlankModel->customQuery("select * from products where is_active=1 and is_deleted=0");
        $product = $this->db->query($sql)->result();
        $data['details'] = $product;
    		$this->load->view('website/ajax_view/filter_by_tags', $data);
    	}    	  	
    }

    public function getproducts()
    {
        $category_filter = $_POST["category"];

        $category_id = implode("','", $category_filter);

        if(count($category_filter)>0)
        {
            $sql = "SELECT pc.*, p.* FROM product_category as pc INNER JOIN products as p ON pc.product_id=p.id AND pc.is_active=1 AND pc.is_deleted=0 AND ";

            $sql .= "pc.category IN('".$category_id."') GROUP BY pc.product_id"; 

            $product = $this->db->query($sql)->result();

            $data['details'] = $product;

            $this->load->view('website/ajax_view/filter_by_tags', $data);     
        }
        else
        {
            $data['details'] = $this->BlankModel->customQuery("select * from products where is_active=1 and is_deleted=0");

            $this->load->view('website/ajax_view/filter_by_tags', $data);
        }           
    }

    public function add_to_cart()
    {
        $product_id = $this->input->post('product_id');
        $quantity   = $this->input->post('quantity');
        $user_id    = $this->session->user->id;

        if($user_id =='')
        {
            $details = $this->BlankModel->customQuery("select product_name from products where id='$product_id'");

            $data = array(
                'id'         => $product_id,
                'price'      => 200,
                'qty'        => $quantity,
                'name'       => $details[0]->product_name
            );

            if($this->cart->insert($data))
            {
                echo "1";
            }
            else
            {
                echo "2";
            }
        }
        else
        {
            $check_details = $this->BlankModel->customQuery("select * from cart where product_id='$product_id' and user_id='$user_id' and is_deleted=0");

            if(count($check_details)>0)
            {
                echo "0";
            }
            else
            {
                $data['product_id'] = $product_id;
                $data['user_id']    = $user_id;
                $data['quantity']   = $quantity;
                $data['added_on']   = $this->globalfunction->create_custom_date_time();

                $insert_details = $this->BlankModel->insertData("cart", $data);

                if($insert_details)
                {
                    echo "1";
                }
            }
        }
    }

    public function remove_cart()
    {
        $cart_id = $this->input->post('cart_id');

        $user_id = $this->session->user->id;

        if($user_id =='')
        {
            $data = array(
                'rowid'  => $cart_id,
                'qty'    => 0
            );

            if($this->cart->update($data))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        else
        {
            $data['is_deleted'] = 1;

            $condition['id'] = $cart_id;

            $update_details = $this->BlankModel->updateData("cart", $data, $condition);

            if($update_details)
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
    }

    public function update_cart()
    {
        $cart_id  = $this->input->post('cart_id');
        $cart_qty = $this->input->post('cart_qty');

        $user_id = $this->session->user->id;

        if($user_id =='')
        {
            $data = array(
                'rowid'  => $cart_id,
                'qty'    => $cart_qty
            );

            if($this->cart->update($data))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        else
        {
            $condition['id'] = $cart_id;

            if($cart_qty == 0)
            {
                $data['quantity']   = $cart_qty;
                $data['is_deleted'] = 1;

                $update_details = $this->BlankModel->updateData("cart", $data, $condition);

                if($update_details)
                {
                    echo "1";
                }
                else
                {
                    echo "0";
                }
            }
            else
            {            
                $data['quantity']   = $cart_qty;

                $update_details = $this->BlankModel->updateData("cart", $data, $condition);

                if($update_details)
                {
                    echo "1";
                }
                else
                {
                    echo "0";
                }
            }
        }
    }

    public function subscription()
    {
        $email = $this->input->post('email');

        $check_details = $this->BlankModel->customQuery("select * from newsletters where email='$email'");

        if(count($check_details)>0)
        {
            echo "0";
        }
        else
        {
            $data['email'] = $email;
            $data['subscription_date'] = $this->globalfunction->create_custom_date_time();

            $insert_data = $this->BlankModel->insertData("newsletters", $data);

            if($insert_data)
            {
                $mail_data['email'] = $email;
                $mail_data['base_url'] = base_url();

                $this->custommailweb->subscription($mail_data);

                echo "1";
            }
            else
            {
                echo "2";
            }
        }
    }

    public function know_your_skin()
    {
        $data['skin_type']    = $this->input->post('skin_type');
        $data['skin_concern'] = $this->input->post('skin_concern');
        $data['message']      = $this->input->post('message');
        $data['data_for']     = $this->input->post('data_for');
        $data['name']         = $this->input->post('name');
        $data['mobile']       = $this->input->post('mobile');
        $data['email']        = $this->input->post('email');
        $data['address']      = $this->input->post('address');
        $data['added_on']     = $this->globalfunction->create_custom_date_time();

        $insert_Data = $this->BlankModel->insertData("know_your_skin", $data);

        if($insert_Data)
        {
            $mail_data['name']     = $this->input->post('name');
            $mail_data['email']    = $this->input->post('email');
            $mail_data['mobile']   = $this->input->post('mobile');
            $mail_data['message']  = $this->input->post('message');
            $mail_data['base_url'] = base_url();

            $this->custommailweb->know_your_skin($mail_data);

            echo "1";
        }
        else
        {
            echo "0";
        }
    }

    public function free_sample()
    {
        $data['skin_type']    = $this->input->post('skin_type');
        $data['skin_concern'] = $this->input->post('skin_concern');
        $data['message']      = $this->input->post('message');
        $data['data_for']     = $this->input->post('data_for');
        $data['name']         = $this->input->post('name');
        $data['mobile']       = $this->input->post('mobile');
        $data['email']        = $this->input->post('email');
        $data['address']      = $this->input->post('address');
        $data['added_on']     = $this->globalfunction->create_custom_date_time();

        $insert_Data = $this->BlankModel->insertData("know_your_skin", $data);

        if($insert_Data)
        {
            $mail_data['name']     = $this->input->post('names');
            $mail_data['email']    = $this->input->post('emails');
            $mail_data['mobile']   = $this->input->post('mobiles');
            $mail_data['message']  = $this->input->post('messages');
            $mail_data['base_url'] = base_url();

            $this->custommailweb->free_sample($mail_data);

            echo "1";
        }
        else
        {
            echo "0";
        }
    }

    public function register_email_validate()
    {
        $email = $this->input->post('email');

        $check_details = $this->BlankModel->customQuery("select email from users where email='$email' and is_deleted=0");

        if(count($check_details)>0)
        {
            echo "0";
        }
        else
        {
            echo "1";
        }
    }

    public function register_mobile_validate()
    {
        $mobile = $this->input->post('mobile');

        $check_details = $this->BlankModel->customQuery("select mobile from users where mobile='$mobile' and is_deleted=0");

        if(count($check_details)>0)
        {
            echo "0";
        }
        else
        {
            echo "1";
        }
    }

    public function update_password()
    {
        $user_id = $this->session->user->id;

        $old_pass = base64_encode($this->input->post('old_pass'));
        $new_pass = $this->input->post('new_pass');
        $con_pass = $this->input->post('con_pass');

        $check_details = $check_details = $this->BlankModel->customQuery("select password from users where password='$old_pass' and id='$user_id'");

        if(count($check_details)>0)
        {
            if($con_pass == $new_pass)
            {
                $saved_data['password'] = base64_encode($con_pass);

                $condition['id'] = $user_id;

                $update_data = $this->BlankModel->updateData("users", $saved_data, $condition);

                if($update_data)
                {
                    echo "1";
                }
                else
                {
                    echo "0";
                }
            }
            else
            {
                echo "2";
            }
        }
        else
        {
            echo "3";
        }
    }

    public function get_details()
    {
        $name = $this->input->post('title');

        $text = preg_replace('~[^\pL\d]+~u', '-', $name);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text); 
        $text = $text;        

        $check_slug = $this->BlankModel->customQuery("select slug from blogs where slug='$text' and is_deleted=0");

        if(count($check_slug)>0)
        {
            header('Content-Type:application/json');

            die(json_encode(array("status"=>"0","message"=>"Failed"))); 
        }    
        else
        {
            header('Content-Type:application/json');

            die(json_encode(array("status"=>"1","message"=>"Success","slug"=>$text))); 
        }
    } 

    public function get_tags()
    {
        $blog_cat = $this->input->post('blog_cat');

        $data = $this->BlankModel->customQuery("select GROUP_CONCAT(tag) as tag from tags where category='$blog_cat' and is_active=1 and is_deleted=0");

        $tags = $data[0]->tag;

        if($tags !='')
        {
            echo $tags;
        }
        else
        {
            echo "No suggested tags found for this category";
        }               
    }
}