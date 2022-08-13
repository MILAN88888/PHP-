<?php 
 include('connection.php');
 $name = $_POST['name'];
 $email = $_POST['email'];
 $city = $_POST['city'];
 $contact = $_POST['contact'];
 $marks = $_POST['marks'];
 $sql = 'INSERT INTO studdent (fname,email,city,contact,mark) values ("'.$name.'", "'.$email.'","'.$city.'","'.$contact.'","'.$marks.'")';
 $res= mysqli_query($conn,$sql);
 if($res)
 {
    echo 'Entered successfully';
 }
 else{
    echo 'Failed';
 }

?>