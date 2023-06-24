
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