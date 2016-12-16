<?php
	$response = array(); 
	require_once 'db_connect.php';

	$db = new DB_CONNECT();
	$result = mysql_query("SELECT * FROM users")  or die(mysql_error());;

	if (!empty($result)) {
		//echo mysql_num_rows($result);
	    if (mysql_num_rows($result) > 0) {
	
			while ($row = mysql_fetch_array($result)) {
			echo "<tr>";	
			echo "<th>".$row["id"]."</th>";
			echo "<th>".$row["login"]."</th>";
			echo "<th>".$row["first_name"]."</th>";
			echo "<th>".$row["last_name"]."</th>";
			echo "<th><img class=\"table-button edit\" src=\"assets/img/edit.svg\"/> <span class=\"table-button delete\">X</span></th>";
			echo "</tr>";
		}	
	         
	    } else {
	        //do something
	    }
	} else {
	    //do something as well
	}
?>