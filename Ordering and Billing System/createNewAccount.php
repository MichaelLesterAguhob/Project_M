 
 <?php
 include_once('includes/connection.php');
 global $con;

 $response = "";
 $username = $_POST['username'];
 $password = $_POST['password'];
 $secCode = $_POST['secCode'];
 
 if($secCode == "")
 {
   $query = "SELECT * FROM accounts WHERE username='$username'";
   $result = mysqli_query($con, $query);
   $data = mysqli_fetch_assoc($result);
   if($data != null)
   {
      $response = "Username Already Used.";
   }
   else
   {
      $query = "INSERT INTO accounts VALUES(null, '$username', '$password', 'NO')";
      $result = mysqli_query($con, $query);
      if($result)
      {
         $response = "Staff Account Created";
      }
   }
   
 }
 else
 {  
   $query = "SELECT * FROM accounts WHERE username='$username'";
   $result = mysqli_query($con, $query);
   $data = mysqli_fetch_assoc($result);
   if($data != null)
   {
      $response = "Username Already Used.";
   }
   else
   {
      $query = "INSERT INTO accounts VALUES(null, '$username', '$password', 'YES')";
      $result = mysqli_query($con, $query);
      if($result)
      {
         $response = "Admin Account Created";
      }
   }
 }
 
 echo $response;
 
 ?>