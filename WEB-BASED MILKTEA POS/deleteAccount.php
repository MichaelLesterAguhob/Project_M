
<?php 
include_once('includes/connection.php');
global $con;
$ID = $_POST['ID'];

try
{
    $qry = "DELETE FROM to_confirm_account WHERE ID='$ID'";
    $res = mysqli_query($con, $qry);

    echo json_encode(['status'=>'success', 'text'=>'Account Deleted']);
}
catch(Exception $ex)
{
    echo json_encode(['status'=>'failed', 'text'=>'ERROR OCCURED || '.$ex]);
}

?>