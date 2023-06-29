
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>

        <!-- Bootsrap -->   
        <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.css">
        <script src="CSS/bootstrap/js/bootstrap.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="CSS/product.css">
    </head>
    <body>
    <?php include_once 'page_header.php'; ?>
    
    <div class="container-fluid mb-5">
        <h1 class="header_1 text-center">Products</h1>

        <div class="row">
            <div class="col-lg-4 row_col" id="crud">
                <h4 class="text-center">Add Products</h4>
                <table class="table table-borderless table-hover">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" class="form-control crud_input prod_name" id="prod_name" placeholder="ex. nescafe"></input></td>
                    </tr>
                    <tr>
                        <td>Unit / Size</td>
                        <td><input type="text" class="form-control crud_input prod_unit_size" id="prod_unit_size" placeholder="ex. 150g / Big / None"></input></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="number" class="form-control crud_input prod_price" id="prod_price" placeholder="&#8369; 000"></input></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><input type="text" class="form-control crud_input prod_cat" id="prod_cat" placeholder="Drinks, Noodles, Can"></input></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <select id="select_cat" onchange="catSelected();">
                            <!-- load category  -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="crud_td_btn" style="padding-top: 50px;">
                            <button class="btn btn-md btn-success" id="add_prod">Add Now</button>
                            <button class="btn btn-md btn-warning" id="cancel" onclick="clearAddingFields();">Cancel</button>
                        </td>
                    </tr>   
                </table>
                <p id="msg" class="text-center text-success"></p>
            </div>
            <div class="col-lg-8 row_col" id="prod_display">
                <div class="search_bar">
                    <input type="text" id="inp_search" class="form-control" placeholder="Search here..." onchange="search_null();">
                    <button class="btn btn-sm btn-success" id="btn_search">&#128269; Search</button>
                </div>
                <p id="msg2" class="text-center text-success mt-1 mb-0"></p>
                <div id="products">
                    <table class="table bordered table-hover" id="prod_table">
                        <thead>
                            <tr>
                                <th class="prod_th pb-2">#</th>
                                <th class="prod_th pb-2">NAME</th>
                                <th class="prod_th pb-2">UNITS/SIZE</th>
                                <th class="prod_th pb-2">PRICE</th>
                                <th class="prod_th pb-2">CATEGORY</th>
                            </tr>
                        </thead>
                        <tbody id="load_prod">
                            <!-- load data from database here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="edit_delete">
        <button class="btn btn-sm btn-primary btn_edit_del" data-bs-toggle="modal" data-bs-target="#edit_del_modal">EDIT</button> <br>
        <button class="btn btn-sm btn-danger mt-2 btn_edit_del" data-bs-toggle="modal" data-bs-target="#edit_del_modal">DELETE</button>
    </div>

    <!-- MODAL for EDIT DELETE MODAL -->
    <div class="modal fade" id="edit_del_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <h3 class="text-center">Edit or Delete Product</h3>
                <table class="table table-borderless table-hover">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" class="form-control crud_input prod_name" id="edit_name" placeholder="ex. nescafe"></input></td>
                    </tr>
                    <tr>
                        <td>Unit / Size</td>
                        <td><input type="text" class="form-control crud_input prod_unit_size" id="edit_unit_size" placeholder="ex. 150g / Big / None"></input></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="number" class="form-control crud_input prod_price" id="edit_price" placeholder="&#8369; 000"></input></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><input type="text" class="form-control crud_input prod_cat" id="edit_cat" value="Unset" placeholder="Drinks, Noodles, Can"></input></td>
                    </tr>
                </table> 

                    <div class="modal_btn">
                        <button class="btn btn-md btn-success" id="save_changes">Save</button>
                        <button class="btn btn-md btn-warning" id="cancel" data-bs-toggle="modal" data-bs-target="#edit_del_modal">Cancel</button>
                        <button class="btn btn-md btn-danger" id="delete_prod">Delete</button>
                    </div>                     
                </div>
             </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="backend/JS/product.js"></script>

    </body>
    </html>