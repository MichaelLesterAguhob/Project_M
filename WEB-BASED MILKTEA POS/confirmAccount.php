
<?php 
include_once('includes/connection.php');
global $con;
$ID = $_POST['ID'];

try
{
    $username = '';
    $password = '';
    $admin = '';

    $qry = "SELECT * FROM to_confirm_account WHERE ID='$ID'";
    $res = mysqli_query($con, $qry);
    
    while($row = mysqli_fetch_assoc($res))
    {
        $username = $row['username'];
        $password = $row['password'];
        $admin = $row['admin'];
    }
    $qry2 = "INSERT INTO accounts VALUES(null,'$username', '$password', '$admin')";
    $res2 = mysqli_query($con, $qry2);
    if($res2)
    {
        $qry3 = "DELETE FROM to_confirm_account WHERE ID='$ID'";
        $res3 = mysqli_query($con, $qry3);

        echo json_encode(['status'=>'success', 'text'=>'Account Confirmed']);
    }
}
catch(Exception $ex)
{
    echo json_encode(['status'=>'failed', 'text'=>'ERROR OCCURED || '.$ex]);
}

?>