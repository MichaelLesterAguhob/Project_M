 
 <?php
 include_once('includes/connection.php');
 global $con;

 $response = "";
 $username = $_POST['username'];
 $password = $_POST['password'];
 $secCode = $_POST['secCode'];

 try
 {
   if($secCode == "")
   {
     $query = "SELECT * FROM accounts WHERE username='$username'";
     $result = mysqli_query($con, $query);
     $data = mysqli_fetch_assoc($result);
     if($data != null)
     { 
        $response = json_encode(['status'=>'failed','text'=>"Username Already Used."]);
     }
     else
     {
        $query = "INSERT INTO to_confirm_account VALUES(null, '$username', '$password', 'NO')";
        $result = mysqli_query($con, $query);
        if($result)
        {
           $response = json_encode(['status'=>'success','text'=>"Staff Account Created <br> Wait for the Admin to confirm your created account."]);
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
        $response = json_encode(['status'=>'failed','text'=>"Username Already Used."]);
     }
     else
     {
        $query = "INSERT INTO accounts VALUES(null, '$username', '$password', 'YES')";
        $result = mysqli_query($con, $query);
        if($result)
        {
           $response = json_encode(['status'=>'success','text'=>"Admin Account Created"]);
        }
     }
   }
 }
 catch(Exception $ex)
 {
      $response = json_encode(['status'=>'error','text'=>'ERROR OCCURED || ' .$ex]);
 }
 echo $response;
 
 ?>