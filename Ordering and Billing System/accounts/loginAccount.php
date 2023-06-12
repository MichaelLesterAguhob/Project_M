
 <?php
 include_once('includes/connection.php');
 global $con;

 $response = "";
 $username = $_POST['username'];
 $password = $_POST['password'];
 
   $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password' AND admin='NO'";
   $result = mysqli_query($con, $query);
   $data = mysqli_fetch_assoc($result);
   if($data != null)
   {  
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['user'] = 'staff';
      $response = json_encode(['status' => 'success', 'html' => 'Login Success Staff']);
   }
   else
   {
    $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password' AND admin='YES'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
      if($data != null)
      {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user'] = 'admin';
        $response = json_encode(['status' => 'success', 'html' => 'Login Success Admin']);
      }
      else
      {
        $response = json_encode(['status' => 'failed', 'html' => "Account doesn't exist."]);
      }
   }

 echo $response;
 
 ?>