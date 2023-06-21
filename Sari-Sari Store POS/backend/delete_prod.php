
<?php 
    require_once 'includes/connection.php';
    $response = '';
    $ID = $_POST['ID'];
   
    try
    {
        $res = mysqli_query($con, "DELETE FROM sssp_products WHERE ID='$ID' ");
        if($res)
        {
            $response = "Successfully Deleted";
        }
    }
    catch(Exception $ex)
    {
        $response = json_encode(['stat'=>'failed','error'=>$ex]);
    }

    echo $response;

?>