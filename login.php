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
    <table class="table">
    <tr>
    <td>Username</td>
    <td><input type="text" class="form-control" name="uname"></td>
    </tr>
    <tr>
    <td>Password</td>
    <td><input type="password" class="form-control" name="pass"></td>
    </tr>
    <tr>
    <td></td>
    <td><button class="btn btn-primary" type="submit" name="log">Login</button></td></tr>
    <tr><td>New users click here -><a href="http://localhost/Project/register.php">Register now</a></td>
    </tr>
    </table>
    </form>
</body>
</html>

<?php
if(isset($_POST["log"]))
{
    $un=$_POST["uname"];
    $pw=$_POST["pass"];
    
    $sname="localhost";
    $dbun="root";
    $dbpass="";
    $dbn="Project";

    $connection=new mysqli($sname,$dbun,$dbpass,$dbn);

    $sql="SELECT `username`,`password` FROM `Registration` WHERE `username`='$un' AND `password`='$pw'";
    $r=$connection->query($sql);

    if($r===TRUE)
    {
        header("Location: http://localhost/Project/Book.php");
        exit;
    }
    else
    {
        echo "Invalid username and password";
    }
}
?>