var BASE_URL  = 'http://localhost/sheacreams';

var base_url  = window.location.origin;

var host      = window.location.host;

var pathArray = window.location.pathname.split('/');

$("p").each(function(){
    if (!$(this).text().trim().length) 
    {
        $(this).remove();
    }
});

$(document).ready(function(){

    $('.summernote').summernote({
        height: "150px",
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0]);
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: BASE_URL+"/admin/Cms/upload_image",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                $('.summernote').summernote("insertImage", url);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteImage(src) {
        $.ajax({
            data: {src : src},
            type: "POST",
            url: BASE_URL+"/admin/Cms/delete_image",
            cache: false,
            success: function(response) {
                console.log(response);
            }
        });
    }

});

function check_uncheck_checkbox(isChecked) 
{
    if(isChecked) 
    {
        $('input[name="all"]').each(function() { 
            this.checked = true; 
        });
    } 
    else 
    {
        $('input[name="all"]').each(function() {
            this.checked = false;
        });
    }
}

$(document).ready(function() {
    $('#subscription_reply').click(function() {
        var values = $('input[type="checkbox"][name="all"]:checked').map(function() {
        return $(this).val();
        }).get().join(',');
        if(values == '')
        {
            openModel('Please select atleast one checkbox');
            return false;
        }
        else
        {
            $('#result').val(values);
            $('#reply_all_subscriber').modal('show');
        }        
    })
});

function openModel(message)
{
    $('body #PopupMessages').html('');
    $('body #PopupMessages').append('<div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="ExampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"></div><div class="modal-body text">'+message+'</div><div class="modal-footer"></div></div></div></div>');
    $('#MessageModal').modal({show:true});

    setTimeout(function() 
    {
        $('#MessageModal').modal('hide');
    }, 3000);
}

function confirm_password_validate()
{
    var password = $('#password').val();
    var con_pass = $('#con_pass').val();

    if(con_pass != password)
    {
        openModel('Confirm password does not match');

        $('#con_pass').val('');
        
        return false;
    }
}

//==============================================Admin Profile=============================================//

function new_password_validate()
{
    var old_pass = $('#old_pass').val();

    if(old_pass !='')
    {
        var new_pass = document.getElementById('new_pass');
        var con_pass = document.getElementById('con_pass');

        var newpass = $('#new_pass').val();
        var conpass = $('#con_pass').val();

        if(newpass =='')
        {
            openModel('Please enter new password');

            return false;
        }
        else if(conpass =='')
        {
            openModel('Please enter confirm password');

            return false;
        }
        else
        {
            if(conpass != newpass)
            {
                openModel('Confirm password does not match');

                $('#con_pass').val('');
                
                return false;
            } 
        }        
    }    
}

function validate_password()
{
    var old_pass = $('#old_pass').val();
    var url = BASE_URL+"/admin/Admins/fetch_password";
    var dataString = "old_pass="+old_pass;
    $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        success: function(data)
        {          
            if(data=='1')
            {
                $('#old_pass').val(old_pass);

                $('#update_profile').prop('disabled', false);
            }
            else
            {
                openModel('Old password does not match');

                $('#update_profile').prop('disabled', true);

                $('#old_pass').val('');     
            }
        }
    });    
}

//=========================================Customer Management============================================//

function customer_email_validate()
{ 
    var email = $('#email').val();
    var url = BASE_URL+"/admin/Customer/fetch_email";
    var dataString = "email="+email;
    $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        success: function(data)
        {          
            if(data=='1')
            {
                openModel('This email address already exists');

                $('#email').val('');
                $('#email-error').html('This field is required');
                $('#email-error').css('color','red');
            }
            else
            {
                $('#email').val(email);
                $('#email-error').css('color','green');
            }
        }
    });    
}; 

function customer_mobile_validate()
{ 
    var mobile = $('#mobile').val();
    var url = BASE_URL+"/admin/Customer/fetch_mobile";
    var dataString = "mobile="+mobile;
    $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        success: function(data)
        {          
            if(data=='1')
            {
                openModel('This mobile number already exists');

                $('#mobile').val('');
                $('#mobile-error').html('This field is required');
                $('#mobile-error').css('color','red');
            }
            else
            {
                $('#mobile').val(mobile);
                $('#mobile-error').css('color','green');
            }
        }
    });    
}; 

//===========================================Writer Management===========================================//

$(document).on('change', '#writer_email', function (e) {
    var email = $('#writer_email').val();
    var url = BASE_URL+'/admin/Writer/fetch_email';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {email: email},
        cache: false,
        success: function(result) 
        {
            if(result == 1)
            {
                openModel('This email address alredy exists');

                $('#writer_email').val('');

                return false;
            } 
            else
            {
                return true;
            }                  
        }
    });
});

