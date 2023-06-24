
// unit price input field event
$(document).on('click','#prod_unit_size', function()
{
    if($('#prod_unit_size').val() =="None")
    {
        $('#prod_unit_size').val('');
    }
});
$(document).on('focusout','#prod_unit_size', function()
{
    if($('#prod_unit_size').val() == "")
    {
        $('#prod_unit_size').val('None');
    }
});

// unit price input field event [modal]
$(document).on('click','#edit_unit_size', function()
{
    if($('#edit_unit_size').val() == "NONE")
    {
        $('#edit_unit_size').val('');
    }
});
$(document).on('focusout','#edit_unit_size', function()
{
   if($('#edit_unit_size').val() == "")
    {
        $('#edit_unit_size').val('NONE');
    }
});

// product category inout field event
$(document).on('click','#prod_cat', function()
{
    if($('#prod_cat').val() =="Unset")
    {
        $('#prod_cat').val('');
    }
});
$(document).on('focusout','#prod_cat', function()
{
    if($('#prod_cat').val() == "")
    {
        $('#prod_cat').val('Unset');
    }
});
// modal
$(document).on('click','#edit_cat', function()
{
    if($('#edit_cat').val() == "UNSET")
    {
        $('#edit_cat').val('');
    }
});
$(document).on('focusout','#edit_cat', function()
{
    if($('#edit_cat').val() == "")
    {
        $('#edit_cat').val('UNSET');
    }
});

// ADDING NEW PRODUCTS
$(document).on('click','#add_prod', function()
{
    let name = $('#prod_name').val();
    let unit_size = $('#prod_unit_size').val();
    let price = $('#prod_price').val();
    let cat = $('#prod_cat').val();
    if(name == "" || unit_size == "" || price == "" || cat == "")
    {
        alert('Fill in the blanks!');
    }
    else
    {
        $.ajax(
            {
                url:'backend/add_product.php',
                method:'post',
                data:{name:name, unit_size:unit_size, price:price, cat:cat},
                success:function(data)
                {
                    $('#msg').text(data).fadeIn(1000).fadeOut(2000);
                    clearAddingFields();
                    load_prod();
                    load_cat();
                    $('#inp_search').val("");
                }
            })
    }
})

function clearAddingFields()
{
    $('#prod_name').val('');
    $('#prod_unit_size').val('');
    $('#prod_price').val('');
    $('#prod_cat').val('');
    load_cat();
}

// LOADING PRODUCTS FROM DATABASE
load_prod();
function load_prod()
{
    $.ajax(
        {
            url:'backend/load_product.php',
            method:'post',
            success:function(data)
            {
                $('#load_prod').html(data);
            }
        })
}
// LOADING PRODUCTS CATEGORY FROM DATABASE
load_cat();
function load_cat()
{
    $.ajax(
        {
            url:'backend/load_cat.php',
            method:'post',
            success:function(data)
            {
                $('#select_cat').html(data);
            }
        })
}

//clicking on cat select
function catSelected()
{   
    let catSelected = $('#select_cat').val();
    if(catSelected != "Quick Select Category")
    {
        $('#prod_cat').val(catSelected);
    }
    else
    {
        $('#prod_cat').val('');
    }
}

//Event on Clicking on data
let data_id = 0;
$(document).on('click', '.t_row', function()
{
    $('.edit_delete').css('display','block');
    $('.t_row').css('background-color','transparent');
    $(this).css('background-color','blue');
    data_id = $(this).attr('data-id');
    
    $.ajax(
        {
            url:'backend/selected_prod.php',
                method:'post',
                data:{ID:data_id},
                success:function(data)
                {
                    data = $.parseJSON(data);
                    if(data.stat == "success")
                    {
                        $('#edit_name').val(data.name);
                        $('#edit_unit_size').val(data.unit_size);
                        $('#edit_price').val(data.price);
                        $('#edit_cat').val(data.cat);
                    }
                }
        })
})

