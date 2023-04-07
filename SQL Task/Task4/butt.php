<form method="POST" >
    <input type="text" name="user" id="">
    <input type="password" name="pass" id="">
    <input type="submit" name="sub">
</form>
<?php 

if(isset($_POST['sub']))
{

$count=0;
    for($i=0;$i<5;$i++)
    {  
        echo "
        <form method='POST' >
        <input type='text' name='user'>
        <input type='password' name='pass'>
        <input type='submit' name='sub'>
    </form>";

        $user=$_POST['user'];
         $pass=$_POST['pass'];
        if($user=="abc" && $pass=="abc")
        {
            echo "Successfully";    
            break;
        }
        else{
            if($i==2)
            { 
                echo "Account blocked".$i;
                break;
            }
            else
            {
                echo "Failed";
            }
        }
    }
   
}

?>
