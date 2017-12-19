<?php
$dirname = "D:/xampp/htdocs/ampel/uploads";
$files = array_diff(scandir($dirname), array('..','.'));
natsort($files);
?>


<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Übungen</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>Übungen</h1>
						<ul>
<?php 
				foreach ($files as $file) {
				echo '<li><a href="D:/xampp/htdocs/ampel/uploads/'.$file.'" download>'.$file.'</a></li>'; 
				}
 ?>
						</ul>
						<nav style='float:left'><li><a href="javascript:history.back()" class="icon fa-chevron-left"><span class="label">Zurück</span></a></li></nav>
					</header>
					
				<!-- Footer -->
					<footer id="footer">
						<!--<span class="copyright">&copy; Steffen Wachtel.</span>-->
						<span class="copyright">Hochschule Furtwangen - Fakultät Wirtschaftsinformatik - Prof. J.A. Illik</span>
					</footer>
<div id="black_overlay" style="width: 100%;"> </div>
<div class="added"></div>


			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>