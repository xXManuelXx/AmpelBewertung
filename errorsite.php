<?php
$host = 'localhost';
$user = 'root';
$pw='';
$db = 'ampel';
$tablename = "syntaxerror";
$exerciseID = 2;
$groupID = 3;
$courseID =1;

$regex_file = "(.java)";


$conn = new mysqli($host, $user, $pw, $db);

	if ($conn -> connect_error){
	die('Connection failed:'.$conn->connection_error);
	}

	$sql = "Select error from ".$tablename." where groupID=".$groupID." and exerciseID=".$exerciseID ." and courseID=".$courseID;
	$res = $conn->query($sql);

	echo "<div class='errorsite' >";
	echo "<div id='inner'>";
	echo "<font color='white'>";
	if($res->num_rows > 0){
		$pieces = explode(" | ", ($row=$res->fetch_assoc())['error']);
		$length = count($pieces);
		$open=false;

		for ($i=0; $i < $length; $i++) {
			preg_match( $regex_file, $pieces[$i], $match );
			$l = count($match);
			if($l > 0){
				//if($open){
				//	echo "</div>";
					//echo "<div id='inner'>";
				//	$open=false;
			//	}else{
				//	echo "<div id='inner'>";
				//	$open=true;
			//	}
				//if($i > 1){
				echo "<br />";
			//	}
				echo "<p>".$pieces[$i]."</p>";
			}else{

				echo "<p>".$pieces[$i]."</p>";
			}

		}
	}
echo"</font>";
echo "</div>";
echo "</div>";
	$conn ->close();
?>
<link rel="stylesheet" href="/ampel/assets/css/style.css" />
<script type="text/javascript" src="/ampel/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/ampel/jquery.cookie.js"></script>
