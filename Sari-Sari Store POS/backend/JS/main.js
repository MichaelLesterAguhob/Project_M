
load_prod();
function load_prod()
{
    $.ajax(
        {
            url:'backend/prod_display.php',
            method:'post',
            success:function(data)
            {
                $('#prod_display').html(data);
            }
        })
}

//Event on Clicking on data
let data_id = 0;
$(document).on('click', '.t_row', function()
{
    $('.t_row').css('background-color','transparent');
    $(this).css('background-color','lightgreen');
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
                        $('#prod_id').val(data_id);
                        $('#order_name').val(data.name);
                        $('#order_unit_size').val(data.unit_size);
                        $('#order_price').val(data.price);
                        $('#order_cat').val(data.cat);
                    }
                }
        })
})

$(document).on('dblclick', '.t_row', function()
{
    data_id = $(this).attr('data-id');
    $('#btn_add').click();
})

//add to orders
$(document).on('click','#btn_add', function()
{
    if($('#prod_id').val() == "")
    {
        alert('NO SELECTED ITEM!');
    }
    else
    {
        $('#ordering_modal').modal('toggle');
        let order_price = parseInt($('#order_price').val());
        let order_qnty = parseInt($('#order_qnty').val());
        let order_sub_total = order_price * order_qnty;
        $('#order_sub_total').val(order_sub_total);
    }
})

$(document).on('click','#add_qnty', function()
{
    add_minus(1);
    compute_sub_total();
})
$(document).on('click','#minus_qnty', function()
{
    add_minus(2);
    compute_sub_total();
})

function add_minus(action)
{
    let qnty = parseInt($('#order_qnty').val());
    if(action == 1)
    {
        qnty++;
        $('#order_qnty').val(qnty)
    }
    else
    {
        if(qnty <= 1)
        {
            $('#order_qnty').val('1')
        }
        else
        {
            qnty--;
            $('#order_qnty').val(qnty)
        }
    }
}

$(document).on('keyup','#inp_search', function(e)
{
    if(e.key == "Enter" || e.keycode == 13)
    {
        $('#btn_search').click();
    }
})

// SEARCHING PRODUCTS
$(document).on('click','#btn_search', function()
{
    let search_input = $('#inp_search').val();
    if(search_input == "")
    {
        $('#msg2').css('display','block');
        $('#msg2').html("No Input!").fadeIn(100).fadeOut(1000);
    }
    else
    {
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
                        $('#prod_display').html("");
                        $('#prod_display').html(data.html);
                    }
                    else
                    {
                        $('#prod_display').html(data.text);
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

//LOADING ORDER ID
load_order_id();
function load_order_id()
{
    $.ajax(
        {
            url:'backend/load_order_id.php',
            method:'post',
            success:function(data)
            {
                $('#order_id').val(data);

            }
        })
}

//LOADING TEMP ORDER FROM DATABASE
load_temp_orders();
function load_temp_orders()
{
    $.ajax(
        {
            url:'backend/load_temp_order.php',
            method:'post',
            success:function(data)
            {
                data = $.parseJSON(data);
                if(data.stat == 'success')
                {
                    $('#order_display').html(data.html);
                }
                else
                {
                    $('#order_display').html("");
                    $('#order_display').html(data.text);
                }
            }
        })
}

$(document).on('change','#order_qnty', function()
{
    compute_sub_total();
})

function compute_sub_total()
{
    let order_price = parseInt($('#order_price').val());
    let order_qnty = parseInt($('#order_qnty').val());
    let order_sub_total = order_price * order_qnty;
    $('#order_sub_total').val(order_sub_total);
}

//ADDING ORDERS
function add_order()
{   
    let order_id = parseInt($('#order_id').val());
    let order_name = $('#order_name').val();
    let order_unit_size = $('#order_unit_size').val();
    let order_price = parseInt($('#order_price').val());
    let order_qnty = parseInt($('#order_qnty').val());

    let order_sub_total = parseInt($('#order_sub_total').val());

    if(order_qnty == "" || order_qnty == 0)
    {
        alert('Quantity must be 1 or more.');
    }
    else
    {
        $.ajax(
            {
                url:'backend/add_order.php',
                method:'post',
                data:{order_id:order_id, order_name:order_name, order_unit_size:order_unit_size, order_price:order_price, order_qnty:order_qnty, order_sub_total:order_sub_total},
                success:function(data)
                {
                    $('#msg').css('display','block');
                    $('#msg').html(data).fadeIn(500).fadeOut(5000);
                    load_temp_orders();
                    load_order_total();
                    $('#order_qnty').val("1")
                    $('#ordering_modal').modal('toggle');
                }
            })
    }
}

let temp_order_data_id = '';
$(document).on('click', '.temp_order_row', function()
{
    $('.temp_order_row').css('background-color','transparent');
    $(this).css('background-color','lightgreen');
    temp_order_data_id = $(this).attr('id');
    $('#temp_order_btn').css('display','inline-flex');
})
$(document).on('click', '.close_temp_order_btn', function()
{
    $('#temp_order_btn').css('display','none');
    temp_order_data_id = '';
    $('.temp_order_row').css('background-color','transparent');
})


function delete_temp_order(action)
{
    let to_delete = '';
    let item_to_delete = temp_order_data_id;
    if(action == "single-item")
    {
       to_delete = 'single';
    }
    else if(action == "all-items")
    {
        to_delete = 'all';
    }   
    else
    {
        alert('Unknown Problem Occured');
    }

    $.ajax(
        {
            url:'backend/delete_temp_order_single.php',
            method:'post',
            data:{ID:temp_order_data_id, to_delete:to_delete},
            success: function(data)
            {
                $('#msg').css('display','block');
                $('#msg').html(data).fadeIn(500).fadeOut(2000);
                load_temp_orders();
                $('.close_temp_order_btn').click();
                load_order_total();
            }
        })
}

$(document).on('click','#btn_cancel_order',function()
{
    $('#confirm_modal').modal('toggle');
})

load_order_total();
function load_order_total()
{
    $.ajax(
        {
            url:'backend/load_order_total.php',
            method:'post',
            success: function(data)
            {
                $('#total_order').val(data);
            }
        })
}