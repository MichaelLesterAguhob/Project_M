<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>

    <!-- LINKS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="productPage/css/product.css">
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
    <script src="productPage/includes/productScript.js"></script>


</body>

</html>