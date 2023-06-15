
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
                <td>
                    <input id="'.$row['ID'].'" class="user_pass" type="password" value="'.$row['password'].'abcdefg" disabled>
                    <button class="btn_see" data-id="'.$row['ID'].'">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
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