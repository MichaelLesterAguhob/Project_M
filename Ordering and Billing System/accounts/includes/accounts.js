
var stat = 0;
$(document).on('click', '#btnAdmin', function () {
    if (stat == 0) {
        $('#asc').css('display', 'table-row');
        stat = 1
    }
    else if (stat == 1) {
        $('#asc').css('display', 'none');
        stat = 0
    }
})

//showing and hidingf password in input field
var pass = 0;
$(document).on('click', '#showPass', function () {
    if (pass == 0) {
        $('#password').attr('type', 'text');
        pass = 1
    }
    else if (pass == 1) {
        $('#password').attr('type', 'password');
        pass = 0
    }
})

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
                url: 'accounts/createNewAccount.php',
                method: 'post',
                data: { username: username, password: password, secCode: secCode },
                success: function (data) 
                {
                    $('#msg').html(data).fadeIn(500).fadeOut(2000);
                    $('#username').val("");
                    $('#password').val("");
                }
            })       
    }
    else if (username != "" && password != "" && secCode == 2326) {
        $.ajax(
            {
                url: 'accounts/createNewAccount.php',
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