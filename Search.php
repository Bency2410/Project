<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
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
<td>Name of book</td>
<td><input type="text" class="form-control" name="sbook"></td>
<td><button type="Submit" class="btn btn-success" name="sbtn">Search</button></td>
</tr>
</table>
</form>
</body>
</html>

<?php
if (isset($_POST["sbtn"]))
{
    $bname=$_POST["sbook"];

    $sname="localhost";
    $dbun="root";
    $dbpass="";
    $dbn="Project";

    $connection=new mysqli($sname,$dbun,$dbpass,$dbn);
    
    $sql="SELECT `id`, `name`, `author`, `publisher`, `edition`, `year`, `pages`, `language`,`img` FROM `Book` WHERE `name`='$bname'";

    $r=$connection->query($sql);
    if($r->num_rows>0)
    {
        
while($row=$r->fetch_assoc())
{

    $name=$row["name"];
    $auth=$row["author"];
    $pub=$row["publisher"];
    $ed=$row["edition"];
    $yr=$row["year"];
    $pg=$row["pages"];
    $lg=$row["language"];
    $im=$row["img"];

    echo "<table class='table' border=1>
    <tr>
    <td>Image</td>
    <td>$im</td>
    </tr>
    <tr>
    <td>Name</td>
    <td>$name</td>
    </tr>
    <tr>
    <td>Author</td>
    <td>$auth</td>
    </tr>
    <tr>
    <td>Publisher</td>
    <td>$pub</td>
    </tr>
    <tr>
    <td>Edition</td>
    <td>$ed</td>
    </tr>
    <tr>
    <td>Year</td>
    <td>$yr</td>
    </tr>
    <tr>
    <td>Pages</td>
    <td>$pg</td>
    </tr>
    <tr>
    <td>Language</td>
    <td>$lg</td>
    </tr>
    </table>";

}

    }
    else
    {
        echo "invalid book";
    }
}
?>