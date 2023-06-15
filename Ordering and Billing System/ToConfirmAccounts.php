

<?php 
include_once('includes/connection.php');
global $con;
$data = '';

try
{
    $qry = "SELECT * FROM to_confirm_account ORDER BY ID ASC";
    $res = mysqli_query($con, $qry);
    while($row = mysqli_fetch_assoc($res))
    {
        $data .= '
        <tr>
                <td>'.$row['ID'].'</td>
                <td>'.$row['username'].'</td>
                <td>
                    <input id="'.$row['username'].'" class="user_pass" type="password" value="'.$row['password'].'abcdefg" disabled>
                    <button class="btn_see" data-id="'.$row['username'].'">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
                <td>'.$row['admin'].'</td>
                <td>
                  <button class="btn btn-sm btn-success confirm" data-id="'.$row['ID'].'">Confirm</button> &nbsp; 
                  <button class="btn btn-sm btn-danger text-light delete"  data-id="'.$row['ID'].'">Delete</button>              
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
