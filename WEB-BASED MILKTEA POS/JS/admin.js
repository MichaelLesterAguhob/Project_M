
loadToConfirmAccounts();

//loading all sold milkteas
function loadSold()
{
    $('#btn_sold').css('background-color','green');
    $('#btn_accounts').css('background-color','blueviolet');
    $('#btn_confirm_accounts').css('background-color','blueviolet');
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
    if($( window ).width() <= 550)
    {
        $('#side_bar_toggler').click();
    }
}

//loading all accounts records
function loadUserAccounts()
{
    $('#btn_sold').css('background-color','blueviolet');
    $('#btn_accounts').css('background-color','green');
    $('#btn_confirm_accounts').css('background-color','blueviolet');
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
    if($( window ).width() <= 550)
    {
        $('#side_bar_toggler').click();
    }
}

// loading accounts to confirm
function loadToConfirmAccounts()
{
    $('#btn_sold').css('background-color','blueviolet');
    $('#btn_accounts').css('background-color','blueviolet');
    $('#btn_confirm_accounts').css('background-color','green');
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
    if($( window ).width() <= 550)
    {
        $('#side_bar_toggler').click();
    }
}

// to confirm accounts action button confirm
$(document).on('click','.confirm', function()
{
    let ID = $(this).attr('data-id');
    $.ajax(
        {
            url:'confirmAccount.php',
            method:'post',
            data:{ID:ID},
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.status == 'success')
                {
                    $('#messageModalText').text(data.text);
                    $('#messageModal').modal('toggle');
                    loadUserAccounts();
                    loadToConfirmAccounts();
                }
                else if(data.status == 'failed')
                {
                    $('#messageModalText').text(data.text);
                }
                
            }
        })
})

// to confirm accounts action button delete
$(document).on('click','.delete', function()
{
    let ID = $(this).attr('data-id');
    $.ajax(
        {
            url:'deleteAccount.php',
            method:'post',
            data:{ID:ID},
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.status == 'success')
                {
                    $('#messageModalText').text(data.text);
                    $('#messageModal').modal('toggle');
                    loadToConfirmAccounts();
                }
                else if(data.status == 'failed')
                {
                    $('#messageModalText').text(data.text);
                }
            }
        })
})


// see and unsee password
let stat = 0;
$(document).on('click','.btn_see', function()
{
    if(stat == 0)
    {
        let id = $(this).attr('data-id');
        $('#'+id).attr('type','text');
        stat = 1;
    
    }
    else
    {
        let id = $(this).attr('data-id');
        $('#'+id).attr('type','password');
        stat = 0;
    }
})

let stats = 0;
$('#side_bar_toggler').on('click', function()
{
    if(stats == 0)
    {
        $('#side_bar').css('display','inline-block');
        stats = 1;
        $('.gt').css('display', 'none');
        $('.lt').css('display', 'flex');
        
    }
    else
    {
        $('#side_bar').css('display','none');
        stats = 0;
        $('.lt').css('display', 'none');
        $('.gt').css('display', 'flex');
    }
})

window.addEventListener('resize', resizeFunction);

function resizeFunction()
{
    if($(window).width() >= 560)
    {
        stats = 1;
        $('#side_bar').css('display','inline-block');
    }
    else
    {
        $('#side_bar').css('display','none');
        stats = 0;
    }
}
