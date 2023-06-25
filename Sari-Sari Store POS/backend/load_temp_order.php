
<?php 
include_once 'includes/connection.php';

$response = '';
$output = '';

try
{
    $res = mysqli_query($con, "SELECT * FROM sssp_temp_order ORDER BY ID DESC");
    while($data = mysqli_fetch_assoc($res))
    {
        $output .= '
            <tr class="temp_order_row" id="'.$data['ID'].'">
                <td>'.$data['dscrptn'].'</td>
                <td>'.$data['size'].'</td>
                <td>'.$data['price'].'</td>
                <td>'.$data['qnty'].'</td>
                <td>'.$data['sub_total'].'</td>
            </tr>
        ';
    }
    $res2 = mysqli_query($con, "SELECT * FROM sssp_temp_order ORDER BY ID DESC");
    $data2 = mysqli_fetch_assoc($res2);
    if($data2 != null)
    {
        $response = json_encode(['stat'=>'success','html' => $output]);
    }
    else
    {
        $response = json_encode(['stat'=>'failed','text'=>"No orders yet"]);
    }
}
catch(Exception $ex)
{
    $response = json_encode(['stat'=>'failed','text'=>'Error Occured: '.$ex]);
}

echo $response;
?>