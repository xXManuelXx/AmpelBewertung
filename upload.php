<?php
$target 		= $_POST["dir"];
$target_dir = "uploads/".$target."/";
//$target_dir = "uploads/".$name."uploads";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
    echo "Die Datei existiert bereits.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Die Datei ist zu Groß.";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "java" && $fileType != "php" && $fileType != "js"
&& $fileType != "html" && $fileType != "pdf" && $fileType != "css" ) {
    echo "Falsches Format. Bitte laden Sie eine ***-Datei hoch.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>