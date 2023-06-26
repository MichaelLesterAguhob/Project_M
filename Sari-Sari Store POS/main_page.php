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
                <p id="msg2" class="text-success" style="display: none;"></p>
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
                    <button class="btn btn-sm btn-success ordering_btn" id="btn_add">&plus; Add to Order</button>
                    <button class="btn btn-sm btn-success ordering_btn" id="btn_place_order">&plus;Place Order</button>
                    <button class="btn btn-sm btn-danger ordering_btn" id="btn_cancel_order" >&cross; Cancel Order</button>  
                </div>
                <p id="msg" class="text-success" style="display: none;"></p>
                <div class="order_summary">
                    <table class="table table-striped table-hover">
                        <thead class="text-light bg-dark">
                            <tr>
                                <th>Dscrptn</th>
                                <th>Size</th>
                                <th>&#8369;</th>
                                <th>Qnty</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody id="order_display">
                                <!-- displaying product here -->
                        </tbody>
                    </table>
                </div> 
                <div id="temp_order_btn">
                    <button class="btn close_temp_order_btn btn-sm btn-warning m-2">X</button>
                    <label>Qnty:</label>
                    <button onclick="edit_temp_order_qnty('add');" class="btn btn-sm btn-success btn_temp_order"> + </button>
                    <button onclick="edit_temp_order_qnty('sub');" class="btn btn-sm btn-danger btn_temp_order"> - </button>
                    <button id="delete_temp_order" class="btn btn-sm btn-danger btn_temp_order" onclick="delete_temp_order('single-item');"> Delete </button>
                </div>
                <div class="total_order">
                   &#8369; <input type="text" id="total_order" class="form-control" value="0" readonly>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL for ordering -->
    <div class="modal fade" id="ordering_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <h3 class="text-center">Add Order(s)</h3>
                <input type="hidden" id="prod_id">
                <input type="text" id="order_id">
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
                            <input type="number" class="form-control crud_input order_qnty" id="order_qnty" value="1">
                            <button id="add_qnty" class="btn btn-sm btn-success btn_qnty">+</button>
                            <button id="minus_qnty" class="btn btn-sm btn-danger btn_qnty">-</button>
                        </td>
                    </tr>
                    <tr>
                        <td>SubTotal</td>
                        <td><input type="number" class="form-control crud_input order_sub_total" id="order_sub_total" readonly></td>
                    </tr>
                </table>

                    <div class="modal_btn">
                        <button class="btn btn-md btn-success" id="add_now" onclick="add_order();">Add Now!</button>
                        <button class="btn btn-md btn-warning" id="cancel" data-bs-toggle="modal" data-bs-target="#ordering_modal">Cancel</button>
                    </div>                     
                </div>
             </div>
        </div>
    </div>

    <!-- MODAL for ordering -->
    <div class="modal fade" id="confirm_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center mb-4">Cancel Order(s)?</h3>
                    <div class="modal_btn">
                        <button class="btn btn-md btn-danger" onclick="delete_temp_order('all-items');" data-bs-toggle="modal" data-bs-target="#confirm_modal">Cancel Now!</button>
                        <button class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#confirm_modal">NO</button>
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