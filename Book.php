<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
</head>
<body>
<form method="POST">
<nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="Book.php">Add Books</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="Search.php">Search</a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="viewall.php">View All</a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="login.php">Log out</a>
    </li>
  </ul>
</nav>
<table class="table" >
<tr>
<td>Name</td>
<td><input type="text" class="form-control" name="bname"></td>
</tr>
<tr>
<td>Author</td>
<td>
<input type="text" class="form-control" name="auth"></td>
</tr>
<tr>
<td>Publisher</td>
<td><input type="text" class="form-control" name="Pub"></td>
</tr>
<tr>
<td>Edition</td>
<td><input type="text" class="form-control" name="edi"></td>
</tr>
<tr>
<td>Year</td>
<td><input type="number" class="form-control" name="yr"></td>
</tr>
<tr>
<td>Pages</td>
<td><input type="number" class="form-control" name="page"></td>
</tr>
<tr>
<td>Language</td>
<td><input type="text" class="form-control" name="lang"></td>
</tr>
<tr>
<td>Upload Image</td>
<td><input type="file" class="form-control" name="imag"></td>
</tr>
<tr>
<td><button class="btn btn-primary" type="Reset" name="rbutton">Reset</button></td>
<td><button class="btn btn-success" type="Submit" name="sbutton">Submit</button></td>
</tr>
</table>
</form>
</body>
</html>

<?php
if (isset($_POST["sbutton"]))
{
    $bn=$_POST["bname"];
    $aut=$_POST["auth"];
    $pb=$_POST["Pub"];
    $ed=$_POST["edi"];
    $year=$_POST["yr"];
    $pg=$_POST["page"];
    $lg=$_POST["lang"];
    $im=$_POST["imag"];

    $sname="localhost";
    $dbun="root";
    $dbpass="";
    $dbn="Project";

    $connection=new mysqli($sname,$dbun,$dbpass,$dbn);
    
    $sql="INSERT INTO `Book`(`name`, `author`, `publisher`, `edition`, `year`, `pages`, `language`,`img`) 
    VALUES ('$bn','$aut','$pb',$ed,$year,$pg,'$lg','$im')";

    $r=$connection->query($sql);
    if($r===TRUE)
    {
        echo "Success";
    }
    else
    {
        echo $connection->error;
    }

    }
    ?>