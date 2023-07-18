var BASE_URL  = 'http://localhost/mridayaitservices/sheacreams';
var base_url  = window.location.origin;
var host      = window.location.host;
var pathArray = window.location.pathname.split('/');

//=============================================THEAME JS==============================================//

$(document).ready(function(){

    $('.brand-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });


    var $grid = $('.shortFilter').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            // use outer width of grid-sizer for columnWidth
            columnWidth: 0
        }
    });

    // filter items on button click
    $('.shortFilter-menu').on( 'click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

    // change is-checked class on buttons
    $('.shortFilter-menu').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.active').removeClass('active');
            $( this ).addClass('active');
        });
    }); 


    $('.quick-view').click(function(){
        var selectedImage = $(this).parent('.pro-img').children('img');
        var src = selectedImage.attr('src');

        // DYNAMIC QUICK PRODUCT VIEW IMG
        $('.quick_product_img').children('img').attr('src',src);

        // DYNAMIC QUICK PRODUCT VIEW NAME

        var pro_nm = $(this).parent().closest('.pro-box').children('.pro-dtls').children('.pro-nm').text();

        $('.quick_pro_nm').text(pro_nm);

        // DYNAMIC QUICK PRODUCT VIEW NAME

        var pro_pri = $(this).parent().closest('.pro-box').children('.pro-dtls').children('.pro-price').text();

        $('.quick_pro_pri').text(pro_pri);
    })


    $('.oth-pro-slider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    // PRODUCT ZOOM
    $('.pro_zoom').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        scrollZoom: true
    });

});


function increaseValue(id) 
{
    var value = parseInt(document.getElementById('cart_qty'+id).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('cart_qty'+id).value = value;
}

function decreaseValue(id) 
{
    var value = parseInt(document.getElementById('cart_qty'+id).value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('cart_qty'+id).value = value;
}

function increase_Value() 
{
    var value = parseInt(document.getElementById('qty').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('qty').value = value;
}

function decrease_Value() 
{
    var value = parseInt(document.getElementById('qty').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('qty').value = value;
}

$(document).ready(function(){

    $('.edit_pro_info').click(function(){

    $('.pro_info_form input').removeAttr('readonly')
    })

    $('.update_pro_info').click(function(){

    $('.pro_info_form input').attr('readonly', 'readonly')
    })

});

//=============================================================================================================//

function openModel(message)
{
    $('body #PopupMessages').html('');
    $('body #PopupMessages').append('<div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="ExampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"></div><div class="modal-body text-center text">'+message+'</div><div class="modal-footer"></div></div></div></div>');
    $('#MessageModal').modal({show:true});

    setTimeout(function() 
    {
        $('#MessageModal').modal('hide');
    }, 3000);
}

function login_alert()
{
    openModel("Please login your account to continue");

    return false;
}

function cartModal(message)
{
    $('body #PopupMessages').html('');
    $('body #PopupMessages').append('<div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="ExampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"></div><div class="modal-body text-center text">'+message+'</div><div class="modal-body text-center pt-0"><a href="cart" class="btn btn-success">GO TO BASKET</a></div><div class="modal-footer"></div></div></div></div>');
    $('#MessageModal').modal({show:true});

    setTimeout(function() 
    {
        $('#MessageModal').modal('hide');
    }, 3000);
}

$(document).ready(function()
{
    filter_data();

    function filter_data(sorting_value)
    {
        $('.filter_data').html('<div id="loading"></div>');
        //console.log($('#sorting_product').val());
        var sorting_value=sorting_value;
        //console.log(sorting_value);
        var sortingvalue =$('#sorting_product').val();
        
        if(sorting_value !=undefined)
        {
          var sortingId=sorting_value;
        }
        else
        {
          var sortingId=sortingvalue;
          //console.log(sortingId);
        }
        //console.log(sortingId);
        var tag = get_filter('tag');
        var url = BASE_URL+"/website/Ajax_Function/get_products";

        $.ajax({
            url:url,
            method:"POST",
            data:{tag:tag,sorting_value:sortingId},
            success:function(data)
            {
            	//console.log(data);
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function()
    {
        filter_data();
    });
    $(document).on('change', '#sorting_product', function (e) {
      var sorting_value = $('#sorting_product').val();
      //alert(sorting_value);
      filter_data(sorting_value);
    }); 
});

$(document).ready(function()
{
    FilterData();

    function FilterData(sorting_value)
    {
        $('.Filter-Data').html('<div id="loading"></div>');

        var sorting_value=sorting_value;
        //console.log(sorting_value);
        var sortingvalue =$('#sorting_by_skin_type').val();
        if(sorting_value !=undefined)
        {
          var sortingData=sorting_value;
        }
        else
        {
          var sortingData=sortingvalue;
        }
        //console.log(sortingData);
        var category = GetFilter('category');
        var url = BASE_URL+"/website/Ajax_Function/getproducts";

        $.ajax({
            url:url,
            method:"POST",
            data:{category:category,sortingData:sortingData},
            success:function(data)
            {
              $('.Filter-Data').html(data);
            }
        });
    }

    function GetFilter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.Common-Selector').click(function()
    {
        FilterData();
    });
    $(document).on('change', '#sorting_by_skin_type', function (e) {
      var sorting_value = $('#sorting_by_skin_type').val();
      //alert(sorting_value);
      FilterData(sorting_value);
    }); 
});

function add_to_cart(product_id)
{
    var url = BASE_URL+"/website/Ajax_Function/add_to_cart";

    if($('#qty').length > 0)
    {       
        var quantity = $('#qty').val();
    } 
    else
    {
        var quantity = 1;
    }

    $.ajax({
        url:url,
        method:"POST",
        data:{product_id:product_id, quantity:quantity},
        success:function(data)
        {
            if(data == 0)
            {
                openModel("Product already added to your basket");

                return false;
            }
            else
            {
                cartModal("Item added to basket");

                return true;
            }
        }
    });
}

function remove_cart(cart_id)
{
    var url = BASE_URL+"/website/Ajax_Function/remove_cart";

    $.ajax({
        url:url,
        method:"POST",
        data:{cart_id:cart_id},
        success:function(data)
        {
            if(data == 1)
            {
                location.reload();

                return true;
            }
            else
            {
                openModel("Something went wrong");

                return true;
            }
        }
    });
}

function update_cart(cart_id)
{
    var url = BASE_URL+"/website/Ajax_Function/update_cart";

    var cart_qty = $('#cart_qty'+cart_id).val();
    $.ajax({
        url:url,
        method:"POST",
        data:{cart_id:cart_id, cart_qty:cart_qty},
        success:function(data)
        {
            if(data == 1)
            {
                location.reload();

                return true;
            }
            else
            {
                openModel("Something went wrong");

                return false;
            }
        }
    });
}

function subscription()
{
    var email = $('#sub_email').val();

    if(email =='')
    {
        openModel("Please enter your email address");

        return false;
    }
    else
    {
        var url = BASE_URL+"/website/Ajax_Function/subscription";

        $.ajax({
            url:url,
            method:"POST",
            data:{email:email},
            success:function(data)
            {
                if(data == 0)
                {
                    openModel("You have already subscribed");

                    return false;
                }
                else if(data == 2)
                {
                    openModel("Something went wrong");

                    return false;
                }
                else
                {
                    openModel("Subscription successfully done");

                    return true;
                }
            }
        });
    }
}

function know_your_skin()
{
    var skin_type    = $('#skin_type').val();
    var skin_concern = $('#skin_concern').val();
    var message      = $('#message').val();
    var name         = $('#name').val();
    var mobile       = $('#mobile').val();
    var email        = $('#email').val();
    var address      = $('#address').val();
    var data_for     = $('#data_for').val();

    var url = BASE_URL+"/website/Ajax_Function/know_your_skin";

    $.ajax({
        url:url,
        method:"POST",
        data:{skin_type:skin_type,skin_concern:skin_concern,message:message,name:name,mobile:mobile,email:email,address:address,data_for:data_for},
        success:function(data)
        {
            if(data == 0)
            {
                openModel("Something went wrong");

                return false;
            }            
            else
            {
                $('#skin_type').val('');
                $('#skin_concern').val('');
                $('#message').val('');
                $('#name').val('');
                $('#mobile').val('');
                $('#email').val('');
                $('#address').val('');

                $('#know_your_sking').modal('hide');

                openModel("Your query submit successfully done");

                return true;
            }
        }
    });
}

function free_sample()
{
    var skin_type    = $('#skintype').val();
    var skin_concern = $('#skinconcern').val();
    var message      = $('#messages').val();
    var name         = $('#names').val();
    var mobile       = $('#mobiles').val();
    var email        = $('#emails').val();
    var address      = $('#addresss').val();
    var data_for     = $('#datafor').val();

    var url = BASE_URL+"/website/Ajax_Function/free_sample";

    $.ajax({
        url:url,
        method:"POST",
        data:{skin_type:skin_type,skin_concern:skin_concern,message:message,name:name,mobile:mobile,email:email,address:address,data_for:data_for},
        success:function(data)
        {
            if(data == 0)
            {
                openModel("Something went wrong");

                return false;
            }            
            else
            {
                $('#skintype').val('');
                $('#skinconcern').val('');
                $('#messages').val('');
                $('#names').val('');
                $('#mobiles').val('');
                $('#emails').val('');
                $('#addresss').val('');

                openModel("Your query submit successfully done");

                return true;
            }
        }
    });
}

function register_email_validate(email)
{
    var url = BASE_URL+"/website/Ajax_Function/register_email_validate";

    $.ajax({
        url:url,
        method:"POST",
        data:{email:email},
        success:function(data)
        {
            if(data == 1)
            {
                $('#email_alert').text('');

                return true;
            }
            else
            {
                $('#email').val('');

                $('#email_alert').css('color', 'red');
                $('#email_alert').css('font-weight', '600');

                $('#email_alert').text('Email address already exists');

                return false;
            }
        }
    });
}

function register_mobile_validate(mobile)
{
    var url = BASE_URL+"/website/Ajax_Function/register_mobile_validate";

    $.ajax({
        url:url,
        method:"POST",
        data:{mobile:mobile},
        success:function(data)
        {
            if(data == 1)
            {
                $('#mobile_alert').text('');

                return true;
            }
            else
            {
                $('#mobile').val('');

                $('#mobile_alert').css('color', 'red');
                $('#mobile_alert').css('font-weight', '600');

                $('#mobile_alert').text('Mobile number already exists');

                return false;
            }
        }
    });
}

function profile_email_validate(email)
{
    var url = BASE_URL+"/website/Ajax_Function/register_email_validate";

    $.ajax({
        url:url,
        method:"POST",
        data:{email:email},
        success:function(data)
        {
            if(data == 1)
            {
                $('#emailalert').text('');

                return true;
            }
            else
            {
                $('#emails').val('');

                $('#emailalert').css('color', 'red');
                $('#emailalert').css('font-weight', '600');

                $('#emailalert').text('Email address already exists');

                return false;
            }
        }
    });
}

function profile_mobile_validate(mobile)
{
    var url = BASE_URL+"/website/Ajax_Function/register_mobile_validate";

    $.ajax({
        url:url,
        method:"POST",
        data:{mobile:mobile},
        success:function(data)
        {
            if(data == 1)
            {
                $('#mobilealert').text('');

                return true;
            }
            else
            {
                $('#mobiles').val('');

                $('#mobilealert').css('color', 'red');
                $('#mobilealert').css('font-weight', '600');

                $('#mobilealert').text('Mobile number already exists');

                return false;
            }
        }
    });
}

function validate_register()
{
    var password  = $('#password').val();
    var cpassword = $('#c_password').val();

    if(password =='' && cpassword =='')
    {
        $('#password_alert').css('color', 'red');
        $('#password_alert').css('font-weight', '600');
        $('#password_alert').text('This field is required');

        $('#cpassword_alert').css('color', 'red');
        $('#cpassword_alert').css('font-weight', '600');
        $('#cpassword_alert').text('This field is required');
    }
    else if(password =='')
    {
        $('#password_alert').css('color', 'red');
        $('#password_alert').css('font-weight', '600');
        $('#password_alert').text('This field is required');
    }
    else if(cpassword =='')
    {
        $('#cpassword_alert').css('color', 'red');
        $('#cpassword_alert').css('font-weight', '600');
        $('#cpassword_alert').text('This field is required');
    }
    else
    {
        if(cpassword == password)
        {
            $('#password_alert').text('');
            $('#cpassword_alert').text('');

            return true;
        }
        else
        {
            $('#c_password').val('');

            $('#cpassword_alert').css('color', 'red');
            $('#cpassword_alert').css('font-weight', '600');
            $('#cpassword_alert').text('Confirm password not matched');

            return false;
        }
    }
}

$(document).on('click', '#pass_btn', function (e) {

    var old_pass  = $('#old_pass').val();
    var new_pass  = $('#new_pass').val();
    var con_pass  = $('#con_pass').val();
    
    var url = BASE_URL+"/website/Ajax_Function/update_password";

    $.ajax({
        url:url,
        method:"POST",
        data:{old_pass:old_pass, new_pass:new_pass, con_pass:con_pass},
        success:function(data)
        {
            if(data == 0)
            {
                openModel('Something went wrong');

                return false;
            }
            else if(data == 1)
            {
                openModel('Password update successfully done');

                return true;
            }
            else if(data == 2)
            {
                $('#con_pass').val('');

                openModel('Confirm password not matched');

                return false;
            }
            else
            {
                $('#old_pass').val('');
                
                openModel('Old password does not match');

                return false;
            }
        }
    });    
});

$(document).on('change', '#blog_title', function (e) {

    var title = $('#blog_title').val();

    var url = BASE_URL+'/website/Ajax_Function/get_details';        
    
    $.ajax({
        type: "POST",
        url: url,
        data: {title: title},
        cache: false,
        success: function(result) 
        {
            if(result.status == 0)
            {
                openModel('This generated slug already exists');

                $('#blog_title').val(''); 

                return false;
            }
            else
            {
                var slug = result.slug;

                $('#slug').val(slug); 

                return true;
            }                   
        }
    });
});

//==================================PROFILE IMAGE PREVIEW================================//
var loadFile = function(event) {
  var output = document.getElementById('output');
  var default_image=document.getElementById('default_image');
  output.src = URL.createObjectURL(event.target.files[0]);
  if(output.src!="")
  {  
    output.onload = function() {
      $('#output').show();
      URL.revokeObjectURL(output.src) // free memory
    }
    $('#default_image').hide();
  }
  else
  {
    $('#default_image').show();
  }
};


//==================================PROFILE IMAGE PREVIEW================================//


