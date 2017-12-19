<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$dbname = "ampel";
$dbpw = "";

$name 		= $_POST["name"];
$anzahl		= $_POST["anzahl"];
$bez 		= $_POST['bez'];
$tutor      = $_POST['tutor'];
$komm		= $_POST['komm'];
$grp		= $_POST['grp'];
$java		= $_POST['java'];
$js			= $_POST['js'];
$php        = $_POST['php'];
$html		= $_POST['html'];
$css		= $_POST['css'];
$pdf		= $_POST['pdf'];

if($java == 1){$java=1;}else{$java=0;}
if($js == 1){$js=1;}else{$js=0;}
if($php == 1){$php=1;}else{$php=0;}
if($html == 1){$html=1;}else{$html=0;}
if($css == 1){$css=1;}else{$css=0;}
if($pdf == 1){$pdf=1;}else{$pdf=0;}

$bezArray = array();
for($i=1;$i<$anzahl+1;$i++){
$bezArray[$i] = $bez."_".$i;
}
for($i=1;$i<$anzahl+1;$i++){
$kommArray[$i] = $bez."_".$i."_komm";
}
// Create connection
$conn = new mysqli($servername, $username, $dbpw, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql= "CREATE TABLE IF NOT EXISTS $name(ID int(5),";
if ($tutor == 1){
$sql.="tutor VARCHAR(100),";
}
if ($grp == 1){
$sql.="gruppe int(3),";
}
for($k=1;$k<$anzahl+1;$k++){
$sql.="$bezArray[$k] VARCHAR(100),";
}
if ($komm == 1){
for($a=1;$a<$anzahl+1;$a++){
$sql.="$kommArray[$a] VARCHAR(100),";
}}
$sql .= "PRIMARY KEY(ID))";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
  //	header("Location: http://78.47.84.107/pm1tutorengrp.php");
} else {
    echo "Error updating record: " . $conn->error;
}
$sqlFormat = "INSERT INTO format(java,js,php,html,css,pdf) VALUES($java,$js,$php,$html,$css,$pdf)";
if ($conn->query($sqlFormat) === TRUE) {
    echo "Insert into Table successfully";
  //	header("Location: http://78.47.84.107/pm1tutorengrp.php");
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
mkdir('D:/xampp/htdocs/ampel/uploads/'.$name.'_uploads');
?>
