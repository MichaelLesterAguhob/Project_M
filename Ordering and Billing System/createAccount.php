
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Sweetea Boba</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- JAVASCRIPT -->
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- icon -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <!-- css -->
    <link rel="stylesheet" href="css/account.css">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">Create Account</h1>

        <div class="create text-center border">
            <table class="mt-3">
                <tr>
                    <th class="lbl p-3">Username</th>
                    <td class="tdInput">
                        <input type="text" id="username" class="form-control" placeholder="Username">
                    </td>
                </tr>
                <tr>
                    <th class="lbl p-3">Password</th>
                    <td class="tdInput">
                        <input type="password" id="password"  class="form-control" placeholder="Password">
                    </td>
                </tr>

                <tr id="asc" style="display:none;">
                    <th class="lbl p-3">Admin <br> Security Code</th>
                    <td class="tdInput">
                        <input  type="password" id="sc" class="form-control" placeholder="Enter Admin Security Code">
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
                        <button id="create" class="btn btn-success" onclick="createAccount();">Create!</button>
                        <button class="btn btn-warning">Cancel</button>
                    </td>
                </tr>
            </table>
            <br>
            <span id="msg" class="text-warning"></span>
            <br>
            <button id="btnAdmin" class="btn mt-3 text-primary" style="width: 80%;">Create Admin Account</button><br>
            <a href="login.php" id="btnAdmin" class="text-primary" style="width: 80%;">Login Account</a>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="JS/accounts.js"></script>

</body>

</html>