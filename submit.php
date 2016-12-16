<?php
	require_once 'control/db_connect.php';

	$db = new DB_CONNECT();

	if ($_POST["type"] == "LOGIN"){
		$result = mysql_query("SELECT * FROM users WHERE `login`='".$_POST["login"]."' AND `password`='".$_POST["password"]."'")  or die(mysql_error());
		//print_r($result);
		if (mysql_num_rows($result) > 0){
			session_start();
			$_SESSION["login"] = $_POST["login"];
			$row = mysql_fetch_array($result);
			$_SESSION["id"] = $row["id"];
			$_SESSION["role"] = $row["role"];
			echo "Success";
		}
		else echo "Fail";
	} else {
		$login = mysql_escape_string($_POST["login"]);
		$password = mysql_escape_string($_POST["password"]);
		$first_name = mysql_escape_string($_POST["first_name"]);
		$last_name = mysql_escape_string($_POST["last_name"]);
		
		$sql = "SELECT * FROM users WHERE `login`= '".$_POST["login"]."'";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result) > 0) echo "Fail";
		else{
			$sql = "INSERT INTO `users` (`id`, `login`, `password`, `last_name`, `first_name`, `role`) VALUES (NULL, '".$login."', '".$password."', '".$first_name."', '".$last_name."', '0');";
			
			mysql_query($sql) or die(mysql_error());
	
			echo "Success";
		}
	}
?>
