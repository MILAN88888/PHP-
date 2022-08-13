<?php
include 'connection.php';
$qry = "SELECT * FROM _user order by Name asc" ; 
$res = mysqli_query($conn,$qry);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js\jquery-3.6.0.min.js" ></script>
    <link href="css/ajax.css" type="stylesheet">

    <style>
#table ,tr,th
{
 border: 1px solid black;
 border-collapse: collapse;

 padding: 4px;

}
#table th{
    width: 20px;
}
#table td 
{
    width : 400px;
}</style>
</head>
<body>
    <h1>Form Details:</h1>
    <select onchange="getData(this.options[this.selectedIndex].value)">
    <option name="" value="">selct one option</option>
    <?php
    while($row=mysqli_fetch_assoc($res)) { ?>
    <option value="<?php echo $row['id'] ?>"><?php echo $row['Name'] ?></option>;
    <?php 
    }
    ?>
    </select>
    <div id="container" style="display:none ;">
    <span>Details</span>
    <table id="table">
        <tr><th>Name</th><td id="name"></td></tr>
        <tr><th>Email</th><td id="email"></td></tr>
        <tr><th>Contact</th><td id="contact"></td></tr>
        <tr><th>Address</th><td id="address"></td></tr>
    </table>
    <input type="button" id="close" value="close">
    </div>
    
<script>
function getData(id)
{

    $.ajax(
        {
            url :'getData.php',
            type : 'post',
            data : 'id='+id,
            success : function(result)
            {   
            //     console.log(result);
            //    const obj = JSON.parse(result);
            //    console.log(obj.id);
        
            var obj = $.parseJSON(result);
            $('#container').show();
            $('#name').html(obj.Name);
            $('#email').html(obj.Email);
            $('#contact').html(obj.Contact);
            $('#address').html(obj.Address);
            }
  
        });
}
$('#close').click(function()
{
    $('#container').hide();
});


</script>
</body>
</html>
