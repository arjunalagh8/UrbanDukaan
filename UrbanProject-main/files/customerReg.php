<?php 
require_once 'connect.php';
if(isset($_POST['submit']) ){


	$sql = "INSERT INTO urbandukan_project.customer(name,email,contactNo,pass) VALUES(:n,:e,:c,:p)";
	$pass = md5($_POST['password']);
	$stmt = $conn->prepare($sql);
	try{
		
	$stmt->execute(
		array(
			':n' => $_POST['name'], 
			':e' => $_POST['email'],
			':c' => $_POST['contactNo'],
			':p' => $pass,
		)
	);
	echo "Customer Successfully Registered" ;
	$email = $_POST['email'];
	$stmt = $conn->query("SELECT cid FROM urbandukan_project.customer where email='$email';");
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	session_start();

	$_SESSION['NavCusCid'] = $row['cid'];

	header("refresh:1; url= customeraddress.html");
    exit();
}catch(PDOException $e){
	echo "duplicate entry";
	header("refresh:1; url= customerreg.html");
}
	
}
?>
