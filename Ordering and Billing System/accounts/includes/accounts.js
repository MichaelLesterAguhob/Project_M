
var stat = 0;
$(document).on('click', '#btnAdmin', function()
{
    if(stat == 0)
    {
        $('#asc').css('display', 'table-row');
        stat = 1
    }
   else if(stat == 1)
    {
        $('#asc').css('display', 'none');
        stat = 0
    }
})

//showing and hidingf password in input field
var pass = 0;
$(document).on('click', '#showPass', function()
{
    if(pass == 0)
    {
        $('#password').attr('type', 'text');
        pass = 1
    }
   else if(pass == 1)
    {
        $('#password').attr('type', 'password');
        pass = 0
    }
})
