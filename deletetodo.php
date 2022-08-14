<?php 
include('connection.php');
$id = $_POST['id'];
$sql = 'delete from todo where id="'.$id.'"';
$res = mysqli_query($conn,$sql);
if($res)
{
    echo "deleted succefully";

}
else{
    echo " failed to delete";
}
?>