 
function show_skills()
{
    $('.home_tab').css('display','none');
    $('.home_nav').removeClass('active');
    $('.projects_tab').css('display','none');
    $('.resume_tab').css('display','none');

    $('.skills_tab').css('display','block');

    if($(window).width() <= 991)
    {
        $('.nav_toggler').click();
    }
}

function show_projects()
{
    $('.home_tab').css('display','none');
    $('.home_nav').removeClass('active');
    $('.skills_tab').css('display','none');
    $('.resume_tab').css('display','none');

    $('.projects_tab').css('display','block');

    if($(window).width() <= 991)
    {
        $('.nav_toggler').click();
    }
}

function show_resume()
{
    $('.home_tab').css('display','none');
    $('.home_nav').removeClass('active');
    $('.skills_tab').css('display','none');
    $('.projects_tab').css('display','none');
    
    $('.resume_tab').css('display','block');

    if($(window).width() <= 991)
    {
        $('.nav_toggler').click();
    }
}

$(document).on('click','.sweeteaboba', function()
{
   window.open('Ordering and Billing System/orderingPage.php','_blank');
})