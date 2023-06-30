
// var today = new Date();
// var dd = String(today.getDate()).padStart(2, '0');
// var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
// var yyyy = today.getFullYear();

// today = yyyy + '-' + mm + '-' + dd;
// $('.inpt_date').val(today);


load_sales();
function load_sales()
{
    $.ajax(
        {
            url:'backend/load_sales.php',
            method:'post',
            success:function(data)
            {
                data = $.parseJSON(data);
                if(data.stat = "success")
                {
                    $('#sales_display').html('');
                    $('#sales_total').val('');
                    $('#sales_display').html(data.html);
                    $('#sales_total').val(data.total_sales);
                }
            }
        })  
} 

$(document).on('click','#btn_search',function()
{
    search_sales_record();
})

function search_sales_record()
{
    let search_sales = $('#inp_search').val();
    let date1 = $('#inpt_date1').val();
    let date2 = $('#inpt_date2').val();
    let date_type_search = "";

    if(search_sales == "" && date1 == "" && date2 == "")
    {
        load_sales();
        $('#msg').html("No input!").fadeIn(500).fadeOut(2000);
    }
    else if(search_sales != "")
    {
        $('#inpt_date1').val('');
        $('#inpt_date2').val('');
        $.ajax(
        {
            url:'backend/search_in_sales.php',
            method:'post',
            data:{search_sales:search_sales, date1:date1, date2:date2},
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.stat = "success")
                {
                    $('#sales_display').html('');
                    $('#sales_total').val('');
                    $('#sales_display').html(data.html);
                    $('#sales_total').val(data.total_sales);
                }
            }
        })
    }
    else if(search_sales == "" && date1 != "" && date2 == "")
    {
        date_type_search = "date";
        $.ajax(
        {
            url:'backend/search_in_sales_date.php',
            method:'post',
            data:{date_type_search:date_type_search, date1:date1, date2:date2},
            success: function(data)
            {  
                data = $.parseJSON(data);
                if(data.stat = "success")
                {
                    $('#sales_display').html('');
                    $('#sales_total').val('');
                    $('#sales_display').html(data.html);
                    $('#sales_total').val(data.total_sales);
                }
            }
        })
    }
    else if(search_sales == "" && date1 != "" && date2 != "")
    {
        date_type_search = "date_range";
        $.ajax(
        {
            url:'backend/search_in_sales_date.php',
            method:'post',
            data:{date_type_search:date_type_search, date1:date1, date2:date2},
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.stat = "success")
                {
                    $('#sales_display').html('');
                    $('#sales_total').val('');
                    $('#sales_display').html(data.html);
                    $('#sales_total').val(data.total_sales);
                }
            }
        })
    }

    
}