$(document).on('change', '#writer_contact_number', function (e) {

    var contact_number = $('#writer_contact_number').val();
    var url = BASE_URL+'/admin/Writer/fetch_mobile';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {contact_number: contact_number},
        cache: false,
        success: function(result) 
        {
            if(result == 1)
            {
                openModel('This mobile number alredy exists');

                $('#writer_contact_number').val('');

                return false;
            } 
            else
            {
                return true;
            }                  
        }
    });
});

function writer_password_validate(id)
{
    var new_pass = document.getElementById('new_pass'+id);
    var con_pass = document.getElementById('con_pass'+id);

    var newpass = $('#new_pass'+id).val();
    var conpass = $('#con_pass'+id).val();

    if(newpass =='' && conpass =='')
    {
        $('#new_pass_alert'+id).html('This field is required');
        $('#con_pass_alert'+id).html('This field is required');
        $('#con_pass_alert'+id).css("color", "red");
        $('#con_pass_alert'+id).css("font-weight", "600");
        $('#new_pass_alert'+id).css("color", "red");
        $('#new_pass_alert'+id).css("font-weight", "600");

        return false;
    }
    if(newpass =='' && conpass !='')
    {
        $('#new_pass_alert'+id).html('Please enter new password');
        $('#new_pass_alert'+id).css("color", "red");
        $('#new_pass_alert'+id).css("font-weight", "600");
        $('#con_pass_alert'+id).html('');

        return false;
    }
    else if(conpass =='' && new_pass !='')
    {
        $('#con_pass_alert'+id).html('Please enter confirm password');
        $('#con_pass_alert'+id).css("color", "red");
        $('#con_pass_alert'+id).css("font-weight", "600");
        $('#new_pass_alert'+id).html('');

        return false;
    }
    else
    {
        if(conpass != newpass)
        {
            $('#con_pass_alert'+id).html('Confirm password does not match');
            $('#con_pass_alert'+id).css("color", "red");
            $('#con_pass_alert'+id).css("font-weight", "600");
            $('#new_pass_alert'+id).html('');
            $('#con_pass'+id).val('');
            
            return false;
        } 
        else
        {
            return true;
        } 
    }    
}

//=====================================================Enquery============================================//

function check_uncheck_checkbox(isChecked) 
{
    if(isChecked) 
    {
        $('input[name="all"]').each(function() 
        { 
            this.checked = true; 
        });
    } 
    else 
    {
        $('input[name="all"]').each(function() 
        {
            this.checked = false;
        });
    }
}

function delete_enquery_lists()
{
    var selected  = new Array();

    var tblFruits = document.getElementById("sample_5");

    var chks = tblFruits.getElementsByTagName("INPUT");

    for (var i = 0; i < chks.length; i++) 
    {
        if (chks[i].checked) 
        {
            selected.push(chks[i].value);
        }
    }

    if (selected.length > 0) 
    {
        var all_id = ""+selected+"";
        var ids = all_id.replace(/,/g, '-');
        var url = BASE_URL +"/admin/Enquery/delete_enquery_details/"+ids;
        var dataString = "id="+all_id;

        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            dataType:"JSON",
            success: function(data)
            {
                if(data.status=='1')
                {
                    openModel('Delete successfully done');
                    location.reload();
                }
                else
                {
                    openModel('Somthing went wrong');  
                    location.reload(); 
                }
            }
        });

    }
}

function undo_trash_lists()
{
    var selected  = new Array();

    var tblFruits = document.getElementById("sample_5");

    var chks = tblFruits.getElementsByTagName("INPUT");

    for (var i = 0; i < chks.length; i++) 
    {
        if (chks[i].checked) 
        {
            selected.push(chks[i].value);
        }
    }

    if (selected.length > 0) 
    {
        var all_id = ""+selected+"";
        var ids = all_id.replace(/,/g, '-');
        var url = BASE_URL +"/admin/Enquery/undo_trash_lists/"+ids;
        var dataString = "id="+all_id;

        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            dataType:"JSON",
            success: function(data)
            {
                if(data.status=='1')
                {
                    openModel('Message recover successfull done')
                    location.reload();
                }
                else
                { 
                    location.reload(); 
                }
            }
        });

    }
}

function delete_compose_lists()
{
    var selected  = new Array();

    var tblFruits = document.getElementById("sample_5");

    var chks = tblFruits.getElementsByTagName("INPUT");

    for (var i = 0; i < chks.length; i++) 
    {
        if (chks[i].checked) 
        {
            selected.push(chks[i].value);
        }
    }

    if (selected.length > 0) 
    {
        var all_id = ""+selected+"";
        var ids = all_id.replace(/,/g, '-');
        var url = BASE_URL +"/admin/Enquery/delete_compose_lists/"+ids;
        var dataString = "id="+all_id;

        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            dataType:"JSON",
            success: function(data)
            {
                if(data.status=='1')
                {
                    openModel('Delete successfully done');
                    location.reload();
                }
                else
                {
                    openModel('Somthing went wrong');  
                    location.reload(); 
                }
            }
        });

    }
}

