

<?php 
include_once 'includes/connection.php';

$response = '';

$order_id = $_POST['order_id'];
$order_name = $_POST['order_name'];
$order_unit_size = $_POST['order_unit_size'];
$order_price = $_POST['order_price'];
$order_qnty = $_POST['order_qnty'];
$order_sub_total = $_POST['order_sub_total'];

try
{
    $res = mysqli_query($con, "SELECT * FROM sssp_temp_order WHERE dscrptn = '$order_name' AND size = '$order_unit_size' ");
    $data = mysqli_fetch_assoc($res);
    if($data != null)
    {
        $new_order_qnty = $order_qnty + $data['qnty'];
        $new_order_sub_total = $order_sub_total + $data['sub_total'];

        $res2 = mysqli_query($con, "UPDATE sssp_temp_order SET qnty = '$new_order_qnty', sub_total ='$new_order_sub_total' WHERE dscrptn = '$order_name' AND size = '$order_unit_size'");
        if($res2)
        {
            $response = "Successfully Added to orders";
        } 
    }
    else
    {
        $res2 = mysqli_query($con, "INSERT INTO sssp_temp_order VALUES(null, '$order_id', '$order_name', '$order_unit_size', '$order_price', '$order_qnty', '$order_sub_total')");
        if($res2)
        {
            $response = "Successfully Added to orders";
        } 

    } 
}
catch(Exception $ex)
{
    $response = 'Error Occured: '.$ex;
}

echo $response;
?>