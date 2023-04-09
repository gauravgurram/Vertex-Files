<?php
    include_once '../assets/db/db.php';

    $action = $_POST['action'];

    if($action=="update-category"){
        $id = $_POST['catid'];
        $name = $_POST['catname'];
        $charge = $_POST['charge'];
        $update_category = "update category set category_name='$name', charges_per_hour='$charge' where category_id='$id'";
        if(mysqli_query($conn, $update_category)){
            echo '1';
        }else{
            echo '0';
        }
    }

    if($action=="delete-category"){
        $id = $_POST['catid'];
        $delete_category = "delete from category where category_id='$id'";
        if(mysqli_query($conn, $delete_category)){
            echo '1';
        }else{
            echo '0';
        }
    }

    if($action=="update-user"){
        $id = $_POST['usrid'];
        $name = $_POST['usrname'];

        $update_user = "update user set name='$name' where user_id='$id'";
        if(mysqli_query($conn, $update_user)){
            echo '1';
        }else{
            echo mysqli_error($conn);
        }
    }

    if($action=="delete-user"){
        $id = $_POST['usrid'];
        $delete_user = "delete from user where user_id='$id'";
        if(mysqli_query($conn, $delete_user)){
            echo '1';
        }else{
            echo '0';
        }
    }

    if($action=="add-slot"){
        $catid = $_POST['catid'];
        $slotid = "SL".time();
        $insert_slot = "insert into slot (slot_id, category_id) values ('$slotid', '$catid')";
        if(mysqli_query($conn, $insert_slot)){
            echo '1';
        }else{
            echo '0';
        }
    }
?>