<?php
require_once('includes/connection.php');
global $con;
$msg = "";

$username = $_POST['username'];
$password = $_POST['password'];

if($username != "" && $password != "")
{
    $sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password' AND admin='NO'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);

    if($data != null)
    {
        $_SESSION['username'] = $data['username'];
        $_SESSION['loggedin'] = 'staff';
        // $msg = "Login Successfully.";   
        // $msg = 'orderingPage.php';
        $msg = json_encode(['status'=>'success','text'=>'orderingPage.php']);
    }
    else
    {
        $sql2 = "SELECT * FROM accounts WHERE username='$username' AND password='$password' AND admin='YES'";
        $result2 = mysqli_query($con, $sql2);
        $data2 = mysqli_fetch_assoc($result2);

        if($data2 != null)
        {
            $_SESSION['username'] = $data2['username'];
            $_SESSION['loggedin'] = 'admin';
            $msg = json_encode(['status'=>'success','text'=>'admin.php']);  
        }
        else
        {
            $msg = json_encode(['status'=>'failed','text'=>"Account doesn't exist."]);  
        }
    }
}
else
{
    $msg = json_encode(['status'=>'NoInput','text'=>"No Input. <br>Fill in the blanks."]);  
}

echo $msg;
  ?>