<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
</head>
<body>
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
    <a class="nav-link" href="logout.php">Log out</a>
    </li>
  </ul>
</nav>
  <div class="container">

    <div class="row">
      <div class="col col-12 col-sm-12 col-md-12 ">


<br><br>

<?php

    $sname="localhost";
    $dbun="root";
    $dbpass="";
    $dbn="Project";

    $connection=new mysqli($sname,$dbun,$dbpass,$dbn);
    
    $sql="SELECT `id`, `name`, `author`, `publisher`, `edition`, `year`, `pages`, `language`,`img` FROM `Book` ";

    $r=$connection->query($sql);
    if($r->num_rows>0)
    {
      
        echo "<table class='table table-striped' border=1>
        <tr class='table-primary'>
        <th>Name</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>Edition</th>
        <th>Year</th>
        <th>Pages</th>
        <th>Language</th>
        </tr>";

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

        echo "
        <tr>
        <td>$name</td>
        <td>$auth</td>
        <td>$pub</td>
        <td>$ed</td>
        <td>$yr</td>
        <td>$pg</td>
        <td>$lg</td>
        </tr>";

       }  
       
       echo "</table>";

    }
    else
    {
        echo "There are NO BOOKS!";
    }
?>


      </div>
    </div>
  </div>

</body>
</html>
