
loadToConfirmAccounts();
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
                    $('#accounts').css('display','none');
                    $('#confirm_accounts').css('display','none');

                    $('#sold').css('display','block');
                    $('#display_sold').html(data.html).fadeIn(5000);
                }
                else if(data.status =='failed')
                {
                    alert(data.text);
                }
            }
        });
}

function loadUserAccounts()
{
    $.ajax(
        {
            url:'loadUserAccounts.php',
            method:'post',
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.status == 'success')
                {
                    $('#sold').css('display','none');
                    $('#confirm_accounts').css('display','none');

                    $('#accounts').css('display','block');
                    $('#display_user_accounts').html(data.html).fadeIn(5000);
                }
                else if(data.status =='failed')
                {
                    alert(data.text);
                }
            }
        });
}

function loadToConfirmAccounts()
{
    $.ajax(
        {
            url:'ToConfirmAccounts.php',
            method:'post',
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.status == 'success')
                {
                    $('#sold').css('display','none');
                    $('#accounts').css('display','none');

                    $('#confirm_accounts').css('display','block');
                    $('#display_to_confirm_accounts').html(data.html).fadeIn(5000);
                }
                else if(data.status =='failed')
                {
                    alert(data.text);
                }
            }
        });
}