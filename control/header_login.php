<?php
	session_start();
	if (isset($_SESSION["login"])){
		include 'assets/htmls/logged.php';
	} else {
		include 'assets/htmls/notLogged.html';
	}
?>