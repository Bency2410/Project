<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">
<table class="table" >
<tr>
<td>Name</td>
<td><input type="text" class="form-control" name="name"></td>
</tr>
<tr>
<td>Gender</td>
<td>
<input type="text" class="form-control" name="gen"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="email" class="form-control" name="mail"></td>
</tr>
<tr>
<td>Phone no.</td>
<td><input type="text" class="form-control" name="phone"></td>
</tr>
<tr>
<td>Username</td>
<td><input type="text" class="form-control" name="unm"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="form-control" name="pass"></td>
</tr>
<tr>
<td>Confirm password</td>
<td><input type="password" class="form-control" name="cpass"></td>
</tr>
<tr><td></td>
<td><button class="btn btn-success" name="sbutton" type="submit">Register</button></td>
</tr>
</table>
</form>
</body>
</html>

<?php
if (isset($_POST["sbutton"]))
{
    $name=$_POST["name"];
    $gd=$_POST["gen"];
    $em=$_POST["mail"];
    $pn=$_POST["phone"];
    $un=$_POST["unm"];
    $pw=$_POST["pass"];
    $cpw=$_POST["cpass"];

    $sname="localhost";
    $dbun="root";
    $dbpass="";
    $dbn="Project";

    $connection=new mysqli($sname,$dbun,$dbpass,$dbn);

    $sql="INSERT INTO `Registration`(`name`, `gender`, `email`, `phoneno`, `username`, `password`, `confirmpwd`) 
    VALUES ('$name','$gd','$em',$pn,'$un','$pw','$cpw')";

$r=$connection->query($sql);

if($r===TRUE)
{
   header("Location: http://localhost/Project/Book.php");
    exit;
}
else
{
    echo $connection->error;
}
}
