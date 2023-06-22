<?php
    require_once 'includes/connection.php';
    $output = '<option class="select_opt">Quick Select Category</option>';
    $response = '';
    try
    {
        $res = mysqli_query($con, "SELECT DISTINCT(category) FROM sssp_products");
        while($data = mysqli_fetch_assoc($res))
        {
            $output .= '
                    <option class="select_opt" id="'.$data['ID'].'">'.$data['category'].'</option>
                    ';
        }
        $response = $output;
    }
    catch(Exception $ex)
    {
        $response = 'Error Occured' . $ex;
    }

    echo $response;

?>