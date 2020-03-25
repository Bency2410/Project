<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col col-sm-12 col-md-12 ">
<form method="POST">
    <table class="table table-borderless">
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


<?php
session_start();
if(isset($_POST["log"]))
{
    $un=$_POST["uname"];
    $pw=$_POST["pass"];
    
    $sname="localhost";
    $dbun="root";
    $dbpass="";
    $dbn="Project";

    $connection=new mysqli($sname,$dbun,$dbpass,$dbn);

     $sql="SELECT `username`,`password`,`id`, `name` FROM `Registration` WHERE `username`='$un' AND `password`='$pw'";
    $r=$connection->query($sql);

    if($r->num_rows>0)
    {
        while($row=$r->fetch_assoc())
        {
     
         $name=$row["name"];
         $id=$row["id"];

         $_SESSION["uname"]=$name;
         $_SESSION["id"]=$id;
         header("Location:Book.php");
         exit;

        }


      
    }
    else
    {
        echo "<script> alert('Invalid username and password')  </script>";
    }
}
?>
</div>
</div>
</div>
</body>
</html>