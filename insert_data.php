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
        input{
            width: 250px;
        }
        table tr th{
            width: 100px;
        }
        table tr, th, td{
            padding: 10px;
        }
        
        #btn{

            margin-left:125px;
        }
        .error{
            color: red;
        }

    </style>
</head>
<body>
    <div id="container">
        <fieldset style="width:400px;">
        <legend>
        <h3>Detail Form</h3>
        </legend>
       
        <table id="tbl">
        <tr><th>Name</th><td><input id="name" type="text"  /><br><span id="errorname" class="error"></span></td></tr>
        <tr><th>Email</th><td><input id="email" name="email" type="text" /><br><span id="erroremail" class="error"></span></td></tr>
        <tr><th>City</th><td>
            <select id="city">
                <option value="" >--Please choose a city--</option>
                <option >Parasi</option>
                <option>Kathmandu</option>
                <option>Pokhara</option>
            </select><br><span id="errorcity" class="error"></span></td></tr>
        <tr><th>Marks</th><td><input id="marks" type="text" /><br><span id="errormarks" class="error"></span></td></tr>
        <tr><th>Contact</th><td><input id="contact" type="text" /><br><span id="errorcontact" class="error"></span></td></tr>
        </table>
        <input id="btn" type="submit" value="submit" onclick="submit_data()" />
        <p id="succ"></p>
        </fieldset>
      
    </div>    

<script>
$('email').mouseenter(function()
{
    var exitEmail=$('email').val();
    $.ajax(
        {
            url : 'exitEmail.php',
            type:'post',
            data : 'email='+exitEmail,
            success : function(res)
            {
                $('erroremail').html('res');
            
            }
        }
    );
});
function submit_data(){
var name = $('#name').val();
var email = $('#email').val();
var city = $('#city').val();
var marks = $('#marks').val();
var contact = $('#contact').val();
$('.error').html("");
var uploadOk=1;
if(name == "")
{
    $('#errorname').html('please fill the name');
    uploadOk=0;
}
if(email == "")
{
    $('#erroremail').html('please fill the email');   
    uploadOk=0;
}
if(city == "")
{
    $('#errorcity').html('please fill the city'); 
    uploadOk=0;  
}
if(contact == "")
{
    $('#errorcontact').html('please fill the contact'); 
    uploadOk=0;  
}
if(marks == "")
{
    $('#errormarks').html('please fill the marks'); 
    uploadOk=0;  
}
if(uploadOk==1)
{   var str1= "name="+name+"&email="+email+"&city="+city+"&contact="+contact+"&marks="+marks;
    $.ajax(
        {
            url : 'insertData.php',
            type : 'POST',
            data : str1,
            success : function (data)
            {
                alert(data);
            }

        }
    );
}
}




</script>
</body>
</html>