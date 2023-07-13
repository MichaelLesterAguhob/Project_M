
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
            text-align: center;
            overflow: auto;
        }
        .total_footer{
            background-color: lightgreen;
        }
       .remove_border{
        border: none;
       }
       .search_bar{
            height: 40px;
        }
        .search_bar{
            display: inline-flex;
            width: 100%;
        }
        #inp_search{
            width: 65%;
            margin-right: 2.5%;
        }
        #btn_search{
            width: 30%; 
            margin-right: 2.5%;
        }
        @media (max-width:300px){
            .search_bar{
                height: 40px;
            }
        }
        .sort_by_date{
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .inpt_date{
            margin-left: 2px;
            margin-right: 2px;
        }
        #sales_total{
            width: 50%;
            text-align: center;
            border: 1px solid blue;
            font-weight: bolder;
        }
    
    </style>
</head>
<body>
    <?php include_once 'page_header.php'; ?> 
    
    <div class="search_bar mb-2">
        <input type="text" id="inp_search" class="form-control" placeholder="Search here..." onchange="search_sales_record();">
        <button class="btn btn-sm btn-success" id="btn_search">&#128269; Search</button>
    </div>
    <span id="msg" class="text-center"></span>
    <br>
    <span><b>Sort by Date:</b></span>
    <div class="sort_by_date p-2">
        <span>From</span>
        <input type="date" id="inpt_date1" class="form-control inpt_date">
        <span>To</span>
        <input type="date" id="inpt_date2" class="form-control inpt_date">
    </div>

    <div id="sales">
        <span><b>Total Sales</b></span> &#8369;
        <input type="number" id="sales_total" class="form-control-lg mb-2">
        <table class="table">
            <thead class="text-light bg-dark">
                <tr>
                    <th style="width: 7%;">Order_ID</th>
                    <th style="width: 40%;"id="sort_by">Description</th>
                    <th style="width: 10%;">Unit/Size</th>
                    <th style="width: 10%;">Price</th>
                    <th style="width: 7%;">Qnty</th>
                    <th style="width: 10%;">Sub_Total</th>
                    <th style="width: 16%;">Date</th>
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