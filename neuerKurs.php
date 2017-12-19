<?php
 /*   SESSION_START(); 
  if ($_SESSION["login"] == 0) 
        { 
        # ist nicht eingeloggt, also Formular anzeigen, die Datenbank 
        # schliessen und das Programm beenden 
        include("login-formular.html"); 
        mysql_close($link); 
        exit; 
        }*/
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable

 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Neuer Kurs</title>
 <link rel="stylesheet" href="assets/css/style.css">
 <meta charset='utf8'>
 </head>
 <body>
 <h1> Neuen Kurs anlegen</h1>
 <form action="saveKurs.php" method="post">
 <table>
 <tr><td>Kursname</td><td><input type='text' id='name' name='name'></input></td></tr>
 <tr><td>Aufgabenbezeichnung</td><td><input type='text' id="bez" name='bez'></input></td></tr>
 <tr><td>Anzahl der Aufgaben</td><td><input type='text' id="anzahl" name='anzahl'></input></td></tr>
 <tr><td>Farbschema</td><td><label><input type='checkbox'></input>Grün, Gelb, Rot</label></td></tr>
  <tr><td>Gruppen</td><td><input type='checkbox' id="grp" name='grp' value='1'></input></td></tr>
 <tr><td>Tutoren</td><td><input type='checkbox' id="tutor" name='tutor' value='1'></input></td></tr>
 <tr><td>Kommentare</td><td><input type='checkbox' id="komm" name='komm' value='1'></input></td></tr>
 <tr><td>Abgabeformat</td><td>
 <input type='checkbox' id="java" name='java' value='1'>.java</input>
 <input type='checkbox' id="js" name='js' value='1'>.js</input>
 <input type='checkbox' id="php" name='php' value='1'>.php</input>
 <input type='checkbox' id="html" name='html' value='1'>.html</input>
 <input type='checkbox' id="css" name='css' value='1'>.css</input>
 <input type='checkbox' id="pdf" name='pdf' value='1'>.pdf</input>
 </td></tr>
 <tr><td></td><td><input type="submit" value="erstellen"></input></td></tr>
 </div>
 </form> 
 </body>
 </html> 

 


