<?php 
include('connection.php');
$id = $_POST['id'];
$qry = "select * from _user where id =  $id";
$res = mysqli_query($conn,$qry);
while($row=mysqli_fetch_assoc($res))
{
    $arr=$row;

}
 echo json_encode($arr);

 ?>