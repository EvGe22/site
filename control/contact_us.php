<?php

	require_once 'db_connect.php';
	$db = new DB_CONNECT();

	$name = $_POST["name"];
	$text = $_POST["text"];
	$email = $_POST["email"];
	$boolean1 = $_POST["boolean1"];
	$boolean2 = $_POST["boolean2"];
	
	$uploaddir = "../uploads/";
	$uploadfile = $uploaddir . basename($_FILES['upload']['name']);

	if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile)) {
    	$sql = "INSERT INTO `contact_us` (`id`, `text`, `email`, `name`, `boolean1`, `boolean2`, `file-path`) VALUES (NULL, '".$text."', '".$email."', '".$name."', '".$boolean1."', '".boolean2."', '".$uploadfile."');";
    	mysql_query($sql) or die(mysql_error());
	} else {
		//do something
	}

	header("Location: ../contact_us.php");

?>