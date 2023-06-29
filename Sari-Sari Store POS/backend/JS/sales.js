load_sales();
function load_sales()
{
    $.ajax(
        {
            url:'backend/load_sales.php',
            method:'post',
            success:function(data)
            {
                $('#sales_display').html(data);
            }
        })  
} 