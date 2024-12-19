<?php
$servername = "localhost:3306"; 
$username = 'root'; 
$password = '';  
$myDB = 'urbandukan_project';

try{
	 $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
	echo "Connection failed : ".$e->getMessage();
}
?>
