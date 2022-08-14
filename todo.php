<?php
include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js\jquery-3.6.0.min.js" ></script>
    <style>
        #container0
        {
            margin-left: 30%;
        }
        #container{
            background-color: #fda4af;
            width: 500px;
            text-align: center;    
        }
        #title
        {
            width: 300px;
            color: green;
        }
        #container1{
            background-color: #bbf7d0;
            width: 500px;    
        }
        #tbl,tr,th,td{
            border: 1px solid whitesmoke;
        }
        th 
        {
            width:450px;
        }
        #error{
            color: red;
        }
    </style>
</head>
<body>
    <div id="container0">
    <div id="container">
        <h3>TO DO List</h3>
        <input type="text" id="title" />
        <p id="error"></p>
        <input type="submit" id="submit" onclick="submittodo()" value="submit" />
        <br>
        <br>
    </div>
    <br>
    <br>
    <div id="container1">
        
            <?php 
                $sql = "select * from todo";
                $res = mysqli_query($conn,$sql);
                $count= mysqli_num_rows($res);
                $err="";
                if($count>0)
                { 
                ?>
            <table id="tbl"> 
                <?php while($row=mysqli_fetch_assoc($res)){ ?> 
            <tr id="row<?php echo $row['id'] ?>"> 
                <th><?php echo $row['title']; ?></th>
                <td><a href="javascript:void(0);" onclick=" del('<?php echo $row['id']; ?>')" > delete </a></td> 
            </tr>
            <?php } ?>
            </table>
            <?php
                }
                else
                {
                    $err="No data found";
                } 
                echo $err;
            ?>
    </div>
    </div>
    <script>
        function del(id)
        {
            $.ajax({
                url : 'deletetodo.php',
                type :'post',
                data : "id="+id,
                success : function(res)
                {
                    $(document).ready(function() {

                        $('#row'+id).hide();
                        console.log('row'+id);
                        $('#error').html(res);
                    });
                    }
                });
            }

        function submittodo()
        {
            var title = $('#title').val();
            if(title!='')
            {
                $.ajax(
                    {
                        url : 'inserttodo.php',
                        type : 'post',
                        data : 'title='+title,
                        success : function(res)
                        {
                            var obj = $.parseJSON(res);
                            var id = obj.id;
                            $('#tbl').append('<tr id="row'+obj.id+'" ><th>'+title+'</th><td><a href="javascript:void(0);" onclick="del('+obj.id+')">delete</a></td></tr>');
                            $('#error').html(obj.error);
                        }
                    }
                );
            }
            else
            {
                $('#error').html('please enter todo title');
            }
        }
    </script>
</body>
</html>