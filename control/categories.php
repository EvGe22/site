<?php
	require_once 'db_connect.php';

	$db = new DB_CONNECT();
	mysql_set_charset( 'utf8' );

	if (isset($_GET["category"])) {
		
		$category = intval($_GET['category']);
		$result = mysql_query("SELECT * FROM news WHERE `category` = ".$category)  or die(mysql_error());

		if (!empty($result)) {
			//echo mysql_num_rows($result);
		    if (mysql_num_rows($result) > 0) {
	
		    	echo ("<div class=\"news-wrap\">");			
				while ($row = mysql_fetch_array($result)) {	

					$sql = mysql_query("SELECT Count(*) as amount FROM comments WHERE `news_id` = ".$row["id"]);
					$amount = mysql_fetch_array($sql);
					echo("<div class=\"news\">");
					echo("<a href=\"?news=".$row["id"]."\">".$row["name"]."</a>");    	  			
    	  			echo("<ul>");
    	  			echo("<li>Комментарии: ". $amount["amount"] ."</li>");
    	  			echo("<li>".$row["date"]."</li>");
    	  			echo("</ul>");
    	  			echo("<div class=\"news-body\">".$row["preview"]."...</div>");
    	  			echo("</div>");
				}		
				echo("</div>");
		         
		    } else {
		        //do something
		    }
		} else {
		    //do something as well
		}

	} elseif (isset($_GET["news"])) {
		
		$id = intval($_GET['news']);
		$result = mysql_query("SELECT * FROM news WHERE `id` = ".$id)  or die(mysql_error());

		if (!empty($result)) {
			//echo mysql_num_rows($result);
		    if (mysql_num_rows($result) > 0) {
				$row = mysql_fetch_array($result);

		    	echo ("<div class=\"news-wrap\">");				
				$sql = mysql_query("SELECT Count(*) as amount FROM `comments` WHERE `news_id` = ".$row["id"]);
				$amount = mysql_fetch_array($sql);
				echo("<div class=\"news\">");
				echo("<a href=\"?news=".$row["id"]."\">".$row["name"]."</a>");    	  			
    	  		echo("<ul>");
    	  		echo("<li><a href=\"#comments\">Комментарии: ". $amount["amount"] ."</a></li>");
    	  		echo("<li>".$row["date"]."</li>");
    	  		echo("</ul>");
    	  		echo("<div class=\"news-body\">".$row["text"]."...</div>");
    	  		echo("</div>");    	  		

				echo("</div>");

				echo "<div id=\"comments\">";
				if ($amount["amount"] == 0) echo "<p>There are no comments, be the first to write one!</p>";
				else {
					$sqlTwo = mysql_query("SELECT * FROM `comments` WHERE `news_id` = ".$id);
					while ($rowTwo = mysql_fetch_array($sqlTwo)) {
						$sqlThree = mysql_query("SELECT * FROM `users` WHERE `id` = ".$rowTwo["user_id"]);
						$rowThree = mysql_fetch_array($sqlThree);
						echo "<div class=\"comment\">";
						echo "<ul>";
						echo "<li>".$rowThree["first_name"]." ".$rowThree["last_name"]."</li>";
						echo "<li>".$rowTwo["date"]."</li>";
						echo "</ul>";
						echo "<div class=\"comment-body\">".$rowTwo["text"];
						echo "</div>";
						echo "</div>";
					}
				}

				if (isset($_SESSION["login"])) include 'assets/htmls/commentForm.html';
				else echo "<p>You need to log in to sumbit a comment</p>";

				echo("</div>");
		         
		    } else {
		        //do something
		    }
		} else {
		    //do something as well
		}

	} else {

		$result = mysql_query("SELECT * FROM categories")  or die(mysql_error());
	
		if (!empty($result)) {
			//echo mysql_num_rows($result);
		    if (mysql_num_rows($result) > 0) {
	
		    	echo ("<div class=\"category-wrap\">");			
				while ($row = mysql_fetch_array($result)) {	
					echo("<a style=\"display:block\" href=\"?category=".$row["id"]."\">");
    	  			echo("<div class=\"category\">");
    	  			echo("<img src=\"assets/img/categories/".$row["image"]."\">");
    	  			echo("<p>".$row["name"]."</p>");
    	  			echo("<p>".$row["description"]."</p>");
    	  			echo("</div>\n</a>");
				}		
				echo("</div>");
		         
		    } else {
		        //do something
		    }
		} else {
		    //do something as well
		}
	}
?>