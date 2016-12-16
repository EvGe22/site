<?php
	require_once 'db_connect.php';

	$db = new DB_CONNECT;

	$sql = "SELECT * FROM `news` ORDER BY `date` DESC LIMIT 3;";

	$result = mysql_query($sql);

	if (!empty($result)) {
		//echo mysql_num_rows($result);
	    if (mysql_num_rows($result) > 0) {
	
	    	echo ("<div class=\"main-news-wrap\">");			
			$row = mysql_fetch_array($result);
			echo "<div class=\"main-news\">";
			echo "<a href=\"/news.php?news=".$row["id"]."\">".$row["name"]."</a>";
			echo "<div class=\"news-body\">";
			echo $row["preview"];
			echo "</div>";
			echo "</div>";

			echo "<div class=\"side-news-wrap\">";

			while ($row = mysql_fetch_array($result)){
				echo "<div class=\"side-news\">";
				echo "<a href=\"/news.php?news=".$row["id"]."\">".$row["name"]."</a>";
				echo "<div class=\"news-body\">";
				echo $row["preview"];
				echo "</div>";
				echo "</div>";
			}
			echo("</div>");
			echo("</div>");
	         
	    } else {
	        //do something
	    }
	} else {
	    //do something as well
	}


?>