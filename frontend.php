﻿<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php 
$host = 'localhost';
$user = 'root';
$pw='';
$db = 'ampel';

$conn = new mysqli($host, $user, $pw, $db);

	if ($conn -> connect_error){
	die('Connection failed:'.$conn->connection_error);
	}
	
	$sql ='SHOW TABLES FROM ampel';
	$res = $conn->query($sql);
?>
<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Ampelbewertung</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<link rel="stylesheet" href="assets/css/colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="assets/js/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				

				
			});
		</script>
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>Ampelbewertung</h1>
						<p>Wirtschaftsinformatik</p>
						<nav>
							<ul>
<?php 
	
	while($row=$res->fetch_assoc()){
		if($row['Tables_in_ampel']=='format'){}else{
		echo "<li><a href='./showTable.php' class='icon fa-graduation-cap iframe'></a>".ucfirst($row['Tables_in_ampel'])."</li>";
		}}
$conn ->close();

?>
							</ul>
						</nav>
					</header>

				<!-- Footer -->
					<footer id="footer">
						<!--<span class="copyright">&copy; Steffen Wachtel.</span>-->
						<span class="copyright">Hochschule Furtwangen - Fakultät Wirtschaftsinformatik </span>
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
