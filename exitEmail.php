<?php
include('connection.php');
$email = $_POST['email'];
$sql = " Select id from studdent where email='$email'";
$res = mysqli_query($conn,$sql);
if($res)
{
    echo 'Enter email is already exit';
}
?>