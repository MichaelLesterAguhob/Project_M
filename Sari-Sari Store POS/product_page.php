
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

    <div class="container-fluid">
        <h1 class="header_1 text-center">Products</h1>

        <div class="row">
            <div class="col-lg-4 row_col" id="crud">
                <h3 class="text-center">Add Products</h3>
                <table class="table table-borderless table-hover">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" class="form-control crud_input" id="prod_name"></input></td>
                    </tr>
                    <tr>
                        <td>Unit / Size</td>
                        <td><input type="text" class="form-control crud_input" id="prod_unit_size" placeholder="ex. 150g / Big"></input></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="number" class="form-control crud_input" id="prod_price" placeholder="&#8369; 000"></input></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><input type="text" class="form-control crud_input" id="prod_cat" value="Unset" placeholder="Drinks, Noodles, Can"></input></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="crud_td_btn" style="padding-top: 50px;">
                            <button class="btn btn-md btn-success" id="add_prod">Add Now</button>
                            <button class="btn btn-md btn-warning" id="cancel">Cancel</button>
                        </td>
                    </tr>
                </table>
                <p id="msg" class="text-center text-success"></p>
            </div>
            <div class="col-lg-8 row_col" id="prod_display">
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



    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="backend/JS/product.js"></script>
    </body>
    </html>