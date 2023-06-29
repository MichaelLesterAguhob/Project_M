<?php 
include_once 'includes/connection.php';
$response = '';
$min_order_id = 0;
$max_order_id = 0;
$output = '';
try
{
    get_min_order_id();
    get_max_order_id();
    if($min_order_id != 0 && $max_order_id != 0) {
        while($min_order_id <= $max_order_id) {
            $res = mysqli_query($con, "SELECT * FROM sssp_orders WHERE order_id = '$min_order_id'");
            while($data = mysqli_fetch_assoc($res)) {
                $output .= '
                <tr>
                    <td class="remove_border">'.$data['order_id'].'</td>
                    <td>'.$data['dscrptn'].'</td>
                    <td>'.$data['size'].'</td>
                    <td>'.$data['price'].'</td>
                    <td>'.$data['qnty'].'</td>
                    <td>'.$data['sub_total'].'</td>
                </tr>
                ';
            }
            $res2 = mysqli_query($con, "SELECT * FROM sssp_order_total WHERE order_id ='$min_order_id'");
            $data2 = mysqli_fetch_assoc($res2);
            $output .= '
                <tr class="total_footer">
                    <td>TOTAL: </td>
                    <td>'.$data2['total_amount'].'</td>
                    <td>PAYMENT: </td>
                    <td>'.$data2['payment'].'</td>
                    <td>CHANGE: </td>
                    <td>'.$data2['sukli'].'</td>
                </tr>
                <tr class="remove_border">
                    <td colspan="6" class="remove_border"><hr></td>
                </tr>
                ';
            $min_order_id++;
        }
    }
    else
    {
        $output = "No order records found.";
    }
    $response = $output;
}
catch(Exception $ex)
{
    $response = "Error Occured : ". $ex;
}
echo $response;

function get_min_order_id()
{
    global $min_order_id;
    global $con;
    $res = mysqli_query($con, "SELECT MIN(order_id) FROM sssp_orders");
    $data = mysqli_fetch_array($res);
    if($data != null)
    {
        $min_order_id = $data[0];
    }
    else
    {
        $min_order_id = 0;
    }
}
function get_max_order_id()
{
    global $max_order_id;
    global $con;
    $res = mysqli_query($con, "SELECT MAX(order_id) FROM sssp_orders");
    $data = mysqli_fetch_array($res);
    if($data != null) 
    {
        $max_order_id = $data[0];
    }
    else
    {
        $max_order_id = 0;
    }
}
?>