
<?php 
include_once('includes/connection.php');
global $con;
$data = '';

try
{
    $qry = "SELECT * FROM completed_orders ORDER BY ID DESC";
    $res = mysqli_query($con, $qry);
    while($row = mysqli_fetch_assoc($res))
    {
        $data .= '
        <tr>
                <td>'.$row['orderNo'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['qnty'].'</td>
                <td>'.$row['addOns'].'</td>
                <td>'.$row['subTotal'].'</td>
        </tr>
                ';
    }
    $qry2 = "SELECT SUM(subTotal) FROM completed_orders";
    $res2 = mysqli_query($con, $qry2);
    $sum = mysqli_fetch_array($res2);
    
    $data .= '<tfooter>
        <tr>
            <th colspan="6"><h4>Total Sold : &#8369; '.$sum[0].'</h4></th>
        </tr>
        </tfooter>';
    echo json_encode(['status'=>'success', 'html'=>$data]);
}
catch(Exception $ex)
{
    echo json_encode(['status'=>'failed', 'text'=>'ERROR OCCURED || '.$ex]);
}

?>