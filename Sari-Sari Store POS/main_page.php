<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
     <!-- Bootsrap -->
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.css">
    <script src="CSS/bootstrap/js/bootstrap.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/main_page.css">
</head>

<body>
    <?php include_once 'page_header.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 row_col">
                <div class="search_bar mb-2">
                    <input type="text" id="inp_search" class="form-control" placeholder="Search here..." onchange="search_null();">
                    <button class="btn btn-sm btn-success" id="btn_search">&#128269; Search</button>
                </div>
                <div id="products">
                    <table class="table table-hover table-striped">
                        <thead class="text-light bg-dark">
                            <tr>
                                <th>Description</th>
                                <th>Unit/Size</th>
                                <th>Price</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody id="prod_display">
                                <!-- displaying product here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4 row_col">
                <div class="ordering mb-2">
                    <button class="btn btn-sm btn-success" id="btn_add" data-bs-toggle="modal" data-bs-target="#ordering_modal">&plus; Add to Order</button>
                </div>
                <div class="order_summary">
                    <table class="table">
                        <thead class="text-light bg-dark">
                            <tr>
                                <th>Dscrptn</th>
                                <th>Unt/Sz</th>
                                <th>&#8369;</th>
                                <th>Ctgry</th>
                            </tr>
                        </thead>
                        <tbody id="order_display">
                                <!-- displaying product here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL for ordering -->
    <div class="modal fade" id="ordering_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <h3 class="text-center">Edit or Delete Product</h3>
                <table class="table table-borderless table-hover modal_table">
                    <tr>
                        <td>Description</td>
                        <td><input type="text" class="form-control crud_input order_name" id="order_name" readonly></td>
                    </tr>
                    <tr>
                        <td>Unit / Size</td>
                        <td><input type="text" class="form-control crud_input order_unit_size" id="order_unit_size" readonly></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="number" class="form-control crud_input order_price" id="order_price" readonly></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td class="qnty">
                            <input type="number" class="form-control crud_input order_qnty" id="order_qnty">
                            <button id="add_qnty" class="btn btn-sm btn-success btn_qnty">+</button>
                            <button id="minus_qnty" class="btn btn-sm btn-danger btn_qnty">-</button>
                        </td>
                    </tr>
                    
                </table>

                    <div class="modal_btn">
                        <button class="btn btn-md btn-success" id="add_now">Add Now!</button>
                        <button class="btn btn-md btn-warning" id="cancel" data-bs-toggle="modal" data-bs-target="#ordering_modal">Cancel</button>
                    </div>                     
                </div>
             </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="backend/JS/main.js"></script>
</body>

</html>