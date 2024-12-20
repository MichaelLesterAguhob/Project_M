
let sort = 'sold';
let order_by = 'DESC';
let sorted_by = 1;
load_prod();
$(document).on('click','#sort_by',function()
{
    if(sorted_by == 1)
    {
        sorted_by = 0;
        sort = 'name';
        order_by = 'ASC' 
        load_prod();
    }
    else
    {
        sorted_by = 1;
        sort = 'sold';
        order_by = 'DESC'
        load_prod();
    }
        
})

function load_prod()
{
    $.ajax(
        {
            url:'backend/prod_display.php', 
            method:'post',
            data:{sort_by:sort, order_by:order_by},
            success:function(data)
            {
                $('#prod_display').html(data);
            }
        })
}

//Event on Clicking on data
let data_id = 0;
$(document).on('dblclick', '.t_row', function()
{
    clear_old_order_data();
    data_id = $(this).attr('data-id');
    setTimeout(function()
    {
        $('#btn_add').click();
    },300)
    
})

//function on clicking or selecting an item
// get data from database, based on the prod id stored in data-id attribute
$(document).on('click', '.t_row', function()
{
    clear_old_order_data();
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
                    }
                }
        })
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

// function for quick adding quantity
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
//for clearing the previously selected item
function clear_old_order_data()
{
    $('#prod_id').val("");
    $('#order_name').val("");
    $('#order_unit_size').val("");
    $('#order_price').val(0);
    $('#order_qnty').val(1)
    $('#order_sub_total').val("")
}
//FINAL ADDING ORDERS, add order button inside the ordering modal
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
                    clear_old_order_data();
                    $('#ordering_modal').modal('toggle');
                }
            })
    }
}

//for searching
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

let temp_order_data_id = '';
$(document).on('click', '.temp_order_row', function()
{
    $('.temp_order_row').css('background-color','transparent');
    $(this).css('background-color','lightgreen');
    temp_order_data_id = $(this).attr('id');
    $('#temp_order_btn').css('display','inline-flex');
    get_temp_order_qnty();
})

let temp_order_qnty = '';
let temp_order_price = '';
function get_temp_order_qnty()
{
    $.ajax(
        {
            url:'backend/get_temp_order_qnty.php',
            method:'post',
            data:{ID:temp_order_data_id},
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.stat == "success")
                {
                    temp_order_qnty = data.qnty;
                    temp_order_price = data.price;
                }
                else
                {
                    alert(data.text);
                }
            }
        })
}

//TEMP ORDER PLUS MINUS BUTTON FUNCTION
function edit_temp_order_qnty(action)
{ 
    let new_qnty = temp_order_qnty;
    let new_sub_total = 0;
    
    if(action == "add")
    {
        temp_order_qnty++;
        new_qnty = temp_order_qnty;
        new_sub_total = new_qnty * temp_order_price;

        $.ajax(
            {
                url:'backend/edit_temp_order_qnty.php',
                method:'post',
                data:{ID:temp_order_data_id, new_qnty:new_qnty, new_sub_total:new_sub_total},
                success: function()
                {
                    load_temp_orders();
                    load_order_total();
                    get_temp_order_qnty();
                    
                }
            })
    }
    else if(action == "sub" && new_qnty > 1)
    {
            new_qnty = temp_order_qnty - 1;
            new_sub_total = new_qnty * temp_order_price;

            $.ajax(
                {
                    url:'backend/edit_temp_order_qnty.php',
                    method:'post',
                    data:{ID:temp_order_data_id, new_qnty:new_qnty, new_sub_total:new_sub_total},
                    success: function()
                    {
                        load_temp_orders();
                        load_order_total();
                        get_temp_order_qnty();
                    }
                })
    }  
}

// CLOSING TEMP ORDER BUTTON
$(document).on('click', '.close_temp_order_btn', function()
{
    $('#temp_order_btn').css('display','none');
    temp_order_data_id = '';
    $('.temp_order_row').css('background-color','transparent');
})

//FUNTION TO DELETE TEMPORARY ORDERS
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

    let total_order = $('#total_order').val();
    if( total_order == 0 || total_order == "")
    {
        $('#msg').css('display','block');
        $('#msg').html("No Orders yet!").fadeIn(500).fadeOut(5000);
    }
    else
    {
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
}

// SHOWING DELETE MODAL IF USER WANT TO CANCEL CURRENT ORDERS
$(document).on('click','#btn_cancel_order',function()
{
    $('#confirm_modal').modal('toggle');
})

// JUST LOADING THE TOTAL(SUM) OF SUBTOTAL IN TEMP ORDER TABLE IN THE DATABASE
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

$(document).on('click','.btn_place_order', function()
{
    $('#place_order_modal').modal('toggle');
})
$(document).on('click', '#place_order', function()
{
    place_orders();
})

//CODES FOR PLACING ORDERS
function place_orders()
{
    let order_id = $('#order_id').val();
    let amount_to_paid = $('#inpt_amount').val();
    let total_order = parseInt($('#total_order').val());

    if(amount_to_paid == "" || amount_to_paid == 0 || amount_to_paid < total_order)
    {
        $('#msg').css('display','block');
        $('#msg').html("No Input / Amount must be higher or equal to Total Orders!").fadeIn(500).fadeOut(5000);
    }
    else if(total_order <= 0)
    {
        $('#msg').css('display','block');
        $('#msg').html("No Orders yet.").fadeIn(500).fadeOut(5000);
    }
    else
    {
    $.ajax(
        {
            url:'backend/place_orders.php',
            method:'post',
            data:{payment:amount_to_paid, total:total_order, order_id:order_id},
            success: function(data)
            {
                $('#msg').css('display','block');
                $('#msg').html(data).fadeIn(500).fadeOut(5000);
                $('#inpt_amount').val("0");
                load_temp_orders();
                load_order_id();
                load_order_total();
            }
        })
    }
}