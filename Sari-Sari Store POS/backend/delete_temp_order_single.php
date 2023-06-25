
<?php 
include_once 'includes/connection.php';

$response = '';
$ID = $_POST['ID'];
$to_delete = $_POST['to_delete'];
try
{
    if($to_delete == 'single')
    {
        $res = mysqli_query($con, "DELETE FROM sssp_temp_order WHERE ID='$ID' ");
        if($res)
        {
            $response = "Successfully Deleted Item.";
        }
        else
        {
            $response = "Unknown Problem Occured.";
        }
    }
    if($to_delete == 'all')
    {
        $res = mysqli_query($con, "DELETE FROM sssp_temp_order");
        if($res)
        {
            $response = "Successfully Cancelled Orders..";
        }
        else
        {
            $response = "Unknown Problem Occured.";
        }
    }
   
}
catch(Exception $ex)
{
    $response =  'Error Occured: '. $ex;
}

echo $response;
?>