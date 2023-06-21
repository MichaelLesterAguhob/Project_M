<?php 
    require_once 'includes/connection.php';
    $response = '';
    $ID = $_POST['ID'];
    $name = '';
    $unit_size = '';
    $price = '';
    $cat = '';
    try
    {
        $res = mysqli_query($con, "SELECT * FROM sssp_products WHERE ID='$ID' ");
        while($row = mysqli_fetch_assoc($res))
        {
            $name = $row['name'];
            $unit_size = $row['unit_size'];
            $price = $row['price'];
            $cat = $row['category'];
        }
        $response = json_encode(['stat'=>'success','name'=>$name,'unit_size'=>$unit_size, 'price'=>$price, 'cat'=>$cat]);
    }
    catch(Exception $ex)
    {
        $response = json_encode(['stat'=>'failed','error'=>$ex]);
    }

    echo $response;

?>