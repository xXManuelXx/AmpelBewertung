<?php
//MYSQL connection
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ampel";

class JavaSyntaxtFileChecker{
    public  $tablename = "syntaxerror";
    public  $outputCheck = "";
    public  $fpath = "";
    function checkSyntaxt($filepath){
      exec("java -jar Checker.jar " . $filepath, $output);
      $this->fpath =$filepath;
      $this->outputCheck = $output[0];

      return $output[0];
    }



    function writeErrorToDB($conn, $groupID,$exerciseID,$courseID){
      $file = basename($this->fpath);
      //Check if
      $sql = "Select * from ".$this->tablename." where groupID=".$groupID." and exerciseID=".$exerciseID ." and courseID=".$courseID;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        //Update
        $sql = "UPDATE ".$this->tablename." SET error = CONCAT(error, '".$conn->real_escape_string($file." | ".$this->outputCheck)."')";
        if ($conn->query($sql) === TRUE) {
          $conn->close();
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }else{
        //insert
        $sql = "Insert into ".$this->tablename. "(groupID,exerciseID,error, courseID) Values (".$groupID.", ".$exerciseID.",'".$conn->real_escape_string($file." | ".$this->outputCheck)."', ".$courseID.")";

        if ($conn->query($sql) === TRUE) {
          $conn->close();
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";



//Syntaxt Check
$javaSyntaxtFileChecker = new JavaSyntaxtFileChecker();
$outputChecker = $javaSyntaxtFileChecker->checkSyntaxt("C:\\xampp\\htdocs\\javaTest\\Test1.java");
$javaSyntaxtFileChecker->writeErrorToDB($conn,3,2,1);



?>
