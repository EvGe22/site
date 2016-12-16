<?php
	
	require_once 'db_connect.php';
	session_start();

	$db = new DB_CONNECT();

	$text = mysql_escape_string($_POST["comment"]);
	$newsId = $_POST["news_id"];
	$id = $_SESSION["id"];

	$sql = "INSERT INTO `comments` (`id`, `user_id`, `news_id`, `text`, `date`) VALUES (NULL, '$id', '$newsId', '$text', CURRENT_TIMESTAMP);";

	$result = mysql_query($sql);

	$location = "Location: http://localhost/news.php?news=$newsId#comments";

	header($location);
?>