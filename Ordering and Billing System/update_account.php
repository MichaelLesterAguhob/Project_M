
<?php 
include_once 'includes/connection.php';

$response = '';
$user_id = $_POST['ID'];
$username = $_POST['username'];
$user_pass = $_POST['password'];

try
{
    $res = mysqli_query($con, "UPDATE accounts SET username='$username', password='$user_pass' WHERE ID='$user_id'");
    $_SESSION['username'] = $username;
    $response = json_encode(['stat'=>'success','text'=>'Successfully updated account.']);
}
catch(Exception $ex)
{
    $response = json_encode(['stat'=>'failed','text'=>'Error Occured || '.$ex]);
}

echo $response;

?>
