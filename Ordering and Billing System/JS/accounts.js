
$(document).ready(function()
{   
    $('#username').focus();
    $('#uName').focus();
    // CREATE ACCOUNT KEY UP EVENTS
    $("#username").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            $('#password').focus();
        }
        else if (e.key === 'up' || e.keyCode === 40) {
            $('#password').focus();
        }
    });
    $("#password").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            $('#create').click();
        }
        else if (e.key === 'up' || e.keyCode === 38) {
            $('#username').focus();
        }
    });
    $("#sc").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            $('#create').click();
        }
        else if (e.key === 'up' || e.keyCode === 38) {
            $('#username').focus();
        }
    });

    // LOGIN KEY UP EVENTS
    $("#uName").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            $('#uPass').focus();
        }
        else if (e.key === 'up' || e.keyCode === 40) {
            $('#uPass').focus();
        }
    });
    $("#uPass").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            $('#login').click();
        }
        else if (e.key === 'up' || e.keyCode === 38) {
            $('#uName').focus();
        }
    });
});

// Showing Hiding sec code
var stat = 0;
$(document).on('click', '#btnAdmin', function () {
    if (stat == 0) {
        $('#asc').css('display', 'table-row');
        $('#sc').focus();
        stat = 1
    }
    else if (stat == 1) {
        $('#asc').css('display', 'none');
        stat = 0
    }
})

//showing and hiding password in input field
var pass = 0;
$(document).on('click', '#showPass', function () {
    if (pass == 0) {
        $('#password').attr('type', 'text');
        $('#uPass').attr('type', 'text');
        pass = 1
    }
    else if (pass == 1) {
        $('#password').attr('type', 'password');
        $('#uPass').attr('type', 'password');
        pass = 0
    }
})

//funtion to create account
function createAccount() {
    let username = $('#username').val();
    let password = $('#password').val();
    let secCode = $('#sc').val();

    if (username == "" || password == "") {
        $('#msg').html('No Input').fadeIn(500).fadeOut(2000);
    }
    else if (username != "" && password != "" && secCode == "") {
        $.ajax(
            {
                url: 'createNewAccount.php',
                method: 'post',
                data: { username: username, password: password, secCode: secCode },
                success: function (data) 
                {
                    $('#msg').html(data).fadeIn(500).fadeOut(2000);
                    $('#username').val("");
                    $('#password').val("");
                    setTimeout(function()
                    {
                        window.location.href = 'login.php';
                    },1500)
                }
            })       
    }
    else if (username != "" && password != "" && secCode == 2326) {
        $.ajax(
            {
                url: 'createNewAccount.php',
                method: 'post',
                data: { username: username, password: password, secCode: secCode },
                success: function (data) 
                {
                    $('#msg').html(data).fadeIn(500).fadeOut(2000);
                    $('#username').val("");
                    $('#password').val("");
                    $('#sc').val("");
                    $('#btnAdmin').click();
                }
            })
    }
    else {
        $('#msg').html('Incorrect Security Code!').fadeIn(500).fadeOut(2000);
    }
}

// funtion to login account
function login() 
{
    let username = $('#uName').val();
    let password = $('#uPass').val();
    if(username == "" || password == "")
    {
        $('#msg').html("No Input");
    }
    else
    {
        $.ajax(
            {
                url:'loginAccount.php',
                method:'post',
                data:{username:username, password:password},
                success:function(data)
                {
                    data = $.parseJSON(data);
                    if(data.status == 'success')
                    {
                        window.location.href = data.text;
                    }
                    else if(data.status == 'failed')
                    {
                        $('#msg').html(data.text);
                    }
                    else if(data.status == 'NoInput')
                    {
                        $('#msg').html(data.text);
                    }               
                }
            })
    }
}

