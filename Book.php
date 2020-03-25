<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
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
<div class="col col-sm-12 col-md-12 ">
<form method="POST" enctype="multipart/form-data">

<?php
session_start();

$name=$_SESSION["uname"];
echo "Welcome ".$name;

if(!isset($_SESSION['id']))
{

  echo "<script>window.location.href='login.php'</script>";
}

?>

<br></br>
<table class="table table-borderless" >
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
<td><input type="file" class="form-control" name="images"></td>
</tr>
<tr>
<td>Upload File</td>
<td><input type="file" class="form-control" name="files"></td>
</tr>
<tr>
<td><button class="btn btn-primary" type="Reset" name="rbutton">Reset</button></td>
<td><button class="btn btn-success" type="Submit" name="sbutton">Submit</button></td>
</tr>
</table>
</form>


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
    $target_dir="pics/";
    $target_img=$target_dir.basename($_FILES["images"]["name"]);
    $imageFileType=strtolower(pathinfo($target_img,PATHINFO_EXTENSION));

    if(move_uploaded_file($_FILES["images"]["tmp_name"],$target_img))
    {
      echo "The image ".basename($_FILES["images"]["name"])." has been uploaded";
    }
    else
    {
      echo "Sorry, there was an error uploading your image";
    }
    $target_dir="files/";
    $target_file=$target_dir.basename($_FILES["files"]["name"]);
    $documentFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(move_uploaded_file($_FILES["files"]["tmp_name"],$target_file))
    {
      echo "The file ".basename($_FILES["files"]["name"])." has been uploaded";
    }
    else
    {
      echo "Sorry, there was an error uploading your file";
    }

    $sname="localhost";
    $dbun="root";
    $dbpass="";
    $dbn="Project";

    $connection=new mysqli($sname,$dbun,$dbpass,$dbn);
    
    $sql="INSERT INTO `Book`(`name`, `author`, `publisher`, `edition`, `year`, `pages`, `language`,`img`,`File`) 
    VALUES ('$bn','$aut','$pb',$ed,$year,$pg,'$lg','$target_img','$target_file')";

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
    </div>
  </div>
  </div>
</body>
</html>