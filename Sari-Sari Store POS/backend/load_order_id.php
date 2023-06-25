

<?php 
include_once 'includes/connection.php';

$response = '';
$max_order_id = '';
try
{
    $res = mysqli_query($con, "SELECT MAX(order_id) FROM sssp_order_total");
    $data = mysqli_fetch_array($res);
    if($data[0] <= 0)
    {
        $max_order_id = 1;
        $response = $max_order_id;
    }
    else
    {
        $max_order_id += 1;
        $response = $max_order_id;
    }
        
    
}
catch(Exception $ex)
{
    $response = 'Error Occured: '.$ex;
}

echo $response;
?>