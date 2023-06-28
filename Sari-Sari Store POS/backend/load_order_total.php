
<?php 
include_once 'includes/connection.php';

$response = '';
try
{
    $res = mysqli_query($con, "SELECT SUM(sub_total) FROM sssp_temp_order ");
    $data = mysqli_fetch_array($res);
    if($data[0] <= 0)
    {
        $data[0] = 0;
    }
    $response = $data[0];
}
catch(Exception $ex)
{
    $response =  'Error Occured: '. $ex;
}

echo $response;
?>