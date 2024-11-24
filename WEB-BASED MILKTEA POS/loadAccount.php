<?php 
include_once 'includes/connection.php';

$response = '';
$user_id = '';
$username = $_SESSION['username'];
$user_pass = '';

try
{
    $res = mysqli_query($con, "SELECT * FROM accounts WHERE username='$username'");
    
    while($data = mysqli_fetch_assoc($res)) {
        $user_id = $data['ID'];
        $username = $data['username'];
        $user_pass = $data['password'];
    }
    $response = json_encode(['stat'=>'success','user_id'=>$user_id, 'username'=>$username, 'user_pass'=>$user_pass]);
}
catch(Exception $ex)
{
    $response = json_encode(['stat'=>'failed','text'=>'Error Occured || '.$ex]);
}

echo $response;


?>