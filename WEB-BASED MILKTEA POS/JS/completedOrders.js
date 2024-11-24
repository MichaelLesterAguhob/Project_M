
$(document).ready(function()
{
    viewCompletedOrders();
});

function viewCompletedOrders()
{
    $.ajax(
        {
            url:'viewCompletedOrders.php',
            method:'post',
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.status == 'success')
                {
                    $('#completedOrdersView').html(data.html);
                }
                else
                {
                    $('#completedOrdersView').html(data);
                }
            }
        });
}
