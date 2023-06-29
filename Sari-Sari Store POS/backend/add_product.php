<?php 
    require_once 'includes/connection.php';
    $response = '';
    $name = strtoupper($_POST['name']);
    $unit_size = strtoupper($_POST['unit_size']);
    $price = strtoupper($_POST['price']);
    $cat = strtoupper($_POST['cat']);
    try
    {
        $res = mysqli_query($con, "INSERT INTO sssp_products VALUES(null,'$name','$unit_size','$price','$cat', 0)" );
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