
<?php 
include_once 'includes/connection.php';
$response = '';
$ID = $_POST['ID'];
$new_qnty = $_POST['new_qnty'];
$new_sub_total = $_POST['new_sub_total'];

try
{
    $res = mysqli_query($con,"UPDATE sssp_temp_order SET qnty='$new_qnty', sub_total='$new_sub_total' WHERE ID='$ID' ");
    if($res)
    {
        $response = "Quantity Modified!";
    }
}
catch(Exception $ex)
{
    $response = "Error Occured" . $ex;
}
echo $response;
?>