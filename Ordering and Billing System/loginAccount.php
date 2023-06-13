
 <?php
 include_once('includes/connection.php');
 global $con;

 $username = $_POST['username'];
 $password = $_POST['password'];
 
   $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password' AND admin='NO'";
   $result = mysqli_query($con, $query);
   $data = mysqli_fetch_assoc($result);
   if($data != null)
   {  
      $_SESSION['username'] = $username;
      $_SESSION['user'] = 'staff';
      echo '<script>window.location.href="orderingPage.php";</script>';
   }
   else
   {
    $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password' AND admin='YES'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
      if($data != null)
      {
        $_SESSION['username'] = $username;
        $_SESSION['user'] = 'admin';
        echo '<script>window.location.href="orderingPage.php";</script>';
      }
      else
      {
        echo "Account doesn't exist.";
      }
   }


 
 ?>