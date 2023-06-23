<?php
    require_once 'includes/connection.php';
    $output = '';
    $response = '';
    $search_input = trim($_POST['search_input']);
    $num = 1;
    try
    { 
        $res = mysqli_query($con, "SELECT * FROM sssp_products WHERE name LIKE '$search_input%' ");
        while($data = mysqli_fetch_assoc($res))
        {
            $output .= '
                    <tr class="t_row" data-id="'.$data['ID'].'">
                        <td class="prod_td">'.$num.'</td>
                        <td class="prod_td">'.$data['name'].'</td>
                        <td class="prod_td">'.$data['unit_size'].'</td>
                        <td class="prod_td">'.$data['price'].'</td>
                        <td class="prod_td">'.$data['category'].'</td>
                    </tr>
                    ';
            $num ++;
        }
        $response = json_encode(['stat'=>'success', 'html'=>$output]);
    }
    catch(Exception $ex)
    {
        $response = 'Error Occured' . $ex;
    }

    echo $response;

?>