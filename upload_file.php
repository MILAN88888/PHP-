<?php
echo date("y-m-d");
echo date("h:m:sa");
echo date("l");          
$myfile=fopen('milan.txt',"a") or die("unable to open");

$txt="i live in Nawalparasi, sarawal gau palika ";
fwrite($myfile,$txt);

fclose($myfile);

echo "<br><BR>";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
if(isset($_POST['submit']))
{

$target_dir="uploads/";
// $file=$_FILES['uploadFile']['name'];
// $target_file= $target_dir.$file;
$target_file=$target_dir.basename($_FILES['uploadFile']['name']);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOK=1;

    $check=getimagesize($_FILES['uploadFile']['tmp_name']);
    if($check !== false)
    {
        echo " file is an image " . $check['mime'];
        echo "<br>";
    }
    else{
    echo "file is not image type";
        $uploadOK=0;
    
    }


if(file_exists($target_file))
{ 
    echo "  file is already exits";
    $uploadOK=0;
}
if($_FILES['uploadFile']['size']>5000000000)
{
    echo " file is too large";
    $uploadOK=0;
}
if($imageFileType != 'jpg' && $imageFileType!=  'jpeg' && $imageFileType != 'png' && $imageFileType!=  'gif')
{
    echo " file is not image format";
    $uploadOK = 0; 
}
if($uploadOK==0)
{
    echo " sorry, you file is not uploaded";
}
else{

    if(move_uploaded_file($_FILES['uploadFile']['tmp_name'],$target_file))
    {
        echo  " The file ".htmlspecialchars(basename($_FILES['uploadFile']['name']))." has been uploaded";

    }
    else
    {
        $error=$_FILES['uploadFile']['error'];
        echo $error;
    }
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
    <label>insert image file</label>
    <input type="file" name="uploadFile" required>
    <input type="submit" name="submit">
    </form>
</body>
</html>