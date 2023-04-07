<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
<input type="file" name="file[]" multiple><br><br>
<input type="submit" name="submit" value="Submit">
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
    $filename=$_FILES['file']['name'];
    $filesize=$_FILES['file']['size'];
    $filetype=$_FILES['file']['type'];
    for($i=0; $i<count($_FILES['file']['name']);$i++)
    {
        $filetmpname=$_FILES['file']['tmp_name'][$i];
        echo $_FILES['file']['name'][$i];
        $filestore="images/".$_FILES['file']['name'][$i];
        move_uploaded_file($filetmpname,$filestore);
    }
     
    // $con=mysqli_connect("localhost","root","","sample");
    // $sql="insert into imagesfiles(imagesfile,name,size,type,temp) values('$filestore','$filename','$fileszie','$filetype','$filetmpname')";
    // if(mysqli_query($con,$sql))
    // {
    //     echo "Inserted Into Database";
    // }
    // else
    // {
    //     echo "Not Inserted into Database";
    // }

}

?>