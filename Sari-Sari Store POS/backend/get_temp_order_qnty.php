
<?php 
include_once 'includes/connection.php';
$response = '';
$ID = $_POST['ID'];
try
{
    $res = mysqli_query($con,"SELECT price, qnty FROM sssp_temp_order WHERE ID='$ID' ");
    $data = mysqli_fetch_assoc($res);
    $response = json_encode(['stat'=>'success', 'price'=>$data['price'], 'qnty'=>$data['qnty']]);
}
catch(Exception $ex)
{
    $response = json_encode(['stat'=>'success','text'=>"Error Occured" . $ex ]);
}
echo $response;
?>