
<?php 
include_once 'includes/connection.php';
$min_id = 0;
$max_id = 0;
$response = '';
$order_id1 = $_POST['order_id'];
$total = $_POST['total'];
$payment = $_POST['payment'];
$chanege = $payment - $total;
$date = date('Y-m-d');
try
{
    $save_order_record = mysqli_query($con, "INSERT INTO sssp_order_total VALUES(null, '$order_id1','$total','$payment','$chanege') ");

    get_min_temp_order_id();
    get_max_temp_order_id();
    while($min_id <= $max_id)
    {
        $order_id = 0;
        $description = '';
        $size = '';
        $price = 0;
        $qnty = 0;
        $sub_total = 0;
        $res_is_exist = mysqli_query($con, "SELECT * FROM sssp_temp_order WHERE ID='$min_id'");
        $exist = mysqli_fetch_assoc($res_is_exist);
        if($exist != null)  
        {
            $res = mysqli_query($con, "SELECT * FROM sssp_temp_order WHERE ID='$min_id'");
            while($data = mysqli_fetch_assoc($res)) {
                $order_id = $data['order_id'];
                $description = $data['dscrptn'];
                $size = $data['size'];
                $price = $data['price'];
                $qnty = $data['qnty'];
                $sub_total = $data['sub_total'];
            }
            //updating sold record of specific product
            $new_sold_qnty = 0;
            $res4 = mysqli_query($con, "SELECT sold FROM sssp_products WHERE name = '$description' ");
            $data2 = mysqli_fetch_array($res4);
            $new_sold_qnty = $data2[0] + $qnty;

            $res5 = mysqli_query($con, "UPDATE sssp_products SET sold='$new_sold_qnty' WHERE name = '$description'");

            //inserting temp_order data to order table
            $res2 = mysqli_query($con, "INSERT INTO sssp_orders VALUES(null,'$order_id','$description','$size','$price','$qnty','$sub_total', '$date')");
            if($res2) 
            {
                $res3 = mysqli_query($con, "DELETE FROM sssp_temp_order WHERE ID='$min_id'");
            }
        }
        $min_id++;
    }
    $response = "Successfully Place Orders";
}
catch(Exception $ex)
{
    $response = "ERROR OCCURED : " . $ex;
}

function get_min_temp_order_id()
{
    global $min_id;
    global $con;
    $res = mysqli_query($con, "SELECT MIN(ID) FROM sssp_temp_order");
    $min = mysqli_fetch_array($res);
    $min_id = $min[0];
}
function get_max_temp_order_id()
{
    global $max_id;
    global $con;
    $res = mysqli_query($con, "SELECT MAX(ID) FROM sssp_temp_order");
    $max = mysqli_fetch_array($res);
    $max_id = $max[0];
}

echo $response;
?>