<?php
include("config.php");
include("images_helper.php");
session_start();
    $id = addslashes($_POST['id']);
    $username = addslashes($_POST['username']);
    $password = md5(addslashes($_POST['password']));
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $birthday = addslashes($_POST['birthday']);
    $gender = addslashes($_POST['gender']);
    $avatar = addslashes($_POST['avatar']);
    if(!$username  || !$password || !$email || !$phone ){
        header("location: index.php");
    }
    if($_FILES["avatar"]["name"]==''){
        $avatar="unnamed.png";
    }
    else
    {	
        $avatar = $_FILES["avatar"]["name"];
        $link_img='img/'.$_FILES["avatar"]["name"];
        move_uploaded_file($_FILES["avatar"]["tmp_name"],$link_img);														
    }
    $addmember = mysqli_query($db,"
	UPDATE user SET username= '{$username}', password='{$password}', email='{$email}', phone='{$phone}', gender='{$gender}', avatar='{$avatar}', birthday='{$birthday}' WHERE id='{$id}'");
    header("location: index.php");
?>