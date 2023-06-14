
loadSold();
function loadSold()
{
    $.ajax(
        {
            url:'loadSold.php',
            method:'post',
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.status == 'success')
                {
                    $('#display_sold').html(data.html);
                }
                else if(data.status =='failed')
                {
                    alert(data.text);
                }
            }
        });
}