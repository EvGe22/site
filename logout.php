<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION["id"]);
	unset($_SESSION["role"]);
	session_destroy();
	header('Location: index.php');
?>