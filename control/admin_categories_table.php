<?php
	$response = array(); 
	require_once 'db_connect.php';

	$db = new DB_CONNECT();
	$result = mysql_query("SELECT * FROM `categories`")  or die(mysql_error());;

	if (!empty($result)) {
		//echo mysql_num_rows($result);
	    if (mysql_num_rows($result) > 0) {
	
			while ($row = mysql_fetch_array($result)) {
			echo "<tr>";	
			echo "<th>".$row["id"]."</th>";
			echo "<th>".$row["name"]."</th>";
			echo "<th><img src=\"assets/img/categories/".$row["image"]."\"/>".$row["image"]."</th>";
			echo "<th>".$row["description"]."</th>";
			echo "</tr>";
		}	
	         
	    } else {
	        //do something
	    }
	} else {
	    //do something as well
	}
?>