<?php
include('connection.php');
$title = $_POST['title'];
$sql = 'INSERT INTO todo (title) values ("'.$title.'")';
$res= mysqli_query($conn,$sql);
$id = mysqli_insert_id($conn);
if($res)
{
   $arr=array('id'=>$id,'error'=>'Recored succefully');
   echo json_encode($arr);
}
else{
   $arr=array('id'=>$id,'error'=>'failed');
   echo json_encode($arr);
}
?>
