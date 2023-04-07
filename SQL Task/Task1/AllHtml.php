<html>
    <head>

    <title>
        All Input tags
    </title>
    </head>
    <body>
        <form method="post">
        Button : <input type="button" name="button" value="Button1"><br><br>

        checkbox1 : <input type="checkbox" name="checkbox" id="disc1" value="checkbox clicked"><br><br>

        Color : <input type="color" name="color"><br><br>

        Date : <input type="date" name="date" id="date"><br><br>

        Date time  : <input type="datetime" name="datetime"><br><br>

        Date Time Local : <input type="datetime-local" name="datelocal" id="datelocal"><br><br>

        Email : <input type="email" name="email" id="email"><br><br>

        File : <input type="file" name="file" id="file"><br><br>

        Hidden : <input type="hidden" name="hidden" value="This is hidden">Hello<br><br>

        Image : <input type="image" name="image" src="front1.PNG" alt="text" value="imagechoosed"><br><br> 

        Month : <input type="month" name="month" id="month"><br><br>

        Number  : <input type="number" name="number" id="number"><br><br>

        Password : <input type="password" name="password" id="password"><br><br>

        radio : <input type="radio" name="radio" id="male" value="radioclicked"><br><br>

        range : <input type="range" name="range" id="range"><br><br>
        
        reset : <input type="reset" name="reset" value="reset"><br><br>

        search : <input type="search" name="search" id="search"><br><br>

        tel : <input type="tel" name="tel" id=""><br><br>

        text : <input type="text" name="text" id=""><br><br>

        time : <input type="time" name="time" id=""><br><br>

        url : <input type="url" name="url" id=""><br><br>

        week : <input type="week" name="week" id=""><br><br><br>

        submit : <input type="submit" name="submit" value="submit"><br><br>
        </form>
    </body>
</html>
<?php
$con=mysqli_connect("localhost","root","","sqltasks");
if($con)
{
    echo "Connected";
}
else
{
    echo "Not Connected";
}

if(isset($_POST['submit']))
{

$button=$_POST['button'];
$checkbox=$_POST['checkbox'];
$color=$_POST['color'];
$date=$_POST['date'];
$datetime=$_POST['datetime'];
$datetimelocal=$_POST['datelocal'];
$email=$_POST['email'];
$file=$_POST['file'];
$hidden=$_POST['hidden'];
$image=$_POST['image'];
$month=$_POST['month'];
$number=$_POST['number'];
$password=$_POST['password'];
$radio=$_POST['radio'];
$range=$_POST['range'];
$reset=$_POST['reset'];
$search=$_POST['search'];
$submit=$_POST['submit'];
$tel=$_POST['tel'];
$text=$_POST['text'];
$time=$_POST['time'];
$url=$_POST['url'];
$week=$_POST['week'];

$sql="insert into inputtags(ip_button, ip_check1, ip_color, ip_date,ip_datetime, ip_datetimelocal, ip_email,ip_file, ip_hidden,ip_image,ip_month,ip_number, ip_password,ip_radio1,ip_range,ip_reset, ip_search, ip_submit, ip_tel, io_text, time, url, week)
values('$button','$checkbox','$color','$date','$datetime','$datetimelocal','$email','$file','$hidden','$image','$month','$number','$password','$radio','$range','$reset','$search','$submit','$tel','$text','$time','$url','$week')";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Data Successfully inserted');</script>";
    header('location:fetch.php');
}
else
{
    echo "<script>alert('Data Not inserted');</script>";
    echo mysqli_error($con);

}
}
?>