//==================================================Admin Category=========================================//

$(document).on('keyup', '#product_category', function (e) {

    var name = $('#product_category').val();
    var url = BASE_URL+'/admin/Category/get_details';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {name: name},
        cache: false,
        success: function(result) 
        {
            if(result.status == 0)
            {
                openModel('This generated slug already exists');
                $('#add_category').prop('disabled', true);
                $('#product_category').val(''); 
                return false;
            }
            else
            {
                var slug = result.slug;
                $('#slug').val(slug); 
                $('#add_category').prop('disabled', false);
                return true;
            }                   
        }
    });
});

//==============================================Admin Product==============================================//

$(document).on('change', '#product_name', function (e) {

    var product_name = $('#product_name').val();
    var url = BASE_URL+'/admin/Product/get_details';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {product_name: product_name},
        cache: false,
        success: function(result) 
        {
            if(result.status == 0)
            {
                openModel('This generated slug already exists');
                $('#add_product').prop('disabled', true);
                $('#slug').val(''); 
                return false;
            }
            else
            {
                var slug = result.slug;
                $('#slug').val(slug); 
                $('#add_product').prop('disabled', false);
                return true;
            }                 
        }
    });
});

$(document).on('change', '#sku_code', function (e) {
    
    var sku_code = $('#sku_code').val();
    var url = BASE_URL+'/admin/Product/get_sku';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {sku_code: sku_code},
        cache: false,
        success: function(result) 
        {
            if(result.status == 0)
            {
                openModel('This SKU code alredy exists');

                $('#sku_code').val(''); 

                return false;
            }
            else
            {
                return true;
            }                   
        }
    });
});

$(document).on('click', '#product_filter', function (e) {

    var product_category = $('#product_cat').val();
    var product_name     = $('#productname').val();
    var selling_price    = $('#selling_price').val();

    var url = BASE_URL+'/admin/Product/apply_filter';        
    
    $.ajax({
        type: "GET",
        url: url,
        data: {product_category: product_category, product_name: product_name, selling_price: selling_price},
        cache: false,
        success: function(result) 
        {
            if(result)
            {
                $('#Ajax_Filter').html(result); 

                window.history.replaceState({foo: 'bar'}, '', BASE_URL+"/admin/Product/product_lists?category="+product_category+"&product_name="+product_name+"&selling_price="+selling_price);
                
                return true;
            }
            else
            {
                openModel("No Product Found");

                return false;
            }  
        }
    });
});

function update_best_selling(id)
{
    var best_selling = $('#best_selling').val();
    var product_id   = id;

    var url = BASE_URL+'/admin/Product/update_best_selling';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {best_selling: best_selling, product_id:product_id},
        cache: false,
        success: function(result) 
        {
            if(result == 1)
            {
                location.reload();

                return true;
            } 
            else
            {
                return false;
            }                  
        }
    });
}

function update_popular(id)
{
    var is_popular = $('#is_popular').val();
    var product_id   = id;

    var url = BASE_URL+'/admin/Product/update_popular';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {is_popular: is_popular, product_id:product_id},
        cache: false,
        success: function(result) 
        {
            if(result == 1)
            {
                location.reload();

                return true;
            } 
            else
            {
                return false;
            }                  
        }
    });
}

//=========================================Content Management==============================================//

$(document).on('keyup', '#page_title', function (e) {

    var page_title = $('#page_title').val();
    var url = BASE_URL+'/admin/Cms/get_details';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {page_title: page_title},
        cache: false,
        success: function(result) 
        {
            if(result.status == 0)
            {
                openModel('This generated slug already exists');
                $('#add_page').prop('disabled', true);
                $('#page_title').val(''); 
                return false;
            }
            else
            {
                var slug = result.slug;
                $('#page_slug').val(slug); 
                $('#add_page').prop('disabled', false);

                return true;
            }                   
        }
    });
});

//=========================================Banner Management===============================================//

$(document).on('change', '#banner_page', function (e) {

    var page_id = $('#banner_page').val();
    var url = BASE_URL+'/admin/Banner/check_exists';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {page_id: page_id},
        success: function(result) 
        {
            if(result == 1)
            {
                openModel('Banner already added for this page');

                $('#banner_page').val('');

                return false;
            } 
            else
            {
                return true;
            }                  
        }
    });
});

//==========================================Menu Management===============================================//

$(document).on('change', '#redirection_type', function (e) {
    
    var value = $('#redirection_type').val();

    if(value == 1)
    {
        $('#page_slug').show();
        $('#redirection_link').hide();
        $('#m_slug').prop('required', true);
        $('#m_url').prop('required', false);
    }
    else
    {
        $('#redirection_link').show();
        $('#page_slug').hide();
        $('#m_url').prop('required', true);
        $('#m_slug').prop('required', false);
    }
});