
<?php 
include_once('includes/connection.php');
global $con;
$data = '';

try
{
    $qry = "SELECT * FROM accounts ORDER BY ID ASC";
    $res = mysqli_query($con, $qry);
    while($row = mysqli_fetch_assoc($res))
    {
        $data .= '
        <tr>
                <td>'.$row['ID'].'</td>
                <td>'.$row['username'].'</td>
                <td>'.$row['password'].'</td>
                <td>'.$row['admin'].'</td>
        </tr>
                ';
    }
    echo json_encode(['status'=>'success', 'html'=>$data]);
}
catch(Exception $ex)
{
    echo json_encode(['status'=>'failed', 'text'=>'ERROR OCCURED || '.$ex]);
}

?>