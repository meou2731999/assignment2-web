<?php
include('config.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db, "select * from user where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);


if (isset($_SESSION['login_user'])) {
   $login_session = $row['username'];
   $email = $row['email'];
   $birthday = $row['birthday'];
   $gender = $row['gender'];
   $phone = $row['phone'];
   $avatar = $row['avatar'];
   // header("location:index.php");
}
