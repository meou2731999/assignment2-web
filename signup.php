<?php
include("config.php");
session_start();
    $username = addslashes($_POST['username']);
    $password = md5(addslashes($_POST['password']));
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $birthday = addslashes($_POST['birthday']);
    $gender = addslashes($_POST['gender']);
    $avatar = addslashes($_POST['avatar']);
    if(!$username  || !$password || !$email || !$phone ){
        $_SESSION['signup_error']='error';
        header("location: index.php");
    }
    $addmember = mysqli_query($db,"
	INSERT INTO user (
		username,
		password,
		email,
		phone,
		gender,
		avatar,
		birthday
	)
	VALUE (
	'{$username}',
	'{$password}',
	'{$email}',
	'{$phone}',
	'{$gender}',
	'{$avatar}',
	'{$birthday}'
	)
    ");
    $_SESSION['signup_success']='success';
    header("location: index.php");
?>