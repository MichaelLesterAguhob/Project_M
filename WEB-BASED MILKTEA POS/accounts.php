<?php
session_start();
$user = "";
$admin = "";

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

if($_SESSION['loggedin'] == 'admin')
{
    $user = '<div class="modal-line">
                <i class="fa-sharp fa-solid fa-lock"></i>
                <a href="admin.php">Admin</a>
            </div>';
    $admin = '<div class="item">
                <a href="admin.php">Admin</a>
             </div>';
}
else
{
    $user = "";
    $admin = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title> 

    <!-- LINKS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/account.css">
</head>

<body>

    <!-- Navigation Bar --> 
    <header>
        <div class="container-fluid">
            <div class="navb-logo">
                <img src="icons/logo.png" alt="Logo">
                <h2 style="display: inline-flex; color: white;">SWEET TEA BOBA</h2>
                <!-- <b style="font-siz4: 30px;">Sweet Tea Boba</b> -->
            </div>

            <div class="navb-items">

                <div class="item">
                    <a href="orderingPage.php">Home</a>
                </div>

                <?php echo $admin;?>

                <div class="item">
                    <a href="logout.php">Logout</a>
                </div>

                <div class="item">
                    <a href="accounts.php"><i class="fa-solid fa-user"></i></a>
                </div>

            </div>

            <!-- Button trigger modal -->
            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="navModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <img src="icons/logo.png" alt="Logo" class="modal-title fs-5">
                            <h2 style="display: inline-flex; color: white;">SWEET TEA BOBA</h2>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="modal-line">
                                <i class="fa-solid fa-shop"></i></i><a href="orderingPage.php">Home</a>
                            </div>

                            <?php echo $user;?>

                            <div class="modal-line">
                                <i class="fa-solid fa-user"></i><a href="accounts.php">Account</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-right-from-bracket"></i><a href="logout.php">logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <!-- MAIN CONTENT -->
    <div class="container mt-5 text-center">
        <h4><i class="far fa-question-circle"></i> You can click on your username or password to edit and update your Account Information.</h4>
        <hr>
        <button class="btn btn-lg btn-primary hs" onclick="loadAccount();"> Show Details</button>
        <table class="table mt-5">
                <tr>
                    <th class="acct_th">User ID: </th>
                    <td class="acct_td"><input type="text" id="user_id" class=" acct_info" disabled></td>
                </tr>
                <tr>
                    <th class="acct_th">Username: </th> 
                    <td class="acct_td"><input type="text" id="my_username" class="form-control acct_info" ></td>
                </tr>
                <tr>
                    <th class="acct_th">Password: </th>
                    <td class="acct_td"><input type="password" id="my_password" class="form-control acct_info" ></td>
                </tr>
                <tr>
                    <th class="acct_th"></th>
                    <td class="acct_td" id="acct_td">
                        <button class="btn btn-lg btn-success update" onclick="updateAccount();">Update!</button>
                        <button class="btn btn-lg btn-warning cancel" onclick="loadAccount();">Cancel</button>
                    </td>
                </tr>
            
        
        </table>
    </div>


    <!-- MESSAGE MODAL -->
    <div class="modal fade" id="messageModal">
        <div class="modal-dialog text-center " id="messageModalDialog">

            <div class="modal-content" id="messageModalContent">

                <div class="modal-body" id="messageModalBody">

                    <h3 class="text-light" id="messageModalText">
                    </h3>

                </div>

                <div class="modal-footer" id="msgModalFooter">
                    <button class="btn btn-lg btn-success" data-bs-dismiss="modal">OKAY</button>
                </div>

            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="JS/accounts.js"></script>

</body>

</html>