<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sweetea Boba</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- icon -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <!-- css -->
    <link rel="stylesheet" href="css/account.css">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">Login</h1>
        <div class="login text-center border">
            <table class="mt-3">
                <tr>
                    <th class="lbl p-3">Username</th>
                    <td class="tdInput">
                        <input id="uName" type="text" class="form-control" placeholder="Username">
                    </td>
                </tr>
                <tr>
                    <th class="lbl p-3">Password</th>
                    <td class="tdInput">
                        <input id="uPass" type="password" class="form-control" placeholder="Password">
                    </td>
                </tr>
                <tr>
                    <th class="lbl p-3" style="text-align: right;"><span class="text-muted" style="font-size:12px;">Show Password</span></th>
                    <td style="text-align: left;">
                        <button id="showPass" class="btn btn-primary btn-sm" style="font-size:12px; width:fit-content;"><i class="fa-solid fa-eye"></i></button>
                    </td>
                </tr>
                <tr>
                    <td id="btn" class="pt-5" colspan="2">
                        <button id="login" onclick="login();" class="btn btn-success">Login!</button>
                        <button class="btn btn-warning">Cancel</button>
                    </td>
                </tr>
            </table>
            <br>
            <span id="msg" class="text-warning"></span>
            <br>
            <a href="createAccount.php" id="create" class="btn mt-3 text-primary" style="width: 80%;">Create Account</a>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="JS/accounts.js"></script>

</body>

</html>