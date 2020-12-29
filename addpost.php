<?php
include("config.php");
include("images_helper.php");
include("session.php");
session_start();
    $id = addslashes($_POST['id']);
    $title = addslashes($_POST['title']);
    $category = addslashes($_POST['category']);
    $address = addslashes($_POST['address']);
    $cost = addslashes($_POST['cost']);
    $img = addslashes($_POST['img']);
    $content = addslashes($_POST['content']);

    if($_FILES["img"]["name"]==''){
        $avatar="house.png";
    }
    else
    {	
        $avatar = $_FILES["img"]["name"];
        $link_img='img/'.$_FILES["img"]["name"];
        move_uploaded_file($_FILES["img"]["tmp_name"],$link_img);														
    }

    $addproduct = mysqli_query($db,"
    INSERT INTO post (
		title,
		category,
		address,
		cost,
		img,
		content,
		poster
	)
	VALUE (
	'{$title}',
	'{$category}',
	'{$address}',
	'{$cost}',
	'{$img}',
	'{$content}',
	'{$userid_session}'
	)
    ");
    header("Location: {$_SERVER['HTTP_REFERER']}");
?>