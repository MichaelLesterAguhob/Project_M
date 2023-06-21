<?php 
    require_once 'includes/connection.php';
    $response = '';
    $name = $_POST['name'];
    $unit_size = $_POST['unit_size'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];

    try
    {
        $res = mysqli_query($con, "INSERT INTO sssp_products VALUES(null,'$name','$unit_size','$price','$cat')" );
        if($res)
        {
            $response = 'Successfully Added';
        }

    }
    catch(Exception $ex)
    {
        $response = 'Error Occured' . $ex;
    }

    echo $response;

?>