<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
<input type="file" name="file" multiple><br><br>
<input type="submit" name="submit" value="Submit">
</body>
</html>
<?php 

if(isset($_POST['submit']))
{
    $filename=$_FILES['file']['name'];
    $fileszie=$_FILES['file']['size'];
    $filetmpname=$_FILES['file']['tmp_name'];
    $filetype=$_FILES['file']['type'];
    $filestore="images/".$filename;
    if(move_uploaded_file($filetmpname,$filestore))
    {
        echo "Uploaded";
    }
    else
    {
        echo "Not Uploaded";
    }

    $con=mysqli_connect("localhost","root","","sample");
    $sql="insert into imagesfiles(imagesfile,name,size,type,temp) values('$filestore','$filename','$fileszie','$filetype','$filetmpname')";
    if(mysqli_query($con,$sql))
    {
        echo "Inserted Into Database";
    }
    else
    {
        echo "Not Inserted into Database";
    }

}

?>