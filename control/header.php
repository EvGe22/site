<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require_once 'db_connect.php';	

	$db = new DB_CONNECT();
	mysql_set_charset( 'utf8' );

	$result = mysql_query("SELECT * FROM categories")  or die(mysql_error());

	if (!empty($result)) {
		//echo mysql_num_rows($result);
	    if (mysql_num_rows($result) > 0) {	    				
			while ($row = mysql_fetch_array($result)) {	
				echo("<a href=\"news.php?category=".$row["id"]."\">".$row["name"]."</a>");   	  			
			}
	         
	    } else {
	        //do something
	    }
	} else {
	    //do something as well
	}


	$db = null;

	
?>