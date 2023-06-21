<?php 
    require_once 'includes/connection.php';
    $response = '';
    $ID = $_POST['ID'];
    $name = strtoupper($_POST['name']);
    $unit_size = strtoupper($_POST['unit_size']);
    $price = strtoupper($_POST['price']);
    $cat = strtoupper($_POST['cat']);

    try
    {
        $res = mysqli_query($con, "UPDATE sssp_products SET name='$name', unit_size='$unit_size', price='$price', category='$cat' WHERE ID='$ID'" );
        if($res)
        {
            $response = 'Successfully Updated';
        }

    }
    catch(Exception $ex)
    {
        $response = 'Error Occured' . $ex;
    }

    echo $response;

?>