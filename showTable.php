<?php
$host = 'localhost';
$user = 'root';
$pw='';
$db = 'ampel';

$conn = new mysqli($host, $user, $pw, $db);

	if ($conn -> connect_error){
	die('Connection failed:'.$conn->connection_error);
	}	
	$sql ='SELECT * FROM programmieren';
	$res = $conn->query($sql);
	
   if ($res->num_rows > 0) 
   {
      echo "<table id='tbl'><form id='f'><tr>";
      $field=$res->fetch_fields();
// output column names  
     foreach ($field as $col)
     {	
	 if($col->name == 'ID'){
	 
	 }else if(strpos($col->name, 'komm') !== false){
  
     }else{
        echo "<th>".$col->name."</th>";
     }}
     echo "</tr>";

// output data of each row
     while($row = $res->fetch_row()) 
     {	;
        echo "<tr>";

        for ($i=0;$i<=$res->field_count;$i++)
        {
			
           echo "<td style='height:30px' title=".$row[11]." class='white' name='UB1'><input type='hidden' name='UB1' value=".$row[3]."></td>";
		   
        }

        echo "</tr>";
      }
     echo "</form></table>";

  }

else  
{
 echo "No data found";
}


?>
<link rel="stylesheet" href="assets/css/style.css">
<script type="text/javascript" src="assets/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="assets/js/jquery.cookie.js"></script>
<!--jQuery Funktion-->
<script type="text/javascript">
$(document).ready(function(){
			$('input').each(function() {
  if ($(this).val() == 1) {
      $(this).parent().removeClass('white').addClass('green');
	  $('form').removeClass('green');
	}else if ($(this).val() == 2) {
		$(this).parent().removeClass('green').removeClass('white').addClass('yellow');
		 $('form').removeClass('yellow');
	}else if ($(this).val() == 3) {
		$(this).parent().removeClass('yellow').removeClass('white').addClass('red');
		 $('form').removeClass('red');
	}else if ( !$(this).val()) {
		$(this).parent().removeClass('green').removeClass('yellow').removeClass('red').addClass('white');
			}});
});
</script>