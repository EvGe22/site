<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/main_news.css">
	<script src="/assets/js/jquery-3.1.1.js"></script>
	<script src="/assets/js/slippry.min.js"></script>
	<link rel="stylesheet" href="/assets/css/slippry.css" />
</head>
<body>
	<?php include("assets/htmls/header.php"); ?>
	

	<main>

		<div class="title">
			<p >MLG 360 NOSCOPE</p>
		</div>

		<ul id="image_slider">
			<li><a href="https://vk.com/evge22">
			<img src="assets/img/slider/cs-slide.png"></a></li>
			<li><a href="#slide2">
			<img src="assets/img/slider/dota-slide.png"></a></li>
			<li><a href="#slide3">
			<img src="assets/img/slider/siege-slide.png"></a></li>
		</ul>
	</main>

	<?php include("control/main_news.php"); ?>
	
	<?php include("assets/htmls/footer.html"); ?>

	<script type="text/javascript">
		$(document).ready(function(){
			var slider = $('#image_slider')
  			slider.slippry();
  			slider.css({"z-index":"-1"});

		});
	</script>
</body>
</html>

