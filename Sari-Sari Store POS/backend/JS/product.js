
// unit price input field event
$(document).on('click','.prod_unit_size', function()
{
    if($('#prod_unit_size').val() =="NONE" && $('#edit_unit_size').val() != "NONE")
    {
        $('#prod_unit_size').val('');
    }
    else if($('#prod_unit_size').val() !="None" && $('#edit_unit_size').val() == "NONE")
    {
        $('#edit_unit_size').val('');
    }

});
$(document).on('focusout','.prod_unit_size', function()
{
    if($('#prod_unit_size').val() == "" && $('#edit_unit_size').val() != "")
    {
        $('#prod_unit_size').val('None');
    }
    else if($('#prod_unit_size').val() !="" && $('#edit_unit_size').val() == "")
    {
        $('#edit_unit_size').val('');
    }
});

// product category inout field event
$(document).on('click','.prod_cat', function()
{
    if($('#prod_cat').val() =="Unset" && $('#edit_cat').val() != "Unset")
    {
        $('#prod_cat').val('');
    }
    else if($('#prod_cat').val() !="Unset" && $('#edit_cat').val() == "Unset")
    {
        $('#edit_cat').val('');
    }
});
$(document).on('focusout','.prod_cat', function()
{
    if($('#prod_cat').val() == "" && $('#edit_cat').val() != "")
    {
        $('#prod_cat').val('Unset');
    }
    else if($('#prod_cat').val() !="" && $('#edit_cat').val() == "")
    {
        $('#edit_cat').val('');
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
                    $('#prod_name').val('');
                    $('#prod_unit_size').val('');
                    $('#prod_price').val('');
                    $('#prod_cat').val('');
                    load_prod();
                }
            })
    }
})

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
                    $('#msg2').text(data).fadeIn(1000).fadeOut(2000);
                    $('#edit_name').val('');
                    $('#edit_unit_size').val('');
                    $('#edit_price').val('');
                    $('#edit_cat').val('');
                    $('#edit_del_modal').modal('toggle');
                    load_prod();
                    $('.edit_delete').css('display','none');
                }
            })
    }
})

// DELETING DATA