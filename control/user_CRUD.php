<?php
	require_once 'db_connect.php';

	$db = new DB_CONNECT();

		switch ($_POST["type"]) {
			case 'ADD_USER':
				if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["first_name"]) && isset($_POST["last_name"])){
					$login = mysql_escape_string($_POST["login"]);
					$password = mysql_escape_string($_POST["password"]);
					$first_name = mysql_escape_string($_POST["first_name"]);
					$last_name = mysql_escape_string($_POST["last_name"]);
		
					$sql = "INSERT INTO `users` (`id`, `login`, `password`, `last_name`, `first_name`, `role`) VALUES (NULL, '".$login."', '".$password."', '".$first_name."', '".$last_name."', '0');";
		
					mysql_query($sql) or die(mysql_error());

					$sql = "SELECT MAX(`id`) AS `maximum` FROM `users`";

					$string = mysql_query($sql) or die(mysql_error());
					$string = mysql_fetch_array($string);

					echo $string["maximum"];
					
					//echo "Success";
		
				} else {
					echo "Not enough arguments";
				}

				break;
			case 'EDIT_USER':
				if (isset($_POST["id"]) && isset($_POST["login"]) && isset($_POST["first_name"]) && isset($_POST["last_name"])){
					$id = mysql_escape_string($_POST["id"]);
					$login = mysql_escape_string($_POST["login"]);
					$first_name = mysql_escape_string($_POST["first_name"]);
					$last_name = mysql_escape_string($_POST["last_name"]);
		
					$sql = "UPDATE `users` SET `login` = '$login', `last_name` = '$last_name', `first_name` = '$first_name' WHERE `users`.`id` = $id;";
		
					mysql_query($sql) or die(mysql_error());
		
					echo "Success";
		
				} else {
					echo "Not enough arguments";
				}
				break;
			case 'DEL_USER':
				if (isset($_POST["id"])){
					$id = mysql_escape_string($_POST["id"]);
							
					$sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
		
					mysql_query($sql) or die(mysql_error());
		
					echo "Success";
		
				} else {
					echo "Not enough arguments";
				}
				break;
			default:
				echo "HOW DID YOU GET HERE?! LEAVE NOW!";
				break;
		}


?>