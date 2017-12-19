<?php 
$dirname = "D:/xampp/htdocs/ampel/uploads";
$dir = array_diff(scandir($dirname), array('..','.'));
natsort($dir);
?>
<html>
<link rel="stylesheet" href="assets/css/style.css">
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Aufgabe hochladen:
    <input type="file" name="fileToUpload" id="fileToUpload"><br/><br/>
	<select name='dir'>
<?php 
foreach ($dir as $dirs) {
echo '<option id="dir" >'.$dirs.'</option>'; 
}

?>
	<select>
    <input type="submit" value="upload" name="submit">
</form>

</body>
</html>