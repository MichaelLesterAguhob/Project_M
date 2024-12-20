<?php
session_start();
$user = "";
$admin = "";

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

if ($_SESSION['loggedin'] == 'admin') {
    $user = '<div class="modal-line">
                <i class="fa-sharp fa-solid fa-lock"></i>
                <a href="admin.php">Admin</a>
            </div>';
    $admin = '<div class="item">
                <a href="admin.php">Admin</a>
             </div>';
} else {
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
    <title>Admin Page</title>

    <!-- LINKS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/admin.css">
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

                <?php echo $admin; ?>

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
                            <h2 style="display: inline-flex; color: white;">SWEETEA BOBA</h2>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="modal-line">
                                <i class="fa-solid fa-shop"></i></i><a href="orderingPage.php">Home</a>
                            </div>

                            <?php echo $user; ?>

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
    <div class="container-fluid mt-2">
        <div class="row">
            <h3 class="text-light text-center admin_dashboard">Admin Dashboard</h3>
            
            <div class="col-4" id="side_bar">
                <div class="admin_menu">
                    <button class="btn btn-large btn-primary mt-3 admin_btn" id="btn_sold" onclick="loadSold();">View Sold</button>
                </div>
                <div class="admin_menu">
                    <button class="btn btn-large btn-primary mt-3 admin_btn" id="btn_accounts" onclick="loadUserAccounts();">User Accounts</button>
                </div>
                <div class="admin_menu">
                    <button class="btn btn-large btn-primary mt-3 admin_btn" id="btn_confirm_accounts" onclick="loadToConfirmAccounts();">To-Confirm Accounts</button>
                </div>
            </div>
            <div id="side_bar_toggler">
                <i class="fa-solid fa-less-than lt" style="display: none;"></i> <i class="fa-solid fa-greater-than gt"></i>
            </div>
            <div class="col-8" id="data_display">
                <div id="sold">
                    <caption><h5 class="mt-2">Sold Milkteas</h5></caption>
                    <table class="table table-hover table-bordered">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>Order#</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Qnty</th>
                                <th>AddOns</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody id="display_sold">
                            <!-- codes output here -->
                        </tbody>
                    </table>
                </div>
                <div id="accounts">
                    <caption><h5 class="mt-2">User Accounts</h5></caption>
                    <table class="table table-hover table-bordered">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody id="display_user_accounts">
                            <!-- codes output here -->
                        </tbody>
                    </table>
                </div>
                <div id="confirm_accounts">
                    <caption><h5 class="mt-2">Confirm Created Accounts</h5></caption>
                    <table class="table table-hover table-bordered">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Admin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="display_to_confirm_accounts">
                            <!-- codes output here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
    <script src="JS/admin.js"></script>


</body>

</html>