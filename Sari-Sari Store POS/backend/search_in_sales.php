
<?php
include_once 'includes/connection.php';
//my variables
$response = '';
$output = '';
// data from JS
$order_id = $_POST['search_sales'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];

try 
{
    // know if search input value match in the database record
    $res_is_exist = mysqli_query($con, "SELECT * FROM sssp_orders WHERE order_id='$order_id'");
    $data_is_exist = mysqli_fetch_assoc($res_is_exist);
    if($data_is_exist != null) {
        $res = mysqli_query($con, "SELECT * FROM sssp_orders WHERE order_id='$order_id'");
        while($data = mysqli_fetch_assoc($res)) {
            $output .= '
        <tr>
            <td class="remove_border">'.$data['order_id'].'</td>
            <td>'.$data['dscrptn'].'</td>
            <td>'.$data['size'].'</td>
            <td>'.$data['price'].'</td>
            <td>'.$data['qnty'].'</td>
            <td>'.$data['sub_total'].'</td>
            <td>'.$data['date'].'</td>
        </tr>
        ';
        }
        $res2 = mysqli_query($con, "SELECT * FROM sssp_order_total WHERE order_id ='$order_id'");
        $data2 = mysqli_fetch_assoc($res2);
        $output .= '
        <tr class="total_footer">
            <td>TOTAL: </td>
            <td>'.$data2['total_amount'].'</td>
            <td>PAYMENT: </td>
            <td>'.$data2['payment'].'</td>
            <td>CHANGE: </td>
            <td>'.$data2['sukli'].'</td>
            <td></td>
        </tr>
        <tr class="remove_border">
            <td colspan="7" class="remove_border"><hr></td>
        </tr>
        ';
        $res3 = mysqli_query($con, " SELECT SUM(sub_total) FROM sssp_orders WHERE order_id ='$order_id'");
        $data3 = mysqli_fetch_array($res3);

        $response = json_encode(['stat'=>'success','html'=>$output, 'total_sales'=>$data3[0]]);
    }
    else
    {
        $output = "No record found!";
        $response = json_encode(['stat'=>'success','html'=>$output, 'total_sales'=>0]);
    }
}
catch(Exception $ex)
{
    $response = json_encode(['stat'=>'failed','text'=>"Error Occured : ". $ex]);
}
//if record exsit, create a function and run that function for searching record base on order_id
echo $response;

?>