// EDITING AND UPDATING PRODUCT INFO
$(document).on('click','#save_changes', function()
{
    let ID = data_id;
    let e_name = $('#edit_name').val();
    let e_unit_size = $('#edit_unit_size').val();
    let e_price = $('#edit_price').val();
    let e_cat = $('#edit_cat').val();
    if(e_name == "" || e_unit_size == "" || e_price == "" || e_cat == "")
    {
        alert('Fill in the blanks!');
    }
    else
    {
        $.ajax(
            {
                url:'backend/save_changes.php',
                method:'post',
                data:{ID:ID, name:e_name, unit_size:e_unit_size, price:e_price, cat:e_cat},
                success:function(data)
                {
                    $('#edit_name').val('');
                    $('#edit_unit_size').val('');
                    $('#edit_price').val('');
                    $('#edit_cat').val('');
                    $('#edit_del_modal').modal('toggle');
                    load_prod();
                    load_cat();
                    $('.edit_delete').css('display','none');
                    $('#msg2').text(data).fadeIn(1000).fadeOut(4000);
                }
            })
    }
})

// DELETING DATA
$(document).on('click','#delete_prod', function()
{
    let ID = data_id;
    $.ajax(
        {
            url:'backend/delete_prod.php',
            method:'post',
            data:{ID:ID},
            success:function(data)
            {
                $('#edit_name').val('');
                $('#edit_unit_size').val('');
                $('#edit_price').val('');
                $('#edit_cat').val('');
                $('#edit_del_modal').modal('toggle');
                load_prod();
                load_cat();
                $('.edit_delete').css('display','none');
                $('#msg2').text(data).fadeIn(1000).fadeOut(4000);
            }
        })
})

// enter key event on adding products
$(document).on('keyup','#prod_name', function(e)
{
    if(e.key === "Enter" || e.keycode === 13)
    {
        if($('#prod_name').val() == "")
        {
            $('#msg').text('No input. Fill in the product name').fadeIn(1000).fadeOut(4000);
        }
        else
        {
            $('#prod_unit_size').focus();
        }
    }
})
$(document).on('keyup','#prod_unit_size', function(e)
{
    if(e.key === "Enter" || e.keycode === 13)
    {
        if($('#prod_unit_size').val() == "")
        {
            $('#msg').text('No input. Fill in the product name').fadeIn(1000).fadeOut(4000);
        }
        else
        {
        $('#prod_price').focus();
        }
    }
})
$(document).on('keyup','#prod_price', function(e)
{
    if(e.key === "Enter" || e.keycode === 13)
    {
        if($('#prod_price').val() == "")
        {
            $('#msg').text('No input. Fill in the product name').fadeIn(1000).fadeOut(4000);
        }
        else
        {
        $('#prod_cat').focus();
        }
    }
})
$(document).on('keyup','#prod_cat', function(e)
{
    if(e.key === "Enter" || e.keycode === 13)
    {
        if($('#prod_cat').val() == "")
        {
            $('#msg').text('No input. Fill in the product name').fadeIn(1000).fadeOut(4000);
        }
        else
        {
        $('#add_prod').click();
        }
    }
})

// SEARCHING PRODUCTS
$(document).on('click','#btn_search', function()
{
    let search_input = $('#inp_search').val();
    if(search_input == "")
    {
        $('#msg2').html("No Input!").fadeIn(500).fadeOut(2000);
    }
    else
    {
        // $('#load_prod').html("");
        $.ajax(
            {
                url:'backend/search.php',
                method:'post',
                data:{search_input:search_input},
                success:function(data)
                {
                    data = $.parseJSON(data);
                    if(data.stat == "success")
                    {
                        $('#load_prod').html("");
                        $('#load_prod').html(data.html);
                    }
                    else
                    {
                        $('#load_prod').html(data.text);
                    }
                }
            })
    }
})

//IF SEARC BAR IS NULL
function search_null()
{
    if($('#inp_search').val() == "")
    {
        load_prod();
    }
}
$(document).on('keyup','#inp_search', function(e)
{
    if(e.key == "Enter" || e.keycode == 13)
    {
        $('#btn_search').click();
    }
})