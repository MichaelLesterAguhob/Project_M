
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
    }
})

$(document).on('click','#add_qnty', function()
{
    add_minus(1);
})
$(document).on('click','#minus_qnty', function()
{
    add_minus(2);
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