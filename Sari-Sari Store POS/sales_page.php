
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Records</title>
     <!-- Bootsrap -->
     <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.css">
    <script src="CSS/bootstrap/js/bootstrap.js"></script>
    <!-- CSS -->
    <style>
        #sales{
            overflow: auto;
        }
        .total_footer{
            background-color: lightgreen;
        }
       .remove_border{
        border: none;
       }
    </style>
</head>
<body>
    <?php include_once 'page_header.php'; ?>
    <div id="sales">
        <table class="table">
            <thead class="text-light bg-dark">
                <tr>
                    <th style="width: 10%;">Order_ID</th>
                    <th style="width: 50%;"id="sort_by">Description</th>
                    <th style="width: 10%;">Unit/Size</th>
                    <th style="width: 10%;">Price</th>
                    <th style="width: 10%;">Qnty</th>
                    <th style="width: 10%;">Sub_Total</th>
                </tr>
            </thead>
            <tbody id="sales_display">
                    <!-- displaying product here -->
            </tbody>
        </table>
    </div>

     <!-- JavaScript -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
     <script src="backend/JS/sales.js"></script>
</body>
</html>