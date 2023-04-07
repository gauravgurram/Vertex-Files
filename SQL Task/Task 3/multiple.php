<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
<input type="file" name="file[]" multiple="multiple"><br><br>
<input type="submit" name="submit" value="Submit">
</body>
</html>
<?php 

if(isset($_POST['submit']))
{
    $filename=array();
    array_push($filename,$_FILES['file']['name']);
    $count=count($_FILES['file']['name']);
    $fileszie=$_FILES['file']['size'];
    $filetype=$_FILES['file']['type'];
    $filetmpname=$_FILES['file']['tmp_name'];
    $filestore="images/".$filename;
    move_uploaded_file($filetmpname,$filestore);
    $filestore1=implode(",",$filestore);
    $filename1=implode(",",$filename);

    $con=mysqli_connect("localhost","root","","sample");
    $sql="insert into imagesfiles(imagesfile,name,size,type,temp) values('$filestore','$filename1','$fileszie','$filetype','$filetmpname')";
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