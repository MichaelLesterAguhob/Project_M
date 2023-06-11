
<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Sweetea Boba</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="accounts/css/createAccount.css">
</head>
<body>
    
    <div class="container mt-5">
        <h1 class="text-center mb-5">Create Account</h1>

        <div class="login text-center border">
            <table class="mt-3">
                <tr>
                    <th class="lbl p-3">Username</th>
                 <td class="tdInput">
                    <input 
                    type="text" 
                    class="form-control" 
                    placeholder="Username"
                    style="border:  1px solid lightblue;  background-color: transparent; color: aliceblue;"
                    >
                </td>
                </tr>
                <tr >
                    <th class="lbl p-3">Password</th>
                    <td class="tdInput">
                        <input 
                        id="password"
                        type="password" 
                        class="form-control" 
                        placeholder="Password"
                        style="border: 1px solid lightblue;  background-color: transparent; color: aliceblue;"
                        >
                    </td>
                </tr>
                
                <tr id="asc" style="display:none;">
                    <th class="lbl p-3">Admin <br> Security Code</th>
                    <td class="tdInput">
                        <input 
                        type="password" 
                        class="form-control" 
                        placeholder="Enter Admin Security Code" 
                        style="border: 1px solid lightblue;  background-color: transparent; color: aliceblue;">
                    </td>
                </tr>  
                <tr >
                    <th class="lbl p-3" style="text-align: right;"><span class="text-muted" style="font-size:12px;">Show Password</span></th>
                    <td style="text-align: left;">
                       <button id="showPass" class="btn btn-primary btn-sm" style="font-size:12px; width:fit-content;"><i class="fa-solid fa-eye"></i></button>
                    </td>
                </tr>  
                <tr>
                    <td id="btn" class="pt-5" colspan="2" >
                        <button class="btn btn-success">Create!</button>
                        <button class="btn btn-warning">Cancel</button>
                    </td>
                </tr>    
            </table>

            <br>
            <button id="btnAdmin" class="btn mt-3 text-primary" style="width: 80%;">Create Admin Account</button>
        </div>
    </div>

            
     <!-- JAVASCRIPT -->
     <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="accounts/includes/accounts.js"></script>
   
</body>
</html>