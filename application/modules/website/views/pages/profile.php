<style type="text/css">
    table.dataTable {
        margin-top: 10px !important;
        margin-bottom: 15px !important;
        border-collapse: collapse !important;
    }
</style>

<div class="container pt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="mb-3 user_pro_card">
              <form action="<?=base_url()?>website/Pages/update_profile_image/<?=$details[0]->id?>" class="pro_info_form" method="post" enctype="multipart/form-data">
                <div class="profile-userpic">
                    <?php
                    if($details[0]->image!="")
                    {  
                    ?>
                    <img src="<?=base_url()?>uploads/user_profile_images/<?=$details[0]->image?>" style="width:150px;height:150px;" class="img-responsive" id="default_image" alt="" />
                    <?php
                    }
                    else
                    {
                    ?>
                    <img src="https://media.rockstargames.com/chinatownwars/global/downloads/avatars/zhou_256x256.jpg" class="img-responsive" id="default_image" alt="">
                    <?php
                    }
                    ?>  
                    <img id="output" style="width:150px;height:150px;display: none;" />
                </div>

                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                      Jason Davis
                    </div>
                </div>

                <div class="profile-userbuttons">
                    <div class="file_up btn btn-sm btn-primary">
                        Edit
                        <input type="file" name="profile_image" id="profile_image" accept="image/*" onchange="loadFile(event)" />
                        <input type="hidden" value="<?=$details[0]->image?>" name="old_profile_image" class="form-input-styled" data-fouc>
                    </div>
                    <button type="submit" class="btn btn-danger btn-sm update_pro_info">Update</button>
                </div>
              </form>  
            </div>

            <ul class="nav flex-column nav-pills nav-fill nav_profile" id="myTab" role="tablist">
                <li class="nav-item text-left">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#my_profile" role="tab" aria-controls="profile" aria-selected="true">
                        My Account
                    </a>
                </li>
                <li class="nav-item text-left">
                    <a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">
                        Address Book
                    </a>
                </li>
                <li class="nav-item text-left">
                    <a class="nav-link" id="changePass-tab" data-toggle="tab" href="#changePass" role="tab" aria-controls="changePass" aria-selected="false">
                        Change Password
                    </a>
                </li>
                <li class="nav-item text-left">
                    <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="false">
                        My Orders
                    </a>
                </li>
                <li class="nav-item text-left">
                    <a class="nav-link" id="support-tab" data-toggle="tab" href="#support" role="tab" aria-controls="support" aria-selected="false">
                        Support
                    </a>
                </li>
                <?php if($this->session->user->user_type == 2){ ?>
                <li class="nav-item text-left">
                    <a class="nav-link" id="myBlog-tab" data-toggle="tab" href="#myBlog" role="tab" aria-controls="myBlog" aria-selected="false">
                        My Blogs
                    </a>
                </li>
                <?php } ?>
            </ul>

        </div>

        <div class="col-md-9">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="my_profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card profile_card">
                        <div class="card-header">
                            My Profile Information
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url()?>website/Pages/update_profile/<?=$details[0]->id?>" class="pro_info_form" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name" class="mb-0 text-black font-weight-bolder label_font">Full Name </label>
                                            <input type="text" name="name" class="form-control" placeholder="First name" id="first_name" value="<?=$details[0]->name?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username" class="mb-0 text-black font-weight-bolder label_font">Username </label>
                                            <input type="text" name="username" class="form-control" placeholder="Username" id="username" value="<?=$details[0]->username?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="mb-0 text-black font-weight-bolder label_font"> Email Address </label>
                                            <input type="emails" onkeyup="return profile_email_validate(this.value);" name="email" class="form-control" placeholder="Email Address" id="emails" value="<?=$details[0]->email?>" readonly>
                                            <div class="pt-2" id="emailalert"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobiles" class="mb-0 text-black font-weight-bolder label_font"> Mobile Number </label>
                                            <input type="number" onkeyup="return profile_mobile_validate(this.value);" name="mobile" class="form-control" placeholder="Mobile Number" id="mobiles" value="<?=$details[0]->mobile?>" readonly>
                                            <div class="pt-2" id="mobilealert"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button class="btn pink-btn mt-4 edit_pro_info" type="button">Edit</button>
                                        <button type="submit" class="btn nav-btn browse-btn mt-4 update_pro_info">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card profile_card">
                        
                        <div class="card-header d-flex justify-content-between">
                            Manage Address
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#add_address_mdl" class="btn pink-btn edit_pro_info add_blog_btn" type="button">Add Your Address</a>
                        </div>

                        <div class="card-body">
                            <?php if(count($address)>0){ ?>
                                <?php foreach($address as $key => $a){ ?>
                                <div class="addBook_card <?php if($key != (count($address)-1)){ ?> <?php echo "mb-3"; ?> <?php } ?>">
                                    <div class="addBook_card_header d-flex justify-content-between">
                                        <div>
                                            <?=$a->address_type?>
                                        </div>

                                        <div class="card_edit_delete">
                                            <a href="javascript:void(0)" class="mr-2" data-toggle="modal" data-target="#edit_address_mdl<?=$a->id?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                            </a>
                                            <a href="<?=base_url()?>website/Pages/delete_address/<?=$a->id?>" onclick="return confirm('Are you want to delete ?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                        </div>
                                    </div>
                                    <div class="addBook_card_body">
                                        <p class="add_heading mb-0 mt-3">
                                            <b><?=$a->name?></b> &nbsp; &nbsp; <b><?=$a->contact_no?></b> &nbsp; &nbsp; <b><?=$a->email?></b>
                                        </p>
                                        <p class="add">
                                            <?=$a->address?>, <?=$a->city?>, <?=$a->state?> - <?=$a->post_code?>
                                            <br>
                                            <b>Landmark : </b><?=$a->landmark?>
                                        </p>
                                    </div>
                                </div> 
                                <?php } ?>                          
                            <?php }else{ ?> 
                                <div class="addBook_card mt-0">
                                    <p class="text-center mb-0">No data found</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="changePass" role="tabpanel" aria-labelledby="changePass-tab">
                    <div class="card profile_card">
                        <div class="card-header">
                            Change Password
                        </div>
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label for="old_pass" class="mb-0 text-black font-weight-bolder label_font">Old Password</label>
                                <input type="password" required name="old_pass" class="form-control" placeholder="Old Password" id="old_pass">
                            </div>

                            <div class="form-group">
                                <label for="new_pass" class="mb-0 text-black font-weight-bolder label_font">New Password</label>
                                <input type="password" required name="new_pass" class="form-control" placeholder="New Password" id="new_pass">
                            </div>

                            <div class="form-group">
                                <label for="con_pass" class="mb-0 text-black font-weight-bolder label_font">Confirm Password</label>
                                <input type="password" required name="con_pass" class="form-control" placeholder="Confirm Password" id="con_pass">
                            </div>
                            <div class="text-right">
                                <button type="submit" id="pass_btn" class="btn nav-btn browse-btn mt-2 update_pro_info">Update Password</button>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                    <div class="card profile_card">
                        <div class="card-header">
                            My Orders
                        </div>

                        <div class="card-body">
                            <div class="">
                                <table class="w-100 table-bordered product_list_table mb-3">
                                    <tr>
                                        <th>
                                            Product Name
                                        </th>

                                        <td>
                                            Xyz Product
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Order Id
                                        </th>

                                        <td>
                                            #cdcd1234
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Price
                                        </th>

                                        <td>
                                            $50.00
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Qtn
                                        </th>

                                        <td>
                                            2
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Delivery Status
                                        </th>

                                        <td class="yet_ship">
                                            Yet to ship
                                        </td>
                                    </tr>
                                </table>

                                <table class="w-100 table-bordered product_list_table mb-3">
                                    <tr>
                                        <th>
                                            Product Name
                                        </th>

                                        <td>
                                            Xyz Product
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Order Id
                                        </th>

                                        <td>
                                            #cdcd1234
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Price
                                        </th>

                                        <td>
                                            $50.00
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Qtn
                                        </th>

                                        <td>
                                            2
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Delivery Status
                                        </th>

                                        <td class="on_transit">
                                            On transit
                                        </td>
                                    </tr>
                                </table>

                                <table class="w-100 table-bordered product_list_table mb-3">
                                    <tr>
                                        <th>
                                            Product Name
                                        </th>

                                        <td>
                                            Xyz Product
                                        </td>

                                        <td class="rate_td">
                                            <a href="" class="rate"> <i class="fa fa-star"></i> Rate</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Order Id
                                        </th>

                                        <td colspan="2">
                                            #cdcd1234
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Price
                                        </th>

                                        <td colspan="2">
                                            $50.00
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Qtn
                                        </th>

                                        <td colspan="2">
                                            2
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Delivery Status
                                        </th>

                                        <td class="delivered" colspan="2">
                                            Delivered
                                        </td>
                                    </tr>
                                </table>

                                <table class="w-100 table-bordered product_list_table mb-3">
                                    <tr>
                                        <th>
                                            Product Name
                                        </th>

                                        <td>
                                            Xyz Product
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Order Id
                                        </th>

                                        <td>
                                            #cdcd1234
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Price
                                        </th>

                                        <td>
                                            $50.00
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Qtn
                                        </th>

                                        <td>
                                            2
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Delivery Status
                                        </th>

                                        <td class="cancel">
                                            Canceled
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>

                <div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab">
                    <div class="card profile_card">
                        <div class="card-header">
                            Write to us
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url()?>website/Pages/submit_enquiry" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Full Name</label>
                                            <input type="text" value="<?=$this->session->user->name?>" required name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" value="<?=$this->session->user->email?>" required name="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Contact Number</label>
                                            <input type="text" required value="<?=$this->session->user->mobile?>" name="mobile" class="form-control"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" required name="subject" class="form-control"> 
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea cols="40" rows="5" required name="message" class="form-control"></textarea>
                                        </div>
                                    </div>  
                                </div>                            

                                <div class="text-right">
                                    <button type="submit" class="btn nav-btn browse-btn">SUBMIT</button>
                                </div>
                                <div class="text-center mt-4">
                                    You can also reach us quickly through email <a href="mailto:info@sheacreams.com">info@sheacreams.com</a> or call us at <a href="tel:9800675431">9800675431</a>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="myBlog" role="tabpanel" aria-labelledby="myBlog-tab">
                    <div class="card profile_card">
                        <div class="card-header d-flex justify-content-between">
                            My Blogs

                            <a href="javascript:void(0);" data-toggle="modal" data-target="#add_blog_post" class="btn pink-btn edit_pro_info add_blog_btn" type="button">Post your blog</a>
                        </div>
                        <div class="card-body">
                            <?php if(count($blogs)>0){ ?>
                                <?php foreach($blogs as $key => $b){ ?>
                                    <div class="addBook_card <?php if($key != (count($blogs)-1)){ ?> <?php echo "mb-3"; ?> <?php } ?>">
                                        <div class="addBook_card_header d-flex justify-content-between">
                                            <div class="card_edit_delete">
                                                <a href="javascript:void(0)" class="mr-2" data-toggle="modal" data-target="#blog_comment<?=$b->id?>">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View Comments
                                                </a>
                                            </div>
                                            <div class="card_edit_delete">
                                                <a href="javascript:void(0)" class="mr-2" data-toggle="modal" data-target="#edit_blog<?=$b->id?>">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                        <div class="addBook_card_body pt-3">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="blog_post_img">
                                                        <img src="<?=base_url()?>uploads/<?=$b->image?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h3 class="mt-md-0 mt-3 mb-2"><?=$b->title?></h3>

                                                    <p class="mb-1">
                                                        <i class="fa fa-clock-o"></i> Submitted date: <?=date('d F Y', strtotime($b->added_on))?>
                                                    </p>

                                                    <p class="mb-0">

                                                        <?php if($b->is_approve == 0){ ?>
                                                            Status: <b class="text-orenge">On review</b>
                                                        <?php }else if($b->is_approve == 1){ ?>
                                                            <?php if($b->is_deleted == 1){ ?>
                                                                Status: <b class="text-danger">Deleted</b>
                                                            <?php }else{ ?>
                                                                <?php if($b->is_active == 0){ ?>
                                                                    Status: <b class="text-orenge">Inactive</b>
                                                                <?php }else{ ?>
                                                                    Status: <b class="text-success">Active</b>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php }else{ ?>
                                                            Status: <b class="text-danger">Rejected</b>
                                                        <?php } ?>

                                                    </p>

                                                    <p class="pro-d-ca mb-1">
                                                        <span>Category :</span> <a href="javascript:void(0);" title=""><?=$b->name?></a>
                                                    </p>
                                                    <p class="tagged_as mb-1">
                                                        Tags: 
                                                        <?php 
                                                        $tags = explode(',', $b->tags);
                                                        foreach($tags as $t){ ?>
                                                            <a href="javascript:void(0);" rel="tag"><?=$t?></a>
                                                        <?php } ?>
                                                    </p>                                            
                                                </div>

                                                <div class="col-12">
                                                    <p class="mt-3">
                                                        <?=$b->short_desc?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                <?php } ?> 
                            <?php }else{ ?>
                                <div class="addBook_card mt-0">
                                    <p class="text-center mb-0">No data found</p>
                                </div>
                            <?php } ?>                       
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>   

<!--====================================================EDIT ADDRESS MODAL===============================================-->
<?php foreach($address as $a){ ?>
    <div class="modal fade" id="edit_address_mdl<?=$a->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="my-add-form" action="<?=base_url()?>website/Pages/update_address/<?=$a->id?>" method="post">
                    <div class="modal-body">                 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="form-control" required name="address_type">
                                      <option value="">Address Type</option>
                                      <option <?php if($a->address_type == 'Office'){ ?> <?php echo "selected"; ?> <?php } ?> value="Office">Office</option>
                                      <option <?php if($a->address_type == 'Home'){ ?> <?php echo "selected"; ?> <?php } ?> value="Home">Home</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" value="<?=$a->name?>" required placeholder="Full Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="email" value="<?=$a->email?>" required placeholder="Email Address" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" maxlength="10" value="<?=$a->contact_no?>" name="contact_no" required placeholder="Contact Number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" maxlength="10" value="<?=$a->alt_contact_no?>" name="alt_contact_no" placeholder="Alternative Contact Number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="country" value="<?=$a->country?>" required placeholder="Country" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="state" value="<?=$a->state?>" required placeholder="State" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="city" value="<?=$a->city?>" placeholder="City" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="post_code" value="<?=$a->post_code?>" required placeholder="Zip code" class="form-control">
                                </div>
                            </div>                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="house_no" value="<?=$a->house_no?>" placeholder="House Number If Any" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="landmark" value="<?=$a->landmark?>" required placeholder="Landmark" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <textarea class="form-control" rows="3" placeholder="Address" name="address" required style="resize: none;"><?=$a->address?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn pink-btn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn nav-btn browse-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!--====================================================ADD ADDRESS MODAL===============================================-->

<div class="modal fade" id="add_address_mdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="my-add-form" action="<?=base_url()?>website/Pages/add_address" method="post">
                <div class="modal-body">                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select class="form-control" required name="address_type">
                                  <option value="">Address Type</option>
                                  <option value="Office">Office</option>
                                  <option value="Home">Home</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" required placeholder="Full Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="email" required placeholder="Email Address" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" maxlength="10" name="contact_no" required placeholder="Contact Number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" maxlength="10" name="alt_contact_no" placeholder="Alternative Contact Number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="country" required placeholder="Country" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="state" required placeholder="State" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="city" placeholder="City" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="post_code" required placeholder="Zip code" class="form-control">
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="house_no" placeholder="House Number If Any" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="landmark" required placeholder="Landmark" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <textarea class="form-control" rows="3" placeholder="Address" name="address" required style="resize: none;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn pink-btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn nav-btn browse-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--====================================================BLOG POST======================================================-->

<div class="modal fade" id="add_blog_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom_width" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Your Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="my-add-form" enctype="multipart/form-data" action="<?=base_url()?>website/Pages/add_blog" method="post">
                <div class="modal-body">                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select class="form-control" id="blog_cat" required name="category">
                                  <option value="">Select Category</option>
                                  <?php foreach($category as $c){ ?>
                                     <option value="<?=$c->id?>"><?=$c->name?></option>
                                 <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="title" id="blog_title" required placeholder="Blog Title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="slug" id="slug" required readonly placeholder="Slug" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12" id="tag_div" style="display: none;">
                            <div class="form-group">
                                <div id="first_div"></div>
                                <input id="ms1" class="form-control" type="text" name="tags"/>                              
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Short Description" name="short_desc" required style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Content" name="content" required style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="image" required class="form-control blog_image">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="meta_title" placeholder="Meta Title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Meta Keywords" name="meta_keywords" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <textarea class="form-control" rows="3" placeholder="Meta Description" name="meta_description" style="resize: none;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn pink-btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn nav-btn browse-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--====================================================BLOG COMMENTS======================================================-->
<?php foreach($blogs as $b){ 
    $blog_id = $b->id;
    $comments = $this->BlankModel->customQuery("SELECT bc.*, u.* FROM blog_comments as bc INNER JOIN users as u ON bc.user_id=u.id AND bc.blog_id='$blog_id'");
    ?>
    <div class="modal fade" id="blog_comment<?=$b->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>            
                <div class="modal-body">                 
                    <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th style="width: 110px;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($comments)>0){ ?>
                            <?php $i=1;foreach($comments as $d){ ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$d->name?></td>
                                    <td><?=$d->email?></td>
                                    <td><?=$d->comment?></td>
                                    <td><?=date('d M y', strtotime($d->added_on))?></td>                                
                                </tr>
                            <?php $i++;} ?> 
                        <?php }else{ ?>
                            <tr>
                                <td colspan="5" class="text-center">No data found</td>
                            </tr>
                        <?php } ?>                  
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn pink-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!--====================================================EDIT BLOG POST======================================================-->
<?php foreach($blogs as $b){ ?>
    <div class="modal fade" id="edit_blog<?=$b->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custom_width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Your Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="my-add-form" enctype="multipart/form-data" action="<?=base_url()?>website/Pages/update_blog/<?=$b->id?>" method="post">
                    <div class="modal-body">                 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="form-control" required name="category">
                                      <option value="">Select Category</option>
                                      <?php foreach($category as $c){ ?>
                                         <option <?php if($c->id == $b->category){ ?> <?php echo "selected"; ?> <?php } ?> value="<?=$c->id?>"><?=$c->name?></option>
                                     <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="<?=$b->title?>" readonly name="title" required placeholder="Blog Title" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="<?=$b->slug?>" name="slug" required readonly placeholder="Slug" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input data-role="tagsinput" value="<?=$b->tags?>" class="form-control" type="text" name="tags"/>                              
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Short Description" name="short_desc" required style="resize: none;"><?=$b->short_desc?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Content" name="content" required style="resize: none;"><?=$b->content?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <img src="<?=base_url()?>uploads/<?=$b->image?>" width="130" height="80">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control blog_image">
                                    <input type="hidden" name="old_image" value="<?=$b->image?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" value="<?=$b->meta_title?>" name="meta_title" placeholder="Meta Title" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Meta Keywords" name="meta_keywords" style="resize: none;"><?=$b->meta_keywords?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <textarea class="form-control" rows="3" placeholder="Meta Description" name="meta_description" style="resize: none;"><?=$b->meta_description?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn pink-btn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn nav-btn browse